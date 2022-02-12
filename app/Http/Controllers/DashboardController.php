<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $this->middleware('admin');
        $username = auth()->user()->username;
        $active = 'Dashboard';
        return view('dashboard.index', compact('username', 'active'));
    }

    public function indexKaryawan()
    {
        $this->middleware('karyawan');
        $username = auth()->user()->username;
        $active = 'Dashboard';
        return view('dashboard.index', compact('username', 'active'));
    }
}
