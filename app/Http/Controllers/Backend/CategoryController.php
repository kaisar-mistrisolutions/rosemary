<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        return view('layouts.backend.admin.category.all_categories');
    }


    public function create(){
        return view('layouts.backend.admin.category.add_categories');
    }
}
