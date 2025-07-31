<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    HomeController,
    MenuController,
    OrderController,
    ProfileController,
    CartController,
    TestimoniController
};

/*
|--------------------------------------------------------------------------
| Public Routes (Tanpa Login)
|--------------------------------------------------------------------------
*/

// Beranda & Menu
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

// Testimoni
Route::get('/testimoni', [TestimoniController::class, 'showTestimoni'])->name('testimoni.index');
Route::get('/testimoni/form', fn() => view('testimoni.form'))->name('testimoni.form');

// Autentikasi
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

/*
|--------------------------------------------------------------------------
| Protected Routes (Harus Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Akun
    Route::get('/akun', [ProfileController::class, 'index'])->name('user.account');
    Route::get('/akun/edit', [ProfileController::class, 'edit'])->name('user.edit');
    Route::post('/akun/update', [ProfileController::class, 'update'])->name('user.update');

    // =================== BAGIAN YANG DIPERBAIKI ===================
    // Pemesanan
    Route::get('/order/cart', [OrderController::class, 'form'])->name('order.cart'); // Rute BARU untuk menampilkan form dari keranjang
    Route::post('/order/cart', [OrderController::class, 'submitCart'])->name('order.submitCart'); // Rute BARU untuk submit pesanan dari keranjang

    // Rute untuk order satu menu (sudah benar)
    Route::get('/order/{menu}', [OrderController::class, 'form'])->name('order.form');
    Route::post('/order/{menu}', [OrderController::class, 'submit'])->name('order.submit');

    // Rute untuk invoice (sudah benar)
    Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.invoice');
    // =============================================================

    // Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{menu}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
});