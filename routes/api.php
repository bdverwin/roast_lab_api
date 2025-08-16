<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/v1/auth')->group(base_path('routes/auth/auth.route.php'));
Route::middleware('auth:sanctum')->prefix('/v1/product')->group(function(){
    Route::get('/get-product/{id}', [ProductController::class, 'getProduct']);
    Route::get('/all', [ProductController::class, 'getAllProducts']);
    Route::post('/update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
    Route::post('/create', [ProductController::class, 'createProduct'])->name('product.create');
    Route::get('/search', [ProductController::class, 'searchProduct'])->name('product.search');
});