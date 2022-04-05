<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * Menentukan view yang akan ditampilkan
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()  {
        return view('login.index');
    }

    /**
     * method autheticate untuk mengecek apakah user sudah login atau belum dan jika sudah maka akan diarahkan ke halaman utama
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Credensials yang anda masukkan tidak cocok, harap cek kembali!',
        ]);
    }

    /**
     * Menghapus session dan mengembalikan ke halaman login
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
