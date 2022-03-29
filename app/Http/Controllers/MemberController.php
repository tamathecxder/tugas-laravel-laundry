<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use App\Exports\TemplateMemberExport;
use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Imports\MemberImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.index', [
            'member' => Member::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $validationData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required|digits:12',
            'jenis_kelamin' => 'required',
        ]);

        $member = Member::create($validationData);

        if ( $member ) {
            return redirect()->route('member.index')->with('success', 'Data member telah berhasil ditambahkan');
        } else {
            return redirect()->route('member.index')->with('error', 'Data member gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        $member = Member::findOrFail($id);

        $rules = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $update = $member->update($rules);

        if ( $update) {
            return redirect()->route('member.index')->with('success', 'Data member tersebut telah berhasil di-update');
        } else {
            return redirect()->route('member.index')->with('success', 'Data member tersebut gagal di-update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        $delete = $member->delete($id);

        if ( $delete )  {
            return redirect()->route('member.index')->with('success', 'Data member tersebut telah berhasil dihapus');
        } else {
            return redirect()->route('member.index')->with('success', 'Data member tersebut gagal dihapus');
        }
    }

    public function export() {
        $date = date('Y-m-d');
        return Excel::download(new MemberExport, $date . '_member.xlsx');
    }

    public function import(Request $request) {
        $validatedData = $request->validate([
            'excel' => 'required|mimes:xlsx,csv,xls|file',
        ]);

        if ( $validatedData ) {
            Excel::import(new MemberImport, $request->file('excel'));
        } else {
            return back()->withErrors([
                'excel' => 'File belum diisi atau ada kesalahan, harap coba lagi!',
            ]);
        }

        return redirect()->route('member.index')->with('success', 'File excel berhasil diimport!');
    }

    public function exportTemplate()
    {
        return Excel::download(new TemplateMemberExport, 'member_template.xlsx');
    }

    public function downloadPDF()
    {
        $data = Member::all();
        $pdf = PDF::loadView('member.download-pdf', compact('data'));
        return $pdf->download('member.pdf');
    }
}
