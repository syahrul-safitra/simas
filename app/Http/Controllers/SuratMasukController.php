<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboardSuratMasuk.index', [
            'suratMasuks' => SuratMasuk::with('instansi')->orderByDesc('tanggal_diterima')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataStatus = ['diketahui', 'dihadiri', 'ditindak lanjuti'];
        $dataSifat = ['biasa', 'rahasia', 'sangat rahasia'];
        return view('dashboardSuratMasuk.create', [
            'instansis' => Instansi::all(),
            'statuss' => $dataStatus,
            'sifats' => $dataSifat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'no_surat' => 'required|unique:surat_masuks|max:255',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'sifat' => 'required',
            'isi_ringkas' => 'required',
            'status' => 'required',
            'instansi_id' => 'required',
            'file' => 'file|max:3072'
        ]);

        // get file : 
        $file = $request->file('file');

        // ubah nama berkas menggunakan str:random + originNamaBerkas : 
        $renameNamaFile = uniqid() . '_' . $file->getClientOriginalName();

        // ubah nama berkas pada validated : 
        $validated['file'] = $renameNamaFile;

        // simpan data kedalam DB : 
        SuratMasuk::create($validated);

        // buat variable nama folder : 
        $tujuan_upload = 'file';

        // lalu pindahkan : 
        $file->move($tujuan_upload, $renameNamaFile);

        return redirect('dashboard/suratmasuk')->with('success', 'Surat Masuk has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratmasuk)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratmasuk)
    {
        $dataStatus = ['diketahui', 'dihadiri', 'ditindak lanjuti'];
        $dataSifat = ['biasa', 'rahasia', 'sangat rahasia'];

        return view('dashboardSuratMasuk.edit', [
            'suratMasuk' => $suratmasuk,
            'instansis' => Instansi::all(),
            'statuss' => $dataStatus,
            'sifats' => $dataSifat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratmasuk)
    {

        // buat rules : 
        $rules = [
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'status' => 'required',
            'instansi_id' => 'required',
            'sifat' => 'required',
            'isi_ringkas' => 'required',
            'file' => 'file|max:3072'
        ];

        // cek apakah no surat diubah : 
        if ($request->no_surat != $suratmasuk->no_surat) {
            // masukan kedalam rules : 
            $rules['no_surat'] = 'required|unique:surat_masuks|max:255';
        }

        // validasi terlebih dahulu : 
        $validated = $request->validate($rules);

        // cek apakah file di ubah : 
        if ($request->file('file')) {
            // get file :
            $file = $request->file('file');

            $renameNamaFile = uniqid() . '_' . $file->getClientOriginalName();

            // ubah nama berkas pada validated :
            $validated['file'] = $renameNamaFile;

            // hapus file lama : 
            File::delete('file/' . $suratmasuk->file);

            // pindah kan file :
            // buat variable nama folder : 
            $tujuan_upload = 'file';

            // lalu pindahkan : 
            $file->move($tujuan_upload, $renameNamaFile);
        }

        // simpan data kedalam DB : 
        SuratMasuk::where('id', $suratmasuk->id)
            ->update($validated);

        return redirect('dashboard/suratmasuk')->with('success', 'Surat Masuk has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratmasuk)
    {

        // hapus data file terlebih dahulu : 
        File::delete('file/' . $suratmasuk->file);

        // hapus data dari db : 
        SuratMasuk::destroy($suratmasuk->id);

        // with() :: adalah session yang digunakan untuk mengirim pesan succes atau error saat data telah di inputkan : 
        return redirect('dashboard/suratmasuk')->with('success', 'Surat telah dihapus!');
    }

    public function delete(SuratMasuk $suratMasuk)
    {
        // hapus data file terlebih dahulu : 
        File::delete('file/' . $suratMasuk->file);

        // hapus data dari db : 
        SuratMasuk::destroy($suratMasuk->id);

        // with() :: adalah session yang digunakan untuk mengirim pesan succes atau error saat data telah di inputkan : 
        return redirect('dashboard/suratmasuk')->with('success', 'Surat telah dihapus!');
    }

    // cetak : 
    public function cetak(Request $request)
    {

        return view('dashboardSuratMasuk.cetak', [
            'suratMasuks' => SuratMasuk::with('instansi')->whereBetween('tanggal_diterima', [$request->tanggal_awal, $request->tanggal_akhir])->orderBy('tanggal_diterima', 'ASC')->get(),
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }

    // for kasubag :
    public function cari1()
    {
        return view('dashboardSuratMasuk.cari1', [
            'suratMasuks' => SuratMasuk::with('instansi')->get()
        ]);
    }

    public function ajax(Request $request)
    {

        $result = SuratMasuk::with('instansi')->where('instansi_id', 'like', '%' . $request->data . '%')
            ->orWhere('no_surat', 'like', '%' . $request->data . '%')
            ->orWhere('tanggal_surat', 'like', '%' . $request->data . '%')
            ->orWhere('tanggal_diterima', 'like', '%' . $request->data . '%')
            ->orWhere('isi_ringkas', 'like', '%' . $request->data . '%')
            ->orWhere('sifat', 'like', '%' . $request->data . '%')
            ->get();

        if ($result->count() >= 1) {
            return view('dashboardSuratMasuk.result1', [
                'suratMasuks' => $result
            ]);
        } else {
            return response()->json([
                'status' => 'nothing_found'
            ]);
        }
    }
}
