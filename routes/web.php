<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', HomeController::class)->middleware('auth');
Route::get('logout', [AuthController::class, 'logout']);
// Route::get('home', [HomeController::class, 'testroot'])->name('home');

