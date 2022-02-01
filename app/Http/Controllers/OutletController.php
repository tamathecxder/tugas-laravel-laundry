<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outlet.index', [
            'outlet' => Outlet::all(),
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
     * @param  \App\Http\Requests\StoreOutletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutletRequest $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);
        $outlet = Outlet::create($data);

        if ( $outlet ) {
            return redirect()->route('outlet.index')->with('success', 'Data outlet telah berhasil ditambahkan.');
        } else {
            return redirect()->route('outlet.index')->with('error', 'Data outlet gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutletRequest  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutletRequest $request, $id)
    {
        $outlet = Outlet::findOrFail($id);

        $rules = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);

        $update = $outlet->update($rules);

        if ( $update ) {
            return redirect()->route('outlet.index')->with('success', 'Data outlet telah berhasil di-edit');
        } else {
            return redirect()->route('outlet.index')->with('error', 'Data outlet gagal di-edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);

        $delete = $outlet->delete($id);

        if ( $delete ) {
            return redirect()->route('outlet.index')->with('success', 'Data outlet tersebut telah berhasil dihapus');
        } else {
            return redirect()->route('outlet.index')->with('error', 'Data outlet tersebut gagal dihapus!');
        }
    }
}
