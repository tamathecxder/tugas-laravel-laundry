<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

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
        //
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
}
