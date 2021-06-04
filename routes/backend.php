<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;


Route::get('/dashboard', function () {
    return view('layouts.backend.dashboard');
})->middleware(['auth'])->name('dashboard');


// Category Routes
Route::get('/add/categories', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/all/categories', [CategoryController::class, 'index'])->name('categories.index');

// Sub-Category Routes
Route::get('/add/sub/categories', [SubCategoryController::class, 'create'])->name('sub.categories.create');
Route::get('/all/sub/categories', [SubCategoryController::class, 'index'])->name('sub.categories.index');

    // Brand Routes
Route::get('/add/brands', [BrandController::class, 'create'])->name('brands.create');
Route::get('/all/brands', [BrandController::class, 'index'])->name('brands.index');



    //Product Routes
Route::get('/add/products', [ProductController::class, 'create'])->name('products.create');
Route::get('/all/products', [ProductController::class, 'index'])->name('products.index');
