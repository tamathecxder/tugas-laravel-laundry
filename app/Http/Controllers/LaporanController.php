<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Paket;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class LaporanController
 *
 * @package App\Http\Controllers
 */
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

    /**
     * fungsi generatePDF untuk mencetak laporan
     */
    public function generatePDF() {
        $data = Transaksi::all();

        $pdf = PDF::loadview('laporan.generate-pdf', ['transaksi' => $data]);
        return $pdf->download('laporanpdf.pdf');
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

}
