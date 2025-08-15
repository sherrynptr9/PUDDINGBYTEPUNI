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
| Public Routes (Without Login)
|--------------------------------------------------------------------------
*/

// Home & Menus
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

// Testimonial Routes
Route::prefix('testimoni')->name('testimoni.')->group(function () {
    Route::get('/', [TestimoniController::class, 'showTestimoni'])->name('index');
    Route::get('/form', fn() => view('testimoni.form'))->name('form');
    // Added a route to handle the submission of new testimonials
    Route::post('/', [TestimoniController::class, 'store'])->name('store');
});

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('auth.login');
    Route::post('/login', 'login');
    Route::get('/register', 'registerForm')->name('auth.register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('auth.logout');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Requires Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // User Account Routes
    Route::prefix('akun')->name('user.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('account');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('update');
    });

    // Order Routes
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/success/{order}', [OrderController::class, 'success'])->name('invoice');
        Route::get('/cart', [OrderController::class, 'form'])->name('cart');
        Route::post('/cart', [OrderController::class, 'submitCart'])->name('submit.cart');
        Route::get('/{menu}', [OrderController::class, 'form'])->name('form');
        Route::post('/{menu}', [OrderController::class, 'submitSingle'])->name('submit');
    });

    // Cart Routes
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{menu}', [CartController::class, 'add'])->name('add');
        Route::delete('/remove/{cart}', [CartController::class, 'remove'])->name('remove');
        Route::put('/update/{id}', [CartController::class, 'update'])->name('update');
    });
});
