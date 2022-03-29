<?php

namespace App\Http\Controllers;

use App\Models\BarangInventaris;
use Database\Seeders\BarangInventar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BarangInventarisController extends Controller
{
    public function __call($method, $parameters)
    {
        // jika method yang dipanggil adalah index
        if ($method == 'index') {
            // return view('data-barang.index', [
            //     'status_barang' => config('status_barang.status'),
            //     'data_barang' => BarangInventaris::all()
            // ]);
            return view('data-barang.index', [
                'status_barang' => config('status_barang.status'),
                'data_barang' => BarangInventaris::all()
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang-inventaris.index', [
            'barang_inventaris' => BarangInventaris::all(),
            'kondisi' => config('kondisi_barang.kondisi'),
        ]);
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
        $barangInvent = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
        ]);

        $insertBarangInvent = BarangInventaris::create($barangInvent);

        if ( $insertBarangInvent ) {
            return redirect()->back()->with('success', 'Data berhasil ditambah');
        } else {
            return redirect()->back()->with('error', 'Data gagal ditambah');
        }
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
        $barang = BarangInventaris::findOrFail($id);

        $rules = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
        ]);

        $update = $barang->update($rules);

        if ( $update) {
            return redirect()->route('barang_inventaris.index')->with('success', 'Data barang tersebut telah berhasil di-update');
        } else {
            return redirect()->route('barang_inventaris.index')->with('error', 'Data barang tersebut gagal di-update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $barang = BarangInventaris::findOrFail($id);

            $delete = $barang->delete($id);
            if ( $delete ) {
                return redirect()->route('barang_inventaris.index')->with('success', 'Data barang tersebut telah berhasil dihapus');
            }
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('barang_inventaris.index')->with('error', $exception);
        }

    }
}
