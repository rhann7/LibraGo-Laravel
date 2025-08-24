<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\Admin\AdminUserController;
use App\Http\Controllers\Web\User\PasswordController;
use App\Http\Controllers\Web\User\UserController;
use Illuminate\Support\Facades\Route;

// Public
Route::get('', fn () => view('home'))->name('home');

// Authentication
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'store')->name('store');
    Route::get('login', 'login')->name('login');
    Route::post('login', action: 'auth')->name('auth');
    Route::post('logout', 'logout')->name('logout')->middleware('auth');
});

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Admin
Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::resource('users', AdminUserController::class);
});

// User Profile
Route::prefix('profile/{user:username}')->name('user.')->group(function () {
    Route::get('', [UserController::class, 'show'])->name('show');

    Route::middleware(['auth', 'role:user,author'])->group(function () {
        Route::get('/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('', [UserController::class, 'update'])->name('update');

        Route::prefix('change-password')->name('password.')->group(function () {
            Route::get('', [PasswordController::class, 'edit'])->name('edit');
            Route::put('', [PasswordController::class, 'update'])->name('update');
        });
    });
});