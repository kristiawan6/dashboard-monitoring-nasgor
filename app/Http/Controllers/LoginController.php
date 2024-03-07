<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login', [
            'layout' => 'login'
        ]);
    }

    public function login_proses(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect()->route('dashboard');
        } else {
            // Jika login gagal
            return redirect()->route('login')->with('error', 'Username atau password salah.');
        }
    }
}
