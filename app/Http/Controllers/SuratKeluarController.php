<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(SuratKeluar::all());
        return view('dashboardSuratKeluar.index', [
            'suratKeluars' => SuratKeluar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // dd();
        $sifat = ['biasa', 'rahasia', 'sangat rahasia'];
        return view('dashboardSuratKeluar.create', [
            'sifats' => $sifat,
            'suratMasuks' => SuratMasuk::where('status', 'ditindak lanjuti')
                ->where('keadaan', 'proses')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'kode_klasifikasi' => 'required|unique:surat_keluars',
            'tanggal_surat_keluar' => 'required',
            'sifat' => 'required',
            'isi' => 'required',
            'file' => 'required',
            'tujuan' => 'required',
        ];

        // cek surat_masuk ada atau tidak : 
        if ($request->surat_masuk_id) {
            $rules['surat_masuk_id'] = 'unique:surat_keluars';
        }

        // validation :
        $validated = $request->validate($rules);

        // get file : 
        $file = $request->file('file');

        // ubah nama berkas menggukan uniqid + originalClientName : 
        $ranameNamaFile = uniqid() . '_' . $file->getClientOriginalName();

        // ubah nama berkas pada validated : 
        $validated['file'] = $ranameNamaFile;

        // simpan data kedalam DB : 
        SuratKeluar::create($validated);

        // buat variable nama folder : 
        $tujuan_upload = 'file';

        // pindahkan file :
        $file->move($tujuan_upload, $ranameNamaFile);

        // jangan lupa untuk mengubah value colom keadaan = 'selesa'.
        if ($request->surat_masuk_id) {
            SuratMasuk::where('id', $request->surat_masuk_id)->update(['keadaan' => 'selesai']);
        }

        return redirect('dashboard/suratkeluar')->with('success', 'Surat Keluar has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratkeluar)
    {
        return $suratkeluar;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratkeluar)
    {
        $sifat = ['biasa', 'rahasia', 'sangat rahasia'];

        return view('dashboardSuratKeluar.edit', [
            'sifats' => $sifat,
            'suratKeluar' => $suratkeluar,
            // 'suratMasuks' => SuratMasuk::where('status', 'ditindak lanjuti')
            //     ->where('keadaan', 'proses')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratkeluar)
    {
        // buat rules : 
        $rules = [
            'tanggal_surat_keluar' => 'required',
            'sifat' => 'required',
            'isi' => 'required',
            'file' => 'file|max:3072',
            'tujuan' => 'required',
        ];

        // cek apakah kode_klasifikasi berubah : 
        if ($request->kode_klasifikasi != $suratkeluar->kode_klasifikasi) {
            // masukan kedalam rules : 
            $rules['kode_klasifikasi'] = 'required|unique:surat_keluars';
        }

        // validasi terlebih dahulu : 
        $validated = $request->validate($rules);

        // cek apakah file di ubah : 
        if ($request->file('file')) {
            // get file : 
            $file = $request->file('file');

            $renameNamaFile = uniqid() . '_' . $file->getClientOriginalName();

            // ubah nama berkas pada $validated
            $validated['file'] = $renameNamaFile;

            // hapus file lama : 
            File::delete('file/' . $suratkeluar->file);

            // buat varibale tujuan upload
            $tujuan_upload = 'file';

            // pindahkan : 
            $file->move($tujuan_upload, $renameNamaFile);
        }

        SuratKeluar::where('id', $suratkeluar->id)
            ->update($validated);

        return redirect('dashboard/suratkeluar')->with('success', 'Surat Keluar has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratkeluar)
    {
        //
    }

    public function delete(SuratKeluar $suratkeluar)
    {
        // get nama file 
        $fileName = $suratkeluar->file;

        // cek apakah surat masuk id ada atau tidak : 
        if ($suratkeluar->surat_masuk_id) {
            // jika true ubah valuenya : 
            SuratMasuk::where('id', $suratkeluar->surat_masuk_id)
                ->update(['keadaan' => 'proses']);
        }

        // hapus datanya : 
        SuratKeluar::destroy($suratkeluar->id);

        // hapus filenya : 
        File::delete('file/' . $suratkeluar->file);

        // with() :: adalah session yang digunakan untuk mengirim pesan succes atau error saat data telah di inputkan : 
        return redirect('dashboard/suratkeluar')->with('success', 'Surat Keluar has been deleted!');
    }
}
