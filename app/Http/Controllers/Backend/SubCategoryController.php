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
    // Show all sub-categories
    public function index($id){
        $category=Category::findOrFail($id);
        return view('layouts.backend.admin.sub-category.all_sub_categories', [   
            'sub_categories' => $category->subcategories()->latest()->paginate(3),
            'category' => $category,
        ]);
    }

    // Sub-category create form
    public function create($id){
        $category=Category::findOrFail($id);
        return view('layouts.backend.admin.sub-category.add_sub_categories', [
            'category' => $category
        ]);
    }

    // Store sub-category
    public function store(Request $request) {
        Validator::make($request->all(),[
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

    // Sub Category edit form
    public function edit(Request $request){
        return view('layouts.backend.admin.sub-category.update_sub_categories');
    }
}
