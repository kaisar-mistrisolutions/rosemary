<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('layouts.backend.admin.product.all_products');
    }

    public function create(){
        return view('layouts.backend.admin.product.add_products');
    }
}
