<?php

namespace App\Http\Controllers;

use App\Exports\PaketExport;
use App\Exports\TemplatePaketExport;
use App\Models\Paket;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Imports\PaketImport;
use App\Models\Outlet;
use App\Models\PaketJenis;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;


/**
 * Class PaketController
 *
 * @package App\Http\Controllers
 */
class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paket'] = Paket::where('outlet_id', auth()->user()->outlet_id)->get();
        $data['outlet'] = Outlet::where('id', auth()->user()->outlet_id)->get();
        return view('paket.index', [
            'jenis' => PaketJenis::$jenis,
        ])->with($data);
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
            'outlet_id' => 'required',
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
            'outlet_id' => 'required',
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

    /**
     * Export data paket to excel
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export() {
        $tanggal = date('Y-m-d');
        return Excel::download(new PaketExport, $tanggal . "_paket.xlsx");
    }

    /**
     * fungsi import untuk mengimport data paket dari excel ke database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request) {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ( $request ) {
            Excel::import(new PaketImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        return redirect()->route('paket.index')->with('success', 'File excel berhasil diimport!');
    }

    /**
     * fungsi exportTemplate untuk mengekspor template paket yang nantinya akan dipakai untuk import data paket
     *
     * @return \Illuminate\Http\Response
     */
    public function exportTemplate()
    {
        return Excel::download(new TemplatePaketExport, 'paket_template.xlsx');
    }

    /**
     * fungsi pdf untuk mengekspor data paket ke pdf
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF()
    {
        $data = Paket::where('outlet_id', auth()->user()->outlet_id)->get();
        $pdf = PDF::loadView('paket.download-pdf', compact('data'));
        return $pdf->download('paket.pdf');
    }
}
