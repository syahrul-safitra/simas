<?php

namespace App\Http\Controllers;

use App\Models\Diteruskan;
use App\Models\KepadaUser;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;

class DiteruskanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboardDiteruskan.index');
    }

    // public function dashboard($id)
    // {
    //     return 'ini adalah dashboard';
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('dashboardDiteruskan.create', [
            'id' => $id,
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // Validation : 
        $validated = $request->validate([
            'surat_masuk_id' => 'required|unique:diteruskans',
            'catatan' => 'required',
            'nama' => 'required'
        ]);

        // create variable to save data diteruskan : 
        $dataDiteruskan = [
            'catatan' => $validated['catatan'],
            'surat_masuk_id' => $validated['surat_masuk_id']
        ];

        // input kedalam table diteruskan : 
        Diteruskan::create($dataDiteruskan);

        // ambil data Diteruskan Berdasarkan 'surat_masuk_id' == unique;
        $getDiteruskan = Diteruskan::where('surat_masuk_id', $validated['surat_masuk_id'])->first();

        // input kepada_users : 
        foreach ($validated['nama'] as $nama) {
            KepadaUser::create([
                'diteruskan_id' => $getDiteruskan->id,
                'user_id' => $nama
            ]);
        }

        return redirect('dashboard/diteruskan/' . $validated['surat_masuk_id'])->with('success', 'Data diteruskan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $dataDiteruskan = null;

        $x = Diteruskan::where('surat_masuk_id', $id)->first();

        // return $x ? 'ada' : 'tidak ;

        // cek apakah data ada atau tidak : 
        if (Diteruskan::where('surat_masuk_id', $id)->first()) {
            $dataDiteruskan = Diteruskan::where('surat_masuk_id', $id)->first()->load('kepadaUser.user');
        }

        return view('dashboardDiteruskan.index', [
            'suratMasuk' => SuratMasuk::find($id),
            'diteruskan' => $dataDiteruskan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diteruskan $diteruskan)
    {

        foreach ($diteruskan->kepadaUser as $userr) {
            $users_cheked[] = $userr->user->id;
        }

        return view('dashboardDiteruskan.edit', [
            'diteruskan' => $diteruskan,
            'users' => User::all(),
            'user_checked' => $users_cheked
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diteruskan $diteruskan)
    {
        // validation : 
        $validated = $request->validate([
            'catatan' => 'required',
            'nama' => 'required'
        ]);

        // ubah catatan : 
        Diteruskan::where('id', $diteruskan->id)
            ->update(['catatan' => $validated['catatan']]);

        // untuk mengubah data pada users diteruskan : 
        // a. hapus seluruh data yang id nya sama dengan id diteruskan :
        KepadaUser::where('diteruskan_id', $diteruskan->id)->delete();

        // lalu input baru nama baru : 
        foreach ($request->nama as $newNama) {
            KepadaUser::create([
                'diteruskan_id' => $diteruskan->id,
                'user_id' => $newNama
            ]);
        }

        // redirect : 
        return redirect('dashboard/diteruskan/' . $diteruskan->surat_masuk_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diteruskan $diteruskan)
    {
        // 
    }

    public function delete(Diteruskan $diteruskan)
    {
        $suratMasukId = $diteruskan->surat_masuk_id;

        Diteruskan::destroy($diteruskan->id);

        return redirect('dashboard/diteruskan/' . $suratMasukId)->with('success', 'Diteruskan has been deleted!');
    }
}
