<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('/{id}', [HomeController::class,'show']);
Route::get('contact', [ContactController::class,'index']);
Route::get('about', [AboutController::class,'index']);
