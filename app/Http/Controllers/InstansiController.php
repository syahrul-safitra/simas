<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboardInstansi.index', [
            'instansis' => Instansi::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboardInstansi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation data : 
        $validated = $request->validate([
            'nama' => 'required|max:255|unique:instansis',
            'alamat' => 'required|max:255'
        ]);

        Instansi::create($validated);

        // redirect : with() => session yg digunakan untuk menyimpan pesan berhasil yg kemudian dipanggil di dalam dashboard/instansi : 
        return redirect('dashboard/instansi')->with('success', 'New instansi has been addedd!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instansi $instansi)
    {
        return view('dashboardInstansi.edit', [
            'instansi' => $instansi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instansi $instansi)
    {
        $rules = [
            'alamat' => 'required|max:255'
        ];

        // cek apakah nama beruba?
        if ($request->nama != $instansi->nama) {
            // tambahkan rulues : 
            $rules['nama'] = 'required|unique:instansis';
        }

        // validation rules : 
        $validation = $request->validate($rules);

        // ubah data : 
        Instansi::where('id', $instansi->id)
            ->update($validation);

        return redirect('dashboard/instansi')->with('success', 'Instansi has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Instansi $instansi)
    {

        Instansi::destroy($instansi->id);

        // with() :: adalah session yang digunakan untuk mengirim pesan succes atau error saat data telah di inputkan : 
        return redirect('dashboard/instansi')->with('success', 'Instansi has been deleted!');
    }
}
