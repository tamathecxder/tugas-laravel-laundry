<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainTransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', [HomeController::class, 'default'])->middleware('level:kasir,admin,owner', 'auth');

// Member
Route::resource('/member', MemberController::class)->middleware('level:admin');

// CRUD Paket dan Outlet pada Admin
Route::resource('/outlet', OutletController::class)->middleware('level:admin');
Route::resource('/paket', PaketController::class)->middleware('level:admin');

// Transaksi pada admin dan kasir
/**
 * Route::resource('/transaksi', TransaksiController::class)->middleware('level:admin,kasir', 'auth');
 *
 */

Route::resource('/transaksi', TransaksiController::class)->middleware('level:admin,kasir', 'auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'regist'])->name('auth.register');

// Laporan
Route::get('/laporan', LaporanController::class)->name('laporan.index')->middleware('level:admin,kasir,owner', 'auth');


// Main Transaksi
Route::resource('/main-transaksi', MainTransaksiController::class)->middleware('level:admin,kasir,owner');



// PAKAI MULTI ROLEEEEEEEEEEEEEEEEEEEEEEEE

// // Middleware kasir
// Route::group(['middleware' => ['kasir']], function () {
//     Route::get('/home', [HomeController::class, 'kasirHome'])->name('kasir.home');
//     Route::resource('/transaksi', TransaksiController::class)->midd;
// });


// // Middleware admin
// Route::group(['middleware' => ['admin']], function () {
//     Route::resource('/transaksi', TransaksiController::class);
//     Route::resource('/paket', PaketController::class)->middleware('auth');
//     Route::resource('/outlet', OutletController::class)->middleware('auth');
//     // Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });

// // Middleware owner
// Route::group(['middleware' => ['owner']], function () {
//     // Route::get('/home', [HomeController::class, 'ownerHome'])->name('owner.home');
// });
