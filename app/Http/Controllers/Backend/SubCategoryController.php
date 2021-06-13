<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    // Show all sub categories
    public function index($id){
        $category=Category::findOrFail($id);
        return view('layouts.backend.admin.sub-category.all_sub_categories', [   
            'sub_categories' => $category->subcategories()->paginate(3),
            'category' => $category,
        ]);
    }


    // Sub category create form
    public function create($id){
        return view('layouts.backend.admin.sub-category.add_sub_categories', [
            'category' => Category::findOrFail($id)
        ]);
    }


    // Store sub category
    public function store(Request $request) {

        $request->validate([
            'name'=>'required|string'
        ]);
        
        $category_id = $request->category_id;

        SubCategory::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('app.categories.index',[$category_id])->with('success','Sub Category Added');
    }


    // Sub category edit form
    public function edit(Category $category, SubCategory $sub_category){
        return view('layouts.backend.admin.sub-category.update_sub_categories', [
            'category' => $category,
            'sub_category' => $sub_category
        ]);
    }


    // Update sub category
    public function update(Request $request, Category $category, SubCategory $sub_category)
    {
        $request->validate([
            'name'=>'required|string',
        ]);

        $category_id = $request->category_id;

        $sub_category->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'category_id'=>$request->category_id
        ]);

        return redirect()->route('app.sub.categories.index', [$category_id])->with('success','Sub Category Updated Successfully');
    }


    // Delete Sub category
    public function destroy(Request $request) {
        $sub_category = SubCategory::where('id', $request->id)->first();

        $sub_category->delete();

        return back()->with('success','Sub Category Deleted');
    }
   
}