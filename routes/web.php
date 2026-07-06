<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama langsung nembak file home.blade.php
Route::get('/', function () {
    $shoes = \App\Models\Shoe::all();
    return view('home', compact('shoes'));
})->name('home');

Route::get('/sepatu/{id}', [ShoeController::class, 'show'])->name('shoe.show');

// Keranjang (Cart)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');


/*
|--------------------------------------------------------------------------
| Authed Users Routes (Dashboard, Profile, & Checkout)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard User
    Route::get('/dashboard', function () {
        $orders = Order::where('customer_name', auth()->user()->name)->latest()->get();
        return view('dashboard', compact('orders'));
    })->name('dashboard');

    // Manajemen Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Proses Checkout
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
    Route::post('/checkout', [CartController::class, 'storeCheckout'])->name('checkout.store');
    Route::get('/checkout/success/{id}', [CartController::class, 'success'])->name('checkout.success');
});


/*
|--------------------------------------------------------------------------
| Admin Routes (Middleware: auth & admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Utama Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Kelola Pesanan Masuk
    Route::get('/pesanan', [AdminController::class, 'pesananMasuk'])->name('pesanan');

    // CRUD Sepatu
    Route::get('/sepatu', [AdminController::class, 'kelolaSepatu'])->name('sepatu');
    Route::get('/sepatu/tambah', [AdminController::class, 'createSepatu'])->name('sepatu.create');
    Route::post('/sepatu/tambah', [AdminController::class, 'storeSepatu'])->name('sepatu.store');
    Route::get('/sepatu/edit/{id}', [AdminController::class, 'editSepatu'])->name('sepatu.edit');
    Route::put('/sepatu/edit/{id}', [AdminController::class, 'updateSepatu'])->name('sepatu.update');
    Route::delete('/sepatu/hapus/{id}', [AdminController::class, 'destroySepatu'])->name('sepatu.destroy');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';