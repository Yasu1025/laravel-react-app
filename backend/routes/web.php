<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ColorController;
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
});
