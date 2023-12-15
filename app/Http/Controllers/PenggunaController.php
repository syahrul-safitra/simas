<?php

namespace App\Http\Controllers;

use App\Models\KepadaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index()
    {

        // GATE : permission : 
        $this->authorize('permission');

        $KepadaUser = KepadaUser::where('user_id', Auth::user()->id)->get();

        if (Auth::user()->status == 'staff') {
            $view = 'dashboardStaff.index';
        } else {
            $view = 'dashboardPengguna.index';
        }

        return view($view, [
            'kepadaUsers' => $KepadaUser
        ]);
    }
}
