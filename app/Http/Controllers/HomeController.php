<?php

namespace App\Http\Controllers;

use App\Models\Member;

/**
 * Class MemberController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * fungsi default untuk halaman home
     *
     * @return void
     */
    public function default() {
        return view('home');
    }

    /**
     * fungsi simulasi untuk mengambil data dari database untuk di tampilkan di view
     *
     * @return view
     */
    public function simulasi() {
        return view('etc.simulasi', [

            'member' => Member::all(),
        ]);
    }

    /**
     * fungsi test untuk menampilkan view test
     *
     * @return view
     */
    public function test() {
        return view('etc.test2');
    }

    /**
     * fungsi untuk menampilkan view gaji karyawan
     *
     * @return view
     */
    public function simulasiGajiKaryawan() {
        return view('try-out.gaji-karyawan');
    }

    /**
     * fungsi untuk menampilkan view barang
     *
     * @return view
     */
    public function barang() {
        return view('try-out.barang');
    }
}
