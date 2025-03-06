<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//whereNumber -> in url user parameter can only be numeric, without this users/2cc would return /users/2 view
Route::resource("users", UserController::class)->except(['create', 'store'])->whereNumber('user');

Route::resource("products", ProductController::class)->whereNumber('product');
