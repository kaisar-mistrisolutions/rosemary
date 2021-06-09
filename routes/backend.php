<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;


Route::get('/dashboard', function () {
    return view('layouts.backend.dashboard');
})->middleware(['auth'])->name('dashboard');


// Roles and User Routes
Route::resource('roles', RoleController::class)->except(['show']);


// Category Routes
Route::get('/add/category', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/store/category', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/category/{id}/edit/form', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/update/category/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/delete/category/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

// Sub-Category Routes
Route::get('/category/{id}/create/sub/category', [SubCategoryController::class, 'create'])->name('sub.categories.create');
Route::get('/category/{id}/sub/category', [SubCategoryController::class, 'index'])->name('sub.categories.index');
Route::post('/store/sub/category', [SubCategoryController::class, 'store'])->name('sub.categories.store');
Route::get('/category/{category}/sub/category/{sub_category}/edit/form', [SubCategoryController::class, 'edit'])->name('sub.categories.edit');
Route::put('/update/sub/category/{sub_category}', [SubCategoryController::class, 'update'])->name('sub.categories.update');
Route::get('/delete/sub/category/{id}', [SubCategoryController::class, 'destroy'])->name('sub.categories.delete');


// Brand Routes
Route::get('/add/brand', [BrandController::class, 'create'])->name('brands.create');
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::post('/store/brand', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brand/{id}/update/form', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/update/brand/{brand}', [BrandController::class, 'update'])->name('brands.update');
Route::get('/delete/brand/{id}', [BrandController::class, 'destroy'])->name('brands.delete');


//Product Routes
Route::get('/add/product', [ProductController::class, 'create'])->name('products.create');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/product/store',[ProductController::class, 'store'])->name('products.store');
Route::get('/product/{product}/show', [ProductController::class, 'show'])->name('products.show');
Route::get('/product/{id}/update/form', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/update/product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/delete/product/{id}', [ProductController::class, 'destroy'])->name('products.delete');