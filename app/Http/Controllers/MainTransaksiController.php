<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMainTransaksiRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class MainTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paket'] = Paket::where('outlet_id', auth()->user()->outlet_id)->get();
        $data['member'] = Member::get();
        return view('main-transaksi.index')->with($data);
    }


    public function generateKodeInvoice() {
        $last = Transaksi::orderBy('id', 'desc')->first();
        $last = ($last == null ? 1 : $last->id + 1);
        $kode = sprintf('TKI' . date('Ymd') . '%06d', $last);

        return $kode;
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
    public function store(StoreMainTransaksiRequest $request)
    {
        // dd($request);

        // include semua yang akan di-inputkan
        $request['outlet_id'] = auth()->user()->outlet_id;
        $request['kode_invoice'] = $this->generateKodeInvoice();
        $request['tgl'] = ($request->tgl == 0 ? NULL : date('Y-m-d H:i:s'));
        $request['status'] = 'baru';
        $request['pembayaran'] = ($request->bayar == 0 ? 'belum_dibayar' : 'dibayar');
        $request['id_user'] = auth()->user()->id;


        // proses input transaksi
        $input_transaksi = Transaksi::create($request->all());

        if ($input_transaksi == null) {
            return back()->withErrors([
                'transaksi' => 'Input transaksi gagal, harap cek kembali...'
            ]);
        }

        // proses input detail transaksi
        foreach( $request->id_paket as $i => $v) {
            $input_detail = DetailTransaksi::create([
                'id_transaksi' => $input_transaksi->id,
                'id_paket' => $request->id_paket[$i],
                'qty' => $request->qty[$i],
                'keterangan' => 'sukses'
            ]);
        }

        return back()->with('success', 'Transaksi dan detailnya berhasil ditambahkan!');

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
