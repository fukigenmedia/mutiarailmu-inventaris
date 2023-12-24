<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $akses = $request->only('email', 'password');
        if (Auth::attempt($akses)) {
            return redirect('/')->with('success', 'Selamat Datang, '.auth()->user()->name);
        } else {
            return redirect()->back()->with('failed', 'Akun tidak ditemukan');
        }
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('login');
    }
}
