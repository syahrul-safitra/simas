<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mPDF;


class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SuratMasuk $suratMasuk)
    {

        $view = "";
        // jika level adalah master maka tampilkan create disposisi master : 
        if (auth()->user()->level == 'master') {
            $view = 'dashboardDisposisi.create';
        } else {
            $view = 'dashboardPengguna.disposisi.create';
        }

        return view($view, [
            'users' => User::where('permission', '1')->get(),
            'suratMasuk' => $suratMasuk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation data : 
        $validated = $request->validate([
            'indek_berkas' => 'required|unique:disposisis',
            'kode_klasifikasi_arsip' => 'required',
            'tanggal_penyelesaian' => '',
            'tanggal' => '',
            'kepada' => '',
            'pukul' => '',
            'isi' => 'required',
            'diketahui' => 'required',
            'surat_masuk_id' => 'required'
        ]);

        // ubah value validated menjadi type json : 
        $validated['diketahui'] = json_encode($validated['diketahui']);

        // input kedalam table : 
        Disposisi::create($validated);

        // redirect ke
        return redirect('dashboard/disposisi/' . $validated['surat_masuk_id'])->with('success', 'Data disposisi berhasil di buat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $getDisposisi = null;

        // cek apakah data ada atau tidak :
        if (Disposisi::where('surat_masuk_id', $id)->first()) {
            $getDisposisi = Disposisi::where('surat_masuk_id', $id)->first();
        }

        if (Auth::user()->level == 'master') {
            $view = 'dashboardDisposisi.index';
        } else {
            $view = 'dashboardPengguna.disposisi.index';
        }

        return view($view, [
            'suratMasuk' => SuratMasuk::find($id),
            'disposisi' => $getDisposisi,
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disposisi $disposisi)
    {

        if (Auth::user()->level == 'master') {
            $view = 'dashboardDisposisi.edit';
        } else {
            $view = 'dashboardPengguna.disposisi.edit';
        }

        $user = User::all();

        $disposisi->diketahui = json_decode($disposisi->diketahui);

        return view($view, [
            'suratMasuk' => SuratMasuk::find($disposisi->surat_masuk_id),
            'disposisi' => $disposisi,
            'users' => User::where('permission', '1')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disposisi $disposisi)
    {

        $rules = [
            'kode_klasifikasi_arsip' => 'required',
            'tanggal_penyelesaian' => '',
            'tanggal' => '',
            'kepada' => '',
            'pukul' => '',
            'isi' => 'required',
            'diketahui' => 'required',
        ];

        // cek apakah nomor disposisi dirubah : 
        if ($request->indek_berkas != $disposisi->indek_berkas) {
            $rules['indek_berkas'] = 'required|unique:disposisis';
        }

        // validation rules :
        $validated = $request->validate($rules);

        // update disposisis : 
        Disposisi::where('id', $disposisi->id)
            ->update($validated);

        // redirect ke
        return redirect('dashboard/disposisi/' . $disposisi->surat_masuk_id)->with('success', 'Data disposisi berhasil di edit!');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Disposisi $disposisi)
    {
        $suratMasukId = $disposisi->surat_masuk_id;

        // hapus data dari db : 
        Disposisi::destroy($disposisi->id);

        // with() :: adalah session yang digunakan untuk mengirim pesan succes atau error saat data telah di inputkan : 
        return redirect('dashboard/disposisi/' . $suratMasukId)->with('success', 'Disposisi has been deleted!');

    }
    public function delete(Disposisi $disposisi)
    {
        $suratMasukId = $disposisi->surat_masuk_id;

        // hapus data dari db : 
        Disposisi::destroy($disposisi->id);

        // with() :: adalah session yang digunakan untuk mengirim pesan succes atau error saat data telah di inputkan : 
        return redirect('dashboard/disposisi/' . $suratMasukId)->with('success', 'Disposisi has been deleted!');
    }

    // cetak disposisi : 
    public function cetak(Disposisi $disposisi)
    {
        return view('dashboardDisposisi.cetak', [
            'disposisi' => $disposisi,
            'users' => User::where('permission', '1')->get(),
        ]);
    }
}
