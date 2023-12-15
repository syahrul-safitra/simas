<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            /* height: 100vh; */
        }

        .container {
            width: 1000px;
            margin: 0 auto;
        }

        .kopsurat {
            padding: 20px 20px 5px 20px;
            display: flex;
            justify-content: center;
        }

        .kopsurat img {
            width: 65px;
        }

        .table-1 {
            padding: 3px;
            /* width: 100%; */
            /* border-bottom: 5px solid black; */
        }

        .tengah {
            text-align: center;
            padding: 0 20px;
        }

        .garis {
            width: 100%;
            height: 3px;
            background-color: black;
            margin-bottom: 5px;
        }

        .main {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .main th,
        .main td {
            padding: 5px;
        }

        .main .no {
            text-align: center;
            /* background-color: aqua; */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="kopsurat">
            <table class="table-1">
                <tr>
                    <td>
                        <img src="{{ asset('img/logo_uin.png') }}" alt="" />
                    </td>

                    <td class="tengah">
                        <h4>KEMENTRIAN AGAMA RI</h4>
                        <h4>UIN SULTHAN THAHA SAIFUDDIN</h4>
                        <h4>JAMBI</h4>

                    </td>
                </tr>
            </table>
        </div>

        <div class="garis">
        </div>

        <!-- table content -->
        <div class="content">

            <h3>Laporan Surat Masuk</h3><br>
            <h4>Periode {{ $tanggal_awal }} - {{ $tanggal_akhir }}</h4>
            <br>

            <table class="main" border="1" bordercollapse="collapse">
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Asal</th>
                    <th>Tanggal Diterima</th>
                    <th>Sifat</th>
                    <th>Isi Ringkas</th>
                    <th>Status</th>
                </tr>
                @foreach ($suratMasuks as $suratMasuk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $suratMasuk->no_surat }}</td>
                        <td>{{ $suratMasuk->tanggal_surat }}</td>
                        <td>{{ $suratMasuk->instansi->nama }}</td>
                        <td>{{ $suratMasuk->tanggal_diterima }}</td>
                        <td>{{ $suratMasuk->sifat }}</td>
                        <td>{{ $suratMasuk->isi_ringkas }}</td>
                        <td>{{ $suratMasuk->status }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>
