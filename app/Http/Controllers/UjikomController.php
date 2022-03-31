<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjikomController extends Controller
{
    public function index()
    {
        return view('ujikom.penjualan-aksesoris');
    }
}
