<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/', [ShoeController::class, 'index']);

Route::get('/sepatu/{id}', [ShoeController::class, 'show'])->name('shoe.show');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [CartController::class, 'storeCheckout'])->name('checkout.store');
Route::get('/checkout/success/{id}', [CartController::class, 'success'])->name('checkout.success');

require __DIR__.'/auth.php';
