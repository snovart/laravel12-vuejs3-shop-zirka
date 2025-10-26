<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\MainController;

Route::get('/', [MainController::class, 'index'])->name('front.home');