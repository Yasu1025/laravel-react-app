<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\UserController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/user', function (Request $request) {
    return [
      'user' => UserResource::make($request->user()),
      'access_token' => $request->bearerToken()
    ];
  });
  Route::post('user/logout', [UserController::class, 'logout']);
  Route::put('user/profile/update', [UserController::class, 'updateUserInfo']);
});


Route::get('products', [ProductController::class, 'index']);
Route::get('products/{color}/color', [ProductController::class, 'filterProductByColor']);
Route::get('products/{size}/size', [ProductController::class, 'filterProductBySize']);
Route::get('products/{searchTerm}/find', [ProductController::class, 'findProductByTerm']);
Route::get('products/{product}/show', [ProductController::class, 'show']);

// User
Route::get('user/register', [UserController::class, 'store']);
Route::get('user/register', [UserController::class, 'store']);
