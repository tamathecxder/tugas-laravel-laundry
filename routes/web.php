<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', HomeController::class)->name('home');

// 3 tables route
Route::resource('/paket', PaketController::class);
Route::resource('/member', MemberController::class);
Route::resource('/outlet', OutletController::class);

Route::resource('/transaksi', TransaksiController::class);
