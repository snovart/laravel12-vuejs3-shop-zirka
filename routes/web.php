<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\MainController;

Route::get('/', [MainController::class, 'index'])->name('front.home');

Route::middleware('auth.custom')->group(function () {
    Route::view('/profile', 'front.profile')->name('front.profile');
    Route::view('/orders', 'front.orders')->name('front.orders');
});

Route::get('/search', [\App\Http\Controllers\Front\SearchController::class, 'index'])->name('front.search');