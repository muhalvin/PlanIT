<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware('throttle:5,1')->group(function () {
        Route::post('register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
        Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    });
});
