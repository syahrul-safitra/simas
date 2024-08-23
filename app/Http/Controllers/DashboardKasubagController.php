<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\Instansi;
use App\Models\SuratKeluar;

class DashboardKasubagController extends Controller
{
    public function index()
    {

        return view('dashboardKasubag.index', [
            'seluruhSuratMasuk' => SuratMasuk::surat_masuk_all(),
            'seluruhInstansi' => Instansi::seluruh_instansi(),
            'seluruhSuratKeluar' => SuratKeluar::seluruh_surat(),
            'suratMasukBlnIni' => SuratMasuk::surat_masuk_bulan_ini(),
            'suratKeluarBlnIni' => SuratKeluar::surat_keluar_bulan_ini()
        ]);
    }
}
