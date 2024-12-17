<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard.user', function () {
    return view('user.dashboard');
});

Route::get('/dashboard.admin', function () {
    return view('admin.dashboard');
});

Route::get('/menu.admin', function () {
    return view('admin.menu');
});

Route::get('/menu.user', function () {
    return view('user.menu');
});

Route::get('/product.user', function () {
    return view('user.product');
});

// Menampilkan daftar produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Menampilkan form tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Menyimpan produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');