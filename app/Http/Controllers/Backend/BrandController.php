<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){

        Gate::authorize('app.brands.index');

        return view('layouts.backend.admin.brand.all_brands', [
            'brands' => Brand::paginate(2)
        ]);
    }

    public function create(){

        Gate::authorize('app.brands.create');

        return view('layouts.backend.admin.brand.add_brands');
    }


    public function edit(Request $request) {

        Gate::authorize('app.brands.edit');

        return view('layouts.backend.admin.brand.update_brands', [
            'brand' => Brand::findOrFail($request->id)
        ]);
    }
   
    public function store(Request $request) {
        

        Gate::authorize('app.brands.create');

        $request->validate([
            'name'=>'required|string',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $image=$request->file('image');
        if (isset($image)){
        $imageName=Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();
        }
        Brand::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$request->file('image')->storeAs('brands',$imageName)
        ]);
        return redirect()->route('app.brands.index')->with('success','Brand Added Successfully');
    }


    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'=>'required|string',
            'image'=>'image|mimes:jpg,jpeg,png,gif'
        ]);

        $image=$request->file('image');
        if (isset($image)){
            $imageName=Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();
            
            if (Storage::disk('public')->exists($brand->image)){
                Storage::disk('public')->delete($brand->image);
            }
            $brand->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'image'=>$request->file('image')->storeAs('brands',$imageName)
            ]);
        }
        else{
            $brand->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'image'=>$brand->image
            ]);
        }

        return redirect()->route('app.brands.index')->with('success','Brand Updated Successfully');
    }

    // Delete Brand
    public function destroy(Request $request) {

        Gate::authorize('app.brands.destroy');

        $brand = Brand::where('id', $request->id)->first();
        if(isset($brand->id)){
            if (Storage::disk('public')->exists($brand->image)){
                Storage::disk('public')->delete($brand->image);
            }
        }
        $brand->delete();
        return redirect()->route('app.brands.index')->with('success','Brand Deleted');
    }
}
