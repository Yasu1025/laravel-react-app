<?php

use App\Http\Controllers\api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('products', [ProductApiController::class, 'index']);
Route::get('products/{color}/color', [ProductApiController::class, 'filterProductByColor']);
Route::get('products/{size}/size', [ProductApiController::class, 'filterProductBySize']);
Route::get('products/{searchTerm}/find', [ProductApiController::class, 'findProductByTerm']);
Route::get('products/{product}/show', [ProductApiController::class, 'show']);
