<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {

        return response()->json($request->all());

        // $product = Product::findOrFail($product);

        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->slug = $request->slug;
        // $product->category_id = $request->category;
        // $product->sub_category_id = $request->sub_category;
        // $product->brand_id = $request->brand;
        // $product->quantity = $request->quantity;
        // $product->discount_type = $request->discount_type;
        // $product->discount = $request->discount;
        // $product->per_unit_price = $request->per_unit_price;
        // $product->status  =  $request->status;
        // $product->thumbnail_image = $request->thumbnail_image->store('public/ApiProduct/Thumbnail_Image');
        // $product->multiple_image = $request->multiple_image->store('public/ApiProduct/Multiple_Image');

        // $result = $product->save();

        // if($result)
        // {
        //     return ["Result" => "Product Updated Successfully"];
        // }
        // else
        // {
        //     return ["Result" => "Failed to Update Brand"];
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
