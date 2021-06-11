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
        return view('layouts.backend.admin.product.all_products', [
            'products' => Product::all()
        ]);
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
        //  dd($request);
        
        $request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'quantity'=>'required|numeric',
            'per_unit_price'=>'required|numeric',
            'discount_type'=>'required|string',
            'discount'=>'required|numeric',
            'status'=>'boolean|required',
            'thumbnail_image'=>'required|image|mimes:jpg,jpeg,png,gif',
            'multiple_image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $thumbnail_image=$request->file('thumbnail_image');
        $multiple_image=$request->file('multiple_image');

        if (isset($thumbnail_image) && isset($multiple_image)){

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
            'discount_type'=>$request->discount_type,
            'discount'=>$request->discount,
            'per_unit_price'=>$request->per_unit_price,
            'status' => $request->filled('status'),
            'thumbnail_image'=>$request->file('thumbnail_image')->storeAs('product_thumbnail_image',$imageName),
            'multiple_image'=>$request->file('multiple_image')->storeAs('product_multiple_image',$multipleimageName)
        ]);
        return redirect()->route('app.products.index')->with('success','Product Created Successfully');
    }


    // Show single product
    public function show(Product $product){
      
        return view('layouts.backend.admin.product.show_products', [
            'product' => $product
        ]);
    }


     // Product edit form
     public function edit(Request $request, Brand $brand) {
        return view('layouts.backend.admin.product.update_products', [
            'product' => Product::findOrFail($request->id),
            'brands'=> Brand::get()

        ]);
    }
   
   
     // Update Product
     public function update(Request $request, Product $product){
        
        Validator::make($request->all(),[
            'name'=>'required|string',
            'description'=>'required',
            'quantity'=>'required|numeric',
            'per_unit_price'=>'required|numeric',
            'discount'=>'required|numeric',
            'thumbnail_image'=>'image|mimes:jpg,jpeg,png,gif',
            'multiple_image'=>'image|mimes:jpg,jpeg,png,gif'
         ]);
 
         $thumbnail_image=$request->file('thumbnail_image');
         $multiple_image=$request->file('multiple_image');

         if (isset($thumbnail_image) && isset($multiple_image)){
            $imageName=Str::slug($request->name).uniqid().'.'.$thumbnail_image->getClientOriginalExtension();
            $multipleimageName=Str::slug($request->name).uniqid().'.'.$multiple_image->getClientOriginalExtension();
 
             if (Storage::disk('public')->exists($product->thumbnail_image)){
                 Storage::disk('public')->delete($product->thumbnail_image);
             }
             if (Storage::disk('public')->exists($product->multiple_image)){
                Storage::disk('public')->delete($product->multiple_image);
            }
             $product->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'description'=>$request->description,
                'category_id'=>$request->category,
                'sub_category_id'=>$request->sub_category,
                'brand_id'=>$request->brand,
                'quantity'=>$request->quantity,
                'discount_type'=>$request->discount_type,
                'discount'=>$request->discount,
                'per_unit_price'=>$request->per_unit_price,
                'status' => $request->filled('status'),
                'thumbnail_image'=>$request->file('thumbnail_image')->storeAs('product_thumbnail_image',$imageName),
                'multiple_image'=>$request->file('multiple_image')->storeAs('product_multiple_image',$multipleimageName)
             ]);
         }
         else{
             $product->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'description'=>$request->description,
                'category_id'=>$request->category,
                'sub_category_id'=>$request->sub_category,
                'brand_id'=>$request->brand,
                'quantity'=>$request->quantity,
                'discount_type'=>$request->discount_type,
                'discount'=>$request->discount,
                'per_unit_price'=>$request->per_unit_price,
                'status' => $request->filled('status'),
                'thumbnail_image'=>$product->thumbnail_image,
                'multiple_image'=>$product->multiple_image
             ]);
         }
 
         return redirect()->route('app.products.index')->with('success','Product Updated Successfully');
     }



    // Delete Product
    public function destroy(Request $request) {
        $product = Product::where('id', $request->id)->first();

        if(isset($product->id)){
            if (Storage::disk('public')->exists($product->thumbnail_image)){
                Storage::disk('public')->delete($product->thumbnail_image);
            }
            if (Storage::disk('public')->exists($product->multiple_image)){
                     Storage::disk('public')->delete($product->multiple_image);
            }
        }
        $product->delete();

        return back()->with('success', 'Product Deleted');
    }

}

