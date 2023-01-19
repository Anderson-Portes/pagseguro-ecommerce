<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->middleware('guest')->group(function () {
    Route::resource('/login', LoginController::class)->only(['index', 'store'])
        ->names(['index' => 'login', 'store' => 'login.store']);
    Route::resource('/register', RegisterController::class)->only(['index', 'store'])
        ->names(['index' => 'register', 'store' => 'register.store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::prefix('/admin')->name('admin.')->middleware('resources.admin')->group(function () {
        Route::resource('/product', ProductController::class);
    });
    Route::post('/auth/logout', LogoutController::class)->name('logout');
});
