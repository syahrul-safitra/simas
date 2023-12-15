<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\Diteruskan;
use App\Models\KepadaUser;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function test1(Request $request)
    {
        // dd($request->all());

        $data = [
            'no_surat' => $request->no_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_diterima' => $request->tanggal_diterima,
            'file' => $request->file,
            'status' => $request->status,
            'instansi_id' => $request->instansi_id
        ];

        SuratMasuk::create($data);

        // dd($data);
        // dd($request->all());
        // dd($request->all);
    }

    public function test2()
    {
        $Mhs = ['ucup', 'bambang', 'otong'];
        // implode : mengubah array menjadi string : 
        // $MhsToString = implode(" ", $Mhs);
        $search = 'otong';

        echo in_array($search, $Mhs);
    }

    public function test3()
    {
        // SERIALIZE : 
        // buat array : 
        $data = ['dekan', 'fisika', 'kimia', 'sistem informasi', 'biologi'];

        // conver to serialize : 
        $ConvertToSerialize = serialize($data);

        echo $ConvertToSerialize;

        $Unserialize = unserialize($ConvertToSerialize);
    }

    public function test4()
    {
        // MENYIMPAN DATA ARRAY KEDALAM DATABASE DENGAN CONVER JSON : 
        $data = ['dekan', 'fisika', 'kimia', 'sistem informasi', 'biologi'];

        // JSON Encode() : 
        $converToJson = json_encode($data);

        echo $converToJson . ' ' . '<br>';

        // JSON Decode() : json to php : 
        $converToPhp = json_decode($converToJson);

        var_dump($converToPhp);
    }

    public function test5()
    {
        $users = ['wd2', 'biologi', 'SIG'];
        $suratId = 2;

        // encode users : 
        $dataUsers = json_encode($users);

        // rapikan data input :
        $data = [
            'users' => $dataUsers,
            'surat_masuk_id' => $suratId,
        ];

        // input dalam table teruskan : 
        Diteruskan::create($data);
    }

    public function test6()
    {
        $getDiteruskan = Diteruskan::firstWhere('id', 2);

        dd($getDiteruskan);
    }

    public function test7()
    {
        return view('welcome2');
    }

    public function test8()
    {
        $get = Diteruskan::where('surat_masuk_id', 1)->first();

        echo $get['id'];
    }

    public function test9()
    {
        $x = KepadaUser::find(6);
        dd($x->user);
    }

    public function test10()
    {
        SuratMasuk::where('instansi_id', 4)->delete();

        return 'di delete';
    }

    public function test11()
    {
        return Auth::user();
    }

    public function test12()
    {

        $messege = 'UIN STS JAMBI';
        $target = '0831-6584-6919,0895-1613-4562,0857-8832-7233';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => 'Ada surat masuk dari' . $messege,
                'delay' => '5-10'
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 1T0b@R-A_x60R28h2AQF'
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;
    }
}
