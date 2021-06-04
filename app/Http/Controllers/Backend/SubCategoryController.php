<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        return view('layouts.backend.admin.sub-category.all_sub_categories');
    }


    public function create(){
        return view('layouts.backend.admin.sub-category.add_sub_categories');
    }
}
