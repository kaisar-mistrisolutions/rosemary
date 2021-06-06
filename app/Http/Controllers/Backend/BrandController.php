<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){
        return view('layouts.backend.admin.brand.all_brands', [
            'brands' => Brand::paginate(2)
        ]);
    }

    public function create(){
        return view('layouts.backend.admin.brand.add_brands');
    }


    public function edit(Request $request) {
        return view('layouts.backend.admin.brand.update_brands', [
            'brand' => Brand::findOrFail($request->id)
        ]);
    }
   
    public function store(Request $request) {
        Validator::make($request->all(),[
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
            'image'=>'required|image|mimes:jpg,jpeg,png,gif'
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

    public function destroy(Request $request) {
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
