<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function default() {
        return view('home');
    }

    public function simulasi() {
        return view('etc.simulasi', [

            'member' => Member::all(),
        ]);
    }

    public function test() {
        return view('etc.test2');
    }

    public function simulasiGajiKaryawan() {
        return view('try-out.index');
    }
}
