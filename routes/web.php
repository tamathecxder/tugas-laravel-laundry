<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', HomeController::class)->name('home')->middleware('auth');

// 3 tables route
Route::resource('/paket', PaketController::class)->middleware('auth');
Route::resource('/member', MemberController::class)->middleware('auth');
Route::resource('/outlet', OutletController::class)->middleware('auth');

Route::resource('/transaksi', TransaksiController::class)->middleware('auth');


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'regist'])->name('auth.register');
