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
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class MainTransaksiController
 *
 * @package App\Http\Controllers
 */
class MainTransaksiController extends Controller
{
    /**
     * fungsi untuk meng-generate PDF dan membuatnya bisa didownload
     * @param Request $request
     */
    public function downloadPDF() {
        $paket = Paket::with(['detail'])->get();

        $pdf = PDF::loadview('main-transaksi.test-faktur', ['paket' => $paket]);
        return $pdf->stream();
    }

    /**
     * function untuk mengetest tampilan PDF sebelum dia di-generate
     * @param Request $request
     */
    public function testPDF($id) {
        return view('main-transaksi.test', [
            'transaksi' => Transaksi::all()
        ]);
    }

    /**
     * Menampilkan halaman utama transaksi
     * dengan mem-passing data kedalam view untuk nantinya bisa diakses dan diambil datanya
     * @return \Illuminate\Http\Response
     */
    public function index(Transaksi $transaksi)
    {
        $data['transaksi'] = Transaksi::where('outlet_id', auth()->user()->outlet_id)->get();
        $detail = DetailTransaksi::all();

        $merge = $detail->toArray();

        $results = array();

        foreach( $data['transaksi'] as $key => $data ) {
            $newArray = array();
            $newArray['id'] = $data->id;
            $newArray['kode_invoice'] = $data->kode_invoice;
            $newArray['id_member'] = $data->member->nama;
            $newArray['paket_id'] = $detail[$key]->paket->nama_paket;
            $newArray['tgl'] = $data->tgl;
            $newArray['batas_waktu'] = $data->batas_waktu;
            $newArray['status'] = $data->status;
            $newArray['pembayaran'] = $data->pembayaran;

            $results[] = $newArray;
        }

        $data['paket'] = Paket::with(['detail'])->get();
        $data['member'] = Member::all();

        return view('main-transaksi.index', [
            compact('data'),
            'member' => $data['member'],
            'paket' => $data['paket'],
            'transaksi' => $transaksi,
        ])->with('results', $results);
    }

    /**
     * Menggenerate kode invoice untuk data transaksi dan mengambil data transaksi terakhir
     */
    public function generateKodeInvoice() {
        $last = Transaksi::orderBy('id', 'desc')->first();
        $last = ($last == null ? 1 : $last->id + 1);
        $kode = sprintf('TKI' . date('Ymd') . '%06d', $last);

        return $kode;
    }

    /**
     * Menyimpan sebuah data transaksi baru ke database sekaligus menyimpan data detail transaksi
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainTransaksiRequest $request)
    {
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
        foreach( $request->paket_id as $i => $v) {
            $input_detail = DetailTransaksi::create([
                'transaksi_id' => $input_transaksi->id,
                'paket_id' => $request->paket_id[$i],
                'qty' => $request->qty[$i],
                'keterangan' => 'sukses'
            ]);
        }

        return back()->with('success', 'Transaksi dan detailnya berhasil ditambahkan!');

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
