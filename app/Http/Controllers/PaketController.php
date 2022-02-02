<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Models\Outlet;
use App\Models\PaketJenis;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('paket.index', [
            'paket' => Paket::all(),
            'jenis' => PaketJenis::$jenis,
            'outletId' => Outlet::all(),
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
     * @param  \App\Http\Requests\StorePaketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaketRequest $request)
    {
        $validationData = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
        ]);

        $paket = Paket::create($validationData);

        if ( $paket ) {
            return redirect()->route('paket.index')->with('success', 'Data paket telah berhasil ditambahkan');
        } else {
            return redirect()->route('paket.index')->with('error', 'Data paket gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaketRequest  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaketRequest $request, $id)
    {
        $paket = Paket::findOrFail($id);

        $rules = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
        ]);

        $update = $paket->update($rules);

        if ( $update ) {
            return redirect()->route('paket.index')->with('success', 'Data paket telah berhasil di-update');
        } else {
            return redirect()->route('paket.index')->with('error', 'Data paket gagal di-update!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);

        $delete = $paket->delete($id);

        if ( $delete ) {
            return redirect()->route('paket.index')->with('success', 'Data paket telah berhasil dihapus...');
        } else {
            return redirect()->route('paket.index')->with('error', 'Data paket gagal dihapus!');
        }
    }
}
