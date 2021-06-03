<?php

use App\Http\Controllers\Backend\BrandController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Backend\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.backend.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/add', [CategoryController::class, 'index'])->name('category');

    // Category Routes
Route::get('/add/categories', [CategoryController::class, 'create'])->name('add.categories');
Route::get('/all/categories', [CategoryController::class, 'category_index'])->name('all.categories');




    // Brand Routes
Route::get('/add/brands', [BrandController::class, 'create'])->name('add.brands');
Route::get('/all/brands', [BrandController::class, 'index'])->name('all.brands');
