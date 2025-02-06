<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/cart', [CartController::class, 'viewCart'])->name('viewCart');
Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('addToCart');
Route::delete('/cart', [CartController::class, 'removeCart'])->name('removeCart');