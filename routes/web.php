<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


//====================================================Authentication
Route::get('/', function() {
    return view('Auth.login');
})->name('login');

Route::get('/register', function() {
    return view('Auth.register');
})->name('register');

Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');

Route::post('/login/store', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//====================================================OAuth Authentication

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

Route::get('/auth/facebook/redirect', [FacebookAuthController::class, 'redirect'])->name('auth.facebook.redirect');

Route::get('/auth/facebook/callback', [FacebookAuthController::class, 'callback'])->name('facebook.auth.callback');

//====================================================Dashboard Admin

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/article', [AdminController::class, 'article'])->name('article.index');

Route::get('/video', [AdminController::class, 'video'])->name('video.index');

