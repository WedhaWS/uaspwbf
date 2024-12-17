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
use Illuminate\Support\Facades\Route;

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

    });
});
