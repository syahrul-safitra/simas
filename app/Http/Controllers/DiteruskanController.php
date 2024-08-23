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
            'users' => User::where('permission', '1')->get()
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

        // beri notif lewat wa : 

        // get nomor : 
        $users = User::all();

        foreach ($users as $user) {
            if (in_array($user->id, $validated['nama'])) {
                $target[] = $user->no_wa;
            }
        }

        $nomor = implode(',', $target);

        // $curl = curl_init();

        // curl_setopt_array(
        //     $curl,
        //     array(
        //         CURLOPT_URL => 'https://api.fonnte.com/send',
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => '',
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 0,
        //         CURLOPT_FOLLOWLOCATION => true,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => 'POST',
        //         CURLOPT_POSTFIELDS => array(
        //             'target' => $nomor,
        //             'message' => 'Ada surat baru',
        //             'delay' => '5-10'
        //         ),
        //         CURLOPT_HTTPHEADER => array(
        //             'Authorization: f6A5re5CVPn_a!o3219fk#+c!H4nLU@+Tn7BVU6g!'
        //         ),
        //     )
        // );

        // $response = curl_exec($curl);
        // if (curl_errno($curl)) {
        //     $error_msg = curl_error($curl);
        // }
        // curl_close($curl);

        // if (isset($error_msg)) {
        //     echo $error_msg;
        // }

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => '081213215911',
                    'message' => 'test message',
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 4-E_!DH-PoPo#H1_snd3' //change TOKEN to your actual token
                ),
            )
        );

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;

        return redirect('dashboard/diteruskan/' . $validated['surat_masuk_id'])->with('success', 'Data diteruskan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $dataDiteruskan = null;

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

        // lazy eager load :
        $diteruskan->kepadaUser = $diteruskan->kepadaUser->load('user');

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
        $suratMasukId = $diteruskan->surat_masuk_id;

        Diteruskan::destroy($diteruskan->id);

        return redirect('dashboard/diteruskan/' . $suratMasukId)->with('success', 'Diteruskan has been deleted!');
    }

    // public function delete(Diteruskan $diteruskan)
    // {
    //     $suratMasukId = $diteruskan->surat_masuk_id;

    //     Diteruskan::destroy($diteruskan->id);

    //     return redirect('dashboard/diteruskan/' . $suratMasukId)->with('success', 'Diteruskan has been deleted!');
    // }
}
