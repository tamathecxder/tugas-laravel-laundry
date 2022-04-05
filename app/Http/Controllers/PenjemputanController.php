<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use App\Models\Member;
use App\Http\Requests\StorePenjemputanRequest;
use App\Http\Requests\UpdatePenjemputanRequest;
use Illuminate\Http\Request;
use App\Imports\PenjemputanImport;
use App\Exports\PenjemputanExport;
use Maatwebsite\Excel\Facades\Excel;


/**
 * Class PenjemputanController
 *
 * @package App\Http\Controllers
 */
class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penjemputan.index', [
            'penjemputan' => Penjemputan::all(),
            'member' => Member::all(),
            'status' => config('status_penjemputan.status'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenjemputanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjemputanRequest $request)
    {
        $penjemputan = Penjemputan::create($request->all());

        if ( $penjemputan ) {
            return redirect()->route('penjemputan.index')->with('success', 'Data penjemputan berhasil diinput');
        } else {
            return redirect()->route('penjemputan.index')->with('error', 'Data penjemputan gagal diinputkan! harap coba lagi...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjemputanRequest  $request
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjemputanRequest $request, Penjemputan $penjemputan)
    {
        $update = $penjemputan->update($request->all());

        if ( $update ) {
            return redirect()->route('penjemputan.index')->with('success', 'Data penjemputan berhasil diupdate');
        } else {
            return redirect()->route('penjemputan.index')->with('error', 'Data penjemputan gagal diupdate! harap coba lagi...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjemputan $penjemputan)
    {
        $delete = $penjemputan->delete();

        if ( $delete ) {
            return redirect()->route('penjemputan.index')->with('success', 'Data penjemputan berhasil dihapus!');
        }
    }

    /**
     * Export data penjemputan to excel
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new PenjemputanExport, $date . "_penjemputan.xlsx");
    }

    /**
     * Import data penjemputan dari excel ke database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request) {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ( $request ) {
            Excel::import(new PenjemputanImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'import' => 'file belum terisi',
            ]);
        }

        return redirect()->route('penjemputan.index')->with('success', 'File excel berhasil diimport!');
    }

    /**
     * Mengganti status penjemputan
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $ganti = Penjemputan::where('id', $id)->update(array('status' => $request->status));

        if ( $ganti ) return back();
    }
}
