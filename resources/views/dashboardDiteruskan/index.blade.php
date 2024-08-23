@extends('layouts.main')

@section('container')
    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-box-arrow-up"></i> Diteruskan</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="bg-light rounded h-100 p-4">

            <div class="d-flex gap-2">

                <a href="{{ url('dashboard/suratmasuk') }}" class="btn btn-info  mb-3"><i
                        class="bi bi-arrow-left-circle me-2"></i>Kembali</a>
                @if (!$diteruskan)
                    <a href="{{ url('dashboard/diteruskan/create/' . $suratMasuk->id) }} " class="btn btn-primary mb-3"><i
                            class="bi bi-plus-circle me-2"></i></i>Tambah</a>
                @else
                    <a href="{{ url('dashboard/diteruskan/' . $diteruskan->id) . '/edit' }} "
                        class="btn btn-warning mb-3"><i class="bi bi-pencil-square me-2"></i></i>Edit</a>

                    <form action="{{ url('dashboard/diteruskan/' . $diteruskan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-delete-diteruskan">
                            <i class="bi bi-trash"> </i>Hapus
                        </button>
                    </form>
                @endif

            </div>
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <th scope="row" style="width: 30%">Nomor Surat</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $suratMasuk->no_surat }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Asal Surat</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $suratMasuk->instansi->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tanggal Surat</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $suratMasuk->tanggal_surat }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Status</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $suratMasuk->status }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Catatan</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $diteruskan ? $diteruskan->catatan : '' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Diteruskan Kepada</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">
                            @if ($diteruskan)
                                @foreach ($diteruskan->kepadaUser as $user)
                                    <p>{{ $loop->iteration . '. ' . $user->user->name }}</p>
                                @endforeach
                            @else
                                <p></p>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
