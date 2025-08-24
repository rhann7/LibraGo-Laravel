<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\AdminUserController;
use App\Http\Controllers\Api\User\PasswordController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('register', [AuthController::class, 'store']);
Route::post('login', [AuthController::class, 'auth']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::resource('users', AdminUserController::class);
});

// User
Route::prefix('profile/{user:username}')->group(function () {
    Route::get('', [UserController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('', [UserController::class, 'update']);
        Route::put('change-password', [PasswordController::class, 'update']);
    });
});