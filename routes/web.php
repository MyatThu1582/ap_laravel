<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Test;

Route::resource('posts', HomeController::class)->middleware('auth');
Route::get('logout', [AuthController::class, 'logout']);
// Route::get('home', [HomeController::class, 'testroot'])->name('home');

Route::get('/', function(Test $test){
    // $test = app()->make('test');
    dd($test);
});

