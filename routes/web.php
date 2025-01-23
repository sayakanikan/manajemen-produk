<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StockMovementController;

Route::get('/', [DashboardController::class, 'index']);
Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::get('/stock', [StockMovementController::class, 'index']);
Route::get('/purchase', [PurchaseController::class, 'index']);

// Shop
Route::get('/shop', [ShopController::class, 'index']);
Route::post('/buy-product/{id}', [ShopController::class, 'buy']);