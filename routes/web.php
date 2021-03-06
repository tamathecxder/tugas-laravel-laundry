<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BarangInventarisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainTransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UjikomController;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', [HomeController::class, 'default'])->middleware('level:kasir,admin,owner', 'auth');

// Member
Route::resource('/member', MemberController::class)->middleware('level:admin');
Route::get('/export/member', [MemberController::class, 'export'])->name('member.export')->middleware('level:admin');
Route::post('/import/member', [MemberController::class, 'import'])->name('member.import')->middleware('level:admin');
Route::get('/export/template/member', [MemberController::class, 'exportTemplate'])->name('member.export-template')->middleware('level:admin');
Route::get('/download-pdf/member', [MemberController::class, 'downloadPDF'])->name('member.downloadPDF')->middleware('level:admin');

// Route outlet
Route::resource('/outlet', OutletController::class)->middleware('level:admin');
Route::get('/export/outlet', [OutletController::class, 'export'])->name('outlet.export')->middleware('level:admin');
Route::post('/import/outlet', [OutletController::class, 'import'])->name('outlet.import')->middleware('level:admin');
Route::get('/export/template/outlet', [OutletController::class, 'exportTemplate'])->name('outlet.export-template')->middleware('level:admin');
Route::get('/download-pdf/outlet', [OutletController::class, 'downloadPDF'])->name('outlet.downloadPDF')->middleware('level:admin');


// Route paket
Route::resource('/paket', PaketController::class)->middleware('level:admin');
Route::get('/export/paket', [PaketController::class, 'export'])->name('paket.export')->middleware('level:admin');
Route::post('/import/paket', [PaketController::class, 'import'])->name('paket.import')->middleware('level:admin');
Route::get('/export/template/paket', [PaketController::class, 'exportTemplate'])->name('paket.export-template')->middleware('level:admin');
Route::get('/download-pdf/paket', [PaketController::class, 'downloadPDF'])->name('paket.downloadPDF')->middleware('level:admin');

// Route penjemputan
Route::resource('/penjemputan', PenjemputanController::class)->middleware('level:admin');
Route::post('/penjemputan/status/{id}', [PenjemputanController::class, 'status'])->name('penjemputan.status');
Route::get('/export/penjemputan', [PenjemputanController::class, 'export'])->name('penjemputan.export')->middleware('auth');
Route::post('/import/penjemputan', [PenjemputanController::class, 'import'])->name('penjemputan.import');

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
// buat route get untuk menangani method show dengan wildcard nya kode_invoice
Route::get('/main-transaksi/{kode_invoice}', [MainTransaksiController::class, 'show'])->name('main-transaksi.show')->middleware('level:admin,kasir');

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index')->middleware('level:admin,kasir,owner');
Route::get('/laporan/generate_pdf', [LaporanController::class, 'generatePDF'])->name('laporan.generate')->middleware('level:admin,kasir,owner');

Route::resource('/barang_inventaris', BarangInventarisController::class)->middleware('level:admin,kasir');

// Simulasi buat UJIKOM
Route::get('/simulasi', [HomeController::class, 'simulasi'])->name('simulasi.sorting')->middleware('level:admin');
Route::get('/test2', [HomeController::class, 'test'])->name('simulasi.test')->middleware('level:admin');
Route::get('/simulasi-gaji-karyawan', [HomeController::class, 'simulasiGajiKaryawan'])->name('simulasi.gaji-karyawan')->middleware('level:admin');
Route::get('/simulasi-transaksi-barang', [HomeController::class, 'barang'])->name('simulasi.transaksi-barang')->middleware('auth');

// Penggunaan Data Barang
Route::resource('/penggunaan_barang', BarangController::class);
Route::post('/status/{id}/barang', [BarangController::class, 'statusBarang'])->name('barang.statusBarang');
Route::get('/export/penggunaan_barang', [BarangController::class, 'export'])->name('barang.export');
Route::post('/import/penggunaan_barang', [BarangController::class, 'import'])->name('barang.import');
Route::get('/export/template/penggunaan_barang', [BarangController::class, 'exportTemplate'])->name('barang.export-template');
Route::get('/download-pdf/penggunaan_barang', [BarangController::class, 'downloadPDF'])->name('barang.downloadPDF');

// Absensi Karyawan
Route::resource('/absensi', AbsensiController::class)->middleware('level:admin');
Route::post('/status/{id}/absensi', [AbsensiController::class, 'statusKaryawan'])->name('absensi.status');
Route::get('/export/absensi', [AbsensiController::class, 'export'])->name('absensi.export');
Route::post('/import/absensi', [AbsensiController::class, 'import'])->name('absensi.import');
Route::get('/export/template/absensi', [AbsensiController::class, 'exportTemplate'])->name('absensi.export-template');
Route::get('/download-pdf/absensi', [AbsensiController::class, 'downloadPDF'])->name('absensi.downloadPDF');

// Ujikom
Route::get('/simulasi-penjualan-aksesoris', [UjikomController::class, 'index'])->name('ujikom.index')->middleware('level:admin');

// Transaksi pada admin dan kasir
/**
 * Route::resource('/transaksi', TransaksiController::class)->middleware('level:admin,kasir', 'auth');
 *
 */

// Route::resource('/transaksi', TransaksiController::class)->middleware('level:admin,kasir', 'auth');
