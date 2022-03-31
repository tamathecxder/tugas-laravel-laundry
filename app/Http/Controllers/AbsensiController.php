<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use App\Exports\TemplateAbsensiExport;
use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Imports\AbsensiImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absensi.index', [
            'absensi' => Absensi::all(),
            'status_karyawan' => config('status_karyawan.status'),
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
     * @param  \App\Http\Requests\StoreAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbsensiRequest $request)
    {
        // // jika status nya masuk, maka waktu selesai kerja diisi dengan jam 15:00:00
        // if ($request->status == 'masuk') {
        //     $request->merge([
        //         'waktu_selesai_kerja' => '15:00:00'
        //     ]);
        // } else if ( $request->status == 'cuti' || $request->status == 'sakit' ) {
        //     $request->merge([
        //         'waktu_selesai_kerja' => '00:00:00'
        //     ]);
        // }

        $absensi = Absensi::create($request->all());

        if ( $absensi ) {
            return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diinput');
        } else {
            return redirect()->route('absensi.index')->with('error', 'Data absensi gagal diinputkan! harap coba lagi...');
        }
    }

    public function statusKaryawan(Request $request)
    {
        $absensi = Absensi::find($request->id);
        $absensi->status = $request->status;
        $absensi->waktu_selesai_kerja = '15:00:00';
        $absensi->save();

        if ( $absensi->status == 'cuti' || $absensi->status == 'sakit' ) {
            $absensi->waktu_selesai_kerja = '00:00:00';
            $absensi->save();
        }

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbsensiRequest  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbsensiRequest $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $update = $absensi->update($request->all());
        if ( $update ) {
            return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diubah');
        } else {
            return redirect()->route('absensi.index')->with('error', 'Data absensi gagal diubah! harap coba lagi...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $delete = $absensi->delete();

        if ( $delete ) {
            return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus');
        } else {
            return redirect()->route('absensi.index')->with('error', 'Data absensi gagal dihapus! harap coba lagi...');
        }
    }

    /**
     * Export data absensi ke excel
     * @return \Illuminate\Http\Response
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date . '_absensi.xlsx');
    }

    /**
     * Import data absensi dari excel ke database
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
            Excel::import(new AbsensiImport, $request->file('excel'));
        } else {
            return back()->withErrors([
                'excel' => 'File excel tidak terisi atau ada kesalahan!',
            ]);
        }

        return redirect()->route('penggunaan_absensi.index')->with('success', 'File excel telah diimport!');
    }

    public function exportTemplate()
    {
        return Excel::download(new TemplateAbsensiExport, 'absensi_template.xlsx');
    }

    public function downloadPDF()
    {
        $data = Absensi::all();
        $pdf = Pdf::loadView('absensi.download-pdf', compact('data'));
        return $pdf->download('data-absensi.pdf');
    }
}
