<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('layouts.backend.admin.brand.all_brands');
    }

    public function create(){
        return view('layouts.backend.admin.brand.add_brands');
    }
}
