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
Route::post('/store/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit/form', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/update/category/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/delete/category/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

// Sub-Category Routes
Route::get('/categories/{id}/create/sub/categories', [SubCategoryController::class, 'create'])->name('sub.categories.create');
Route::get('/categories/{id}/all/sub/categories', [SubCategoryController::class, 'index'])->name('sub.categories.index');
Route::post('/store/sub/categories', [SubCategoryController::class, 'store'])->name('sub.categories.store');
Route::get('/sub/categories/{id}/edit/form', [SubCategoryController::class, 'edit'])->name('sub.categories.edit');

// Brand Routes
Route::get('/add/brands', [BrandController::class, 'create'])->name('brands.create');
Route::get('/all/brands', [BrandController::class, 'index'])->name('brands.index');
Route::post('/store/brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/{id}/update/form', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/update/brand/{brand}', [BrandController::class, 'update'])->name('brands.update');
Route::get('/delete/brand/{id}', [BrandController::class, 'destroy'])->name('brands.delete');


//Product Routes
Route::get('/add/products', [ProductController::class, 'create'])->name('products.create');
Route::get('/all/products', [ProductController::class, 'index'])->name('products.index');
