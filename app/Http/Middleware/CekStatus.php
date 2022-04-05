<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * fungsi handle untuk menangani berbagai role pada middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        // $user = User::where('email', $request->email)->first();
        // if ($user->role == 'admin') {
        //     return redirect('admin/dashboard');
        // } else if ($user->role == 'kasir') {
        //     return redirect('mahasiswa/dashboard');
        // } else if ($user->role == 'owner') {
        //     return redirect('mahasiswa/dashboard');
        // }

        foreach($levels as $level){
            if (Auth::check() && Auth::user()->role == $level) {
                return $next($request);
            }
        }

        return redirect('/');


    }
}
