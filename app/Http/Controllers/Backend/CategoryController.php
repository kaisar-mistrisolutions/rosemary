<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use App\Models\Category;

class CategoryController extends Controller
{

    // Show all categories
    public function index(){
        return view('layouts.backend.admin.category.all_categories', [
            'categories' => Category::latest()->paginate(2)
        ]);
    }

    // Category create form
    public function create(){
        return view('layouts.backend.admin.category.add_categories');
    }

    // Category edit form
    public function edit(Request $request) {
        return view('layouts.backend.admin.category.update_categories', [
            'category' => Category::findOrFail($request->id)
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
        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$request->file('image')->storeAs('categories',$imageName)
        ]);
        return redirect()->route('app.categories.index')->with('success','Category Created Successfully');
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|string',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);


        $image=$request->file('image');

        if (isset($image)){
            $imageName=Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();

            if (Storage::disk('public')->exists($category->image)){
                Storage::disk('public')->delete($category->image);
            }
            $category->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'image'=>$request->file('image')->storeAs('categories',$imageName)
            ]);
        }
        else{
            $category->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'image'=>$category->image
            ]);
        }

        return redirect()->route('app.categories.index')->with('success','Category Updated Successfully');
    }

    public function destroy(Request $request) {
        $category = Category::where('id', $request->id)->first();
        if(isset($category->id)){
            if (Storage::disk('public')->exists($category->image)){
                Storage::disk('public')->delete($category->image);
            }
        }
        $category->delete();
        return redirect()->route('app.categories.index')->with('success','Category Deleted');
    }

}
