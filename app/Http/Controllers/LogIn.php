<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogIn extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'admin') {
                return redirect()->intended('homeadmin');
            } else if ($user->role == 'teknisi') {
                return redirect()->intended('homeateknisi');
            }
        }
        return view('LogIn.view_login');
    }
    public function proses(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'username' => 'username tidak boleh kosong',
            'password' => 'password tidak boleh kosong'
        ]);
    }
}
