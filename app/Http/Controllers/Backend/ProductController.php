<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;


class ProductController extends Controller
{
    // Show all products
    public function index(){
        return view('layouts.backend.admin.product.all_products');
    }

    // Product create form
    public function create(){
        return view('layouts.backend.admin.product.add_products', [
            'categories'=>Category::all(),
            'sub_categories'=>SubCategory::all(),
            'brands'=>Brand::all(),
        ]);
    }

     // Store Category
     public function store(Request $request) {

        Validator::make($request->all(),[
            'name'=>'required|string',
            'description'=>'required',
            'quantity'=>'required|number',
            'ppp'=>'required|number',
            'thumbnail_image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $image=$request->file('thumbnail_image');
        if (isset($image)){
        $imageName=Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();
        }
        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'description'=>$request->description,
            'category_id'=>$request->category,
            'sub_category_id'=>$request->sub_category,
            'brand_id'=>$request->brand,
            'quantity'=>$request->quantity,
            'per_unit_price'=>$request->per_unit_price,
            'thumnail_image'=>$request->file('image')->storeAs('products',$imageName)
        ]);
        return redirect()->route('app.products.index')->with('success','Product Created Successfully');
    }

}

