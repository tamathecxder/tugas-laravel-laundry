<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class UjikomController
 *
 * @package App\Http\Controllers
 */
class UjikomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ujikom.penjualan-aksesoris');
    }
}
