<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;


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
            'product'=>Product::all(),
        ]);
    }

     // Store Product
     public function store(Request $request) {
        Validator::make($request->all(),[
            'name'=>'required|string',
            'description'=>'required',
            'quantity'=>'required|number',
            'ppp'=>'required|number',
            'thumbnail_image'=>'required|image|mimes:jpg,jpeg,png,gif',
            'multiple_image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $thumbnail_image=$request->file('thumbnail_image');
        $multiple_image=$request->file('multiple_image');

        if (isset($thumbnail_image)){
        $imageName=Str::slug($request->name).uniqid().'.'.$thumbnail_image->getClientOriginalExtension();
        $multipleimageName=Str::slug($request->name).uniqid().'.'.$multiple_image->getClientOriginalExtension();
        }
        Product::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'description'=>$request->description,
            'category_id'=>$request->category,
            'sub_category_id'=>$request->sub_category,
            'brand_id'=>$request->brand,
            'quantity'=>$request->quantity,
            'per_unit_price'=>$request->per_unit_price,
            'thumbnail_image'=>$request->file('thumbnail_image')->storeAs('product_thumbnail_image',$imageName),
            'multiple_image'=>$request->file('multiple_image')->storeAs('product_multiple_image',$multipleimageName)
        ]);
        return redirect()->route('app.products.index')->with('success','Product Created Successfully');
    }

}

