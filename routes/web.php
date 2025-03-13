<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', HomeController::class);
Route::get('home', [HomeController::class, 'testroot'])->name('home');
