<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        return View('dashboard.main');
    }
    public function home()
    {
        return View('dashboard.home');
    }
    // public function login()
    // {
    //     return View('dashboard.login');
    // }
    public function login()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'admin') {
                return redirect()->intended('home');
            } else if ($user->role == 'teknisi') {
                return redirect()->intended('homeateknisi');
            }
        }
        return view('dashboard/login');
    }
    public function proses(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong'

            ]
        );
        $kredensial = $request->only('username', 'password');
        if (Auth::attempt($kredensial)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('home');
            } else if ($user->role == 'teknisi') {
                return redirect()->intended('homeateknisi');
            }
        }
        return back()->withErrors([
            'username' => 'username tidak boleh kosong',
            'password' => 'password tidak boleh kosong'
        ])->onlyInput('username', 'password');
    }
}
