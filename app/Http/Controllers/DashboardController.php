<?php

namespace App\Http\Controllers;

use App\Models\ActionList;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
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
