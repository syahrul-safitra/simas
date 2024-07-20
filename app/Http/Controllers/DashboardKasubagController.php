<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardKasubagController extends Controller
{
    public function index()
    {
        return view('dashboardKasubag.index');
    }
}
