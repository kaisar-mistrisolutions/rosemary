<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Role;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){

        Gate::authorize('app.dashboard');
        
        $data['userCount'] = User::count();
        $data['roleCount'] = Role::count();
        $data['productCount'] = Product::count();
        $data['users'] = User::orderBy('last_login_at','desc')->take(10)->get();
        return view('layouts.backend.dashboard',$data);
    }
    
}