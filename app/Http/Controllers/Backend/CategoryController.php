<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        return view('layouts.backend.addc');
    }

    
    public function category_index(){
        return view('layouts.backend.all_categories');
    }


    public function create(){
        return view('layouts.backend.add_categories');
    }
}
