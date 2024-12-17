<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingMenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'indexregister'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthController::class, 'showRegister']);
// Route::post('/register', [AuthController::class, 'register'])->name('register');
////

Route::get('/', [UserPageController::class, 'index'])->name('userpage.index');
Route::get('/contact', [UserPageController::class, 'contact'])->name('userpage.contact');
Route::get('/testimoni', [UserPageController::class, 'testimoni'])->name('userpage.testimoni');

Route::get('/shop', [ShopController::class, 'index'])->name('userpage.shop');
Route::get('/shop-detail', [ShopController::class, 'shopDetail'])->name('userpage.shop-detail');



Route::middleware(['auth', 'admin', 'check.menu.access'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('menu', MenuController::class);
        Route::resource('setting_menus', SettingMenuController::class);
        Route::resource('users', UserController::class);
        Route::resource('jenis_user', JenisUserController::class);
        Route::get('/setting_menus/menus/{jenisUserId}', [SettingMenuController::class, 'getMenusByJenisUser']);

        Route::get('/admin/add-category', [AdminController::class, 'addCategory'])->name('admin.add.category');
        Route::post('/admin/store-category', [AdminController::class, 'storeCategory'])->name('admin.store.category');
    
        Route::get('/admin/add-product', [AdminController::class, 'addProduct'])->name('admin.add.product');
        Route::post('/admin/store-product', [AdminController::class, 'storeProduct'])->name('admin.store.product');
        Route::get('/admin/product-list', [AdminController::class, 'productList'])->name('admin.product.list');

    });

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


// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthController::class, 'showRegister']);
// Route::post('/register', [AuthController::class, 'register'])->name('register');

