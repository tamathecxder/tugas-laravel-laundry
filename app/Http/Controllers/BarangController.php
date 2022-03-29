<?php

namespace App\Http\Controllers;

use App\Models\LogDB;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use App\Exports\TemplateBarangExport;
use App\Imports\BarangImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class BarangController
 * @package App\Http\Controllers
 */
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        LogDB::record(Auth::user(), 'Akses view penggunaan barang', 'view barang');
        return view('data-barang.index', [
            'status_barang' => config('status_barang.status'),
            'data_barang' => Barang::all()
        ]);
    }

    /**
     * Menyimpan data barang ke database
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $barang = Barang::create($request->all());

        if ( $barang ) {
            return redirect()->route('penggunaan_barang.index')->with('success', 'Data barang berhasil diinput');
        } else {
            return redirect()->route('penggunaan_barang.index')->with('error', 'Data barang gagal diinputkan! harap coba lagi...');
        }
    }

    /**
     * Mengupdate status barang dan sekaligus mengupdate waktu update status
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function statusBarang(Request $request, $id)
    {
        LogDB::record(Auth::user(), 'Update status barang', 'view barang');

        $barang = Barang::find($id);
        $barang->status = $request->status;
        $barang->waktu_update_status = now();
        $barang->save();

        return redirect()->route('penggunaan_barang.index')->with('success', 'Status barang berhasil diubah');
    }

    /**
     * Memperbarui data barang berdasarkan id
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $update = $barang->update($request->all());
        if ( $update ) {
            return redirect()->route('penggunaan_barang.index')->with('success', 'Data barang berhasil diubah');
        } else {
            return redirect()->route('penggunaan_barang.index')->with('error', 'Data barang gagal diubah! harap coba lagi...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $delete = $barang->delete();

        if ( $delete ) {
            return redirect()->route('penggunaan_barang.index')->with('success', 'Data barang berhasil dihapus');
        } else {
            return redirect()->route('penggunaan_barang.index')->with('error', 'Data barang gagal dihapus! harap coba lagi...');
        }
    }

    /**
     * Export data barang ke excel
     * @return \Illuminate\Http\Response
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new BarangExport, $date . '_penggunaan_barang.xlsx');
    }

    /**
     * Import data barang dari excel ke database
     *
     * @return \Illuminate\Http\Response
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function import(Request $request)
    {
        $validatedData = $request->validate([
            'excel' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        if ( $validatedData ) {
            Excel::import(new BarangImport, $request->file('excel'));
        } else {
            return back()->withErrors([
                'excel' => 'File excel tidak terisi atau ada kesalahan!',
            ]);
        }

        return redirect()->route('penggunaan_barang.index')->with('success', 'File excel telah diimport!');
    }

    public function exportTemplate()
    {
        return Excel::download(new TemplateBarangExport, 'penggunaan_barang_template.xlsx');
    }

    public function downloadPDF()
    {
        $data = Barang::all();
        $pdf = PDF::loadView('data-barang.download-pdf', compact('data'));
        return $pdf->download('data-barang.pdf');
    }

}
