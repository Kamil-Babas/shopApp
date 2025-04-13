<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function()
{

    //whereNumber -> in url user parameter can only be numeric, without this users/2cc would return /users/2 view
    Route::resource("users", UserController::class)->except(['create', 'store'])->whereNumber('user');

    Route::resource("products", ProductController::class)->whereNumber('product');

});



Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth', 'redirect.if.email.verified'])->name('verification.notice');


// handle request generated when the user clicks the email verification link that was emailed
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


// generate new email verification link
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('resent', 'A fresh verification link has been sent to your email address.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
