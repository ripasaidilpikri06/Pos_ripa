<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

// Route Guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
});

// Route Authenticated
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Group (Middleware role dilepas sementara agar bisa diakses)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users.update'); 
        Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Fitur Aplikasi
    Route::resource('/produk', ProdukController::class);
    
    // Custom route checkout untuk penjualan
    Route::post('/penjualan/{penjualan}/checkout', [PenjualanController::class, 'checkout'])->name('penjualan.checkout');
    Route::resource('/penjualan', PenjualanController::class);
    
    // Samakan parameter binding 'ItemPenjualan' => 'itempenjualan'
    Route::resource('/ItemPenjualan', ItemPenjualanController::class)
        ->parameters(['ItemPenjualan' => 'itempenjualan']);
        Route::get('/tentang', function () {
    return view('tentang');
})->name('about');
});