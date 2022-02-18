<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'id_outlet' => Outlet::all(),
            'user_roles' => config('roles.user_roles'),
        ]);
    }

    public function regist(Request $request, User $user) {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|email',
            'username' => 'required',
            'outlet_id' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
            'role' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        $register = User::create($data);

        if ( $register ) {
            return redirect()->route('login')->with('success', 'Register berhasil!, harap untuk login');
        } else {
            return back()->with('error', 'Data yang dikirmkan tidak valid, cek kembali apakah data sudah sesuai atau tidak.');
        }
    }
}
