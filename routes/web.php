<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Auth::routes();


//whereNumber -> in url user parameter can only be numeric, without this users/2cc would return /users/2 view
Route::resource("users", UserController::class)->except(['create', 'store'])->whereNumber('user');

Route::resource("products", ProductController::class)->whereNumber('product');
