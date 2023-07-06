<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard-admin');
    }

    public function helpdesk()
    {
        return view('dashboard-helpdesk');
    }

    public function teknisi()
    {
        return view('dashboard-teknisi');
    }
}
