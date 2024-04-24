<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('loginhere', [UserController::class, 'loginhere'])->name('loginhere');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});
