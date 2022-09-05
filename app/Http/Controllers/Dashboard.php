<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function login()
    {
        return View('dashboard.login');
    }
}
