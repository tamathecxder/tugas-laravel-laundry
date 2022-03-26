<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Paket;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['transaksi'] = Transaksi::where('outlet_id', auth()->user()->outlet_id)->get();
        // $products = DB::table('tb_detail_transaksi')
        //     ->join('tb_transaksi', 'tb_detail_transaksi.id_transaksi', '=', 'tb_transaksi.id')->where('outlet_id', auth()->user()->outlet_id)->get();
        $products = Transaksi::all();
        
        return view('laporan.index', [
            'transaksi' => $products,
            'detail_transaksi' => DetailTransaksi::all()
        ]);
    }

    public function generatePDF() {
        $data = Transaksi::all();

        $pdf = PDF::loadview('laporan.generate-pdf', ['transaksi' => $data]);
        return $pdf->download('laporanpdf.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
