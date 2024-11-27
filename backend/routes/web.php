<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SizeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::middleware('admin')->group(function () {
  Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
  Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

  // Colors route
  Route::resource('admin/colors', ColorController::class, [
    'names' => [
      'index' => 'admin.colors.index',
      'create' => 'admin.colors.create',
      'store' => 'admin.colors.store',
      'edit' => 'admin.colors.edit',
      'update' => 'admin.colors.update',
      'destroy' => 'admin.colors.destroy',
    ]
  ]);

  // Sizes route
  Route::resource('admin/sizes', SizeController::class, [
    'names' => [
      'index' => 'admin.sizes.index',
      'create' => 'admin.sizes.create',
      'store' => 'admin.sizes.store',
      'edit' => 'admin.sizes.edit',
      'update' => 'admin.sizes.update',
      'destroy' => 'admin.sizes.destroy',
    ]
  ]);

  // Coupons route
  Route::resource('admin/coupons', CouponController::class, [
    'names' => [
      'index' => 'admin.coupons.index',
      'create' => 'admin.coupons.create',
      'store' => 'admin.coupons.store',
      'edit' => 'admin.coupons.edit',
      'update' => 'admin.coupons.update',
      'destroy' => 'admin.coupons.destroy',
    ]
  ]);

  // Product route
  Route::resource('admin/products', ProductController::class, [
    'names' => [
      'index' => 'admin.products.index',
      'create' => 'admin.products.create',
      'store' => 'admin.products.store',
      'edit' => 'admin.products.edit',
      'update' => 'admin.products.update',
      'destroy' => 'admin.products.destroy',
    ]
  ]);
});
