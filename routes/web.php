<?php

use App\Http\Controllers\BarangInventarisController;
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
Route::get('/export', [PaketController::class, 'export'])->name('paket.export');
Route::post('/import', [PaketController::class, 'import'])->name('paket.import')->middleware('level:admin');
// Transaksi pada admin dan kasir
/**
 * Route::resource('/transaksi', TransaksiController::class)->middleware('level:admin,kasir', 'auth');
 *
 */

// Route::resource('/transaksi', TransaksiController::class)->middleware('level:admin,kasir', 'auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'regist'])->name('auth.register');


// Main Transaksi
Route::resource('/main-transaksi', MainTransaksiController::class)->middleware('level:admin,kasir');
Route::get('/download_pdf/{transaksi:kode_invoice}', [MainTransaksiController::class, 'downloadPDF'])->name('download-pdf')->middleware('level:admin,kasir');
Route::get('/stream_pdf', [MainTransaksiController::class, 'stream_pdf'])->name('stream-pdf')->middleware('level:admin,kasir');
// Route::get('/test-faktur/{$id}', [MainTransaksiController::class, 'testFaktur'])->name('main-transaksi.test-faktur')->middleware('level:admin,kasir');

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index')->middleware('level:admin,kasir,owner');
Route::get('/laporan/generate_pdf', [LaporanController::class, 'generatePDF'])->name('laporan.generate')->middleware('level:admin,kasir,owner');

Route::resource('/barang_inventaris', BarangInventarisController::class)->middleware('level:admin,kasir');

