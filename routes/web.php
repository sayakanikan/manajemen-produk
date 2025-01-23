<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StockMovementController;

Route::middleware(['guest'])->group(function () {
  // Login
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/authenticate', [AuthController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
  //Auth
  Route::post('/logout', [AuthController::class, 'logout']);
  
  Route::get('/', [DashboardController::class, 'index']);
  Route::resource('product', ProductController::class);
  Route::resource('category', CategoryController::class);
  Route::get('/stock', [StockMovementController::class, 'index']);
  Route::get('/purchase', [PurchaseController::class, 'index']);

  // Shop
  Route::get('/shop', [ShopController::class, 'index']);
  Route::post('/buy-product/{id}', [ShopController::class, 'buy']);
});

//Error
Route::fallback(function () {
  return view('404');
});