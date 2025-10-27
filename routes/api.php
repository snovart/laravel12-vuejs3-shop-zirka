<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Для auth используем middleware('web'), чтобы работали сессии и CSRF.
*/

Route::prefix('auth')
    ->middleware('web') // <- важно для session-based auth
    ->group(function () {
        Route::get('/me', [AuthController::class, 'me'])->name('auth.me');
        Route::post('/login', [UserController::class, 'login'])->name('auth.login');
        Route::post('/register', [UserController::class, 'register'])->name('auth.register');
        Route::post('/logout', [UserController::class, 'logout'])->name('auth.logout');
    });
