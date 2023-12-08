<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.index');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // check authentication : 
        if (Auth::attempt($validated)) {
            // buat session : 
            $request->session()->regenerate();

            // cek apakah kasubag atau staff yang login : 
            if ($request->email === 'kasubag@gmail.com' || $request->email === 'staff@gmail.com') {
                // redirect ke halaman dashboard index : 
                return redirect()->intended('/');
            }

            // arahkan ke tujuan :
            return redirect()->intended('/dashboard/pengguna');
        }

        // // jika gagal maka tampilkan failed pada halaman login :
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        // menghapus atau melogout authentication user : 
        Auth::logout();

        // hapus session user : 
        $request->session()->invalidate();

        // buat ulang session token : 
        $request->session()->regenerateToken();

        // lalu redirect ke login : 
        return redirect('login');
    }
}
