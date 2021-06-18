<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BrandController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Category Route
Route::post('/store/category', [CategoryController::class, 'store']);

//Sub Category Route
Route::post('/store/sub/category', [SubCategoryController::class, 'store']);

//Brand Route
Route::delete('/delete/brand/{id}', [BrandController::class, 'destroy']);

//Product Route
Route::get('/products', [ProductController::class, 'index']);
Route::put('/update/product/{product}', [ProductController::class, 'update']);

