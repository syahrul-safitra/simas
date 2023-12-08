<?php

namespace App\Http\Controllers;

use App\Models\KepadaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index()
    {

        $KepadaUser = KepadaUser::where('user_id', Auth::user()->id)->get();

        return view('dashboardPengguna.index', [
            'kepadaUsers' => $KepadaUser
        ]);
    }
}
