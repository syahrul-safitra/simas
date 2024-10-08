@extends('layouts.main')

@section('container')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Surat Keluar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('dashboard/suratkeluars/cetak') }}" method="POST">
                    <div class="modal-body">

                        @csrf
                        <div class="d-flex justify-content-around">
                            <input type="date" name="tanggal_awal" required>
                            <input type="date" name="tanggal_akhir" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-envelope"></i> Surat Keluar</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="bg-light rounded h-100 p-4">
            <div class="table-responsive">
                <table class="table table-hover" style="color:black" id="surat_keluar">
                    <div class="d-flex gap-3">
                        <a href="{{ url('dashboard/suratkeluar/create') }} " class="btn btn-primary mb-3"><i
                                class="bi bi-plus-circle me-2"></i></i>Tambah</a>

                        <a href="{{ url('dashboard/suratkeluars/replyLetter') }} " class="btn btn-info mb-3"><i
                                class="bi bi-send me-2"></i></i>Balas Surat</a>


                        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                class="bi bi-printer me-2"></i>Cetak</button>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Klasifikasi</th>
                            <th scope="col">Tanggal Surat</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Tindak Lanjut Surat</th>
                            <th scope="col">Berkas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($suratKeluars as $suratKeluar)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $suratKeluar->kode_klasifikasi }}</td>
                                <td>{{ $suratKeluar->tanggal_surat_keluar }}</td>
                                <td>{{ $suratKeluar->sifat }}</td>
                                <td>{{ $suratKeluar->isi }}</td>
                                <td>{{ $suratKeluar->SuratMasuk ? $suratKeluar->SuratMasuk->instansi->nama : $suratKeluar->instansi->nama }}
                                </td>
                                <td>{{ $suratKeluar->SuratMasuk ? $suratKeluar->SuratMasuk->no_surat : '' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="fs-4" style="color: red" href="{!! asset('file/' . $suratKeluar->file) !!}"><i
                                                class="bi bi-file-earmark-pdf-fill"></i></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <a href="{{ url('dashboard/suratkeluar/' . $suratKeluar->id . '/edit') }}"
                                            class="btn btn-warning"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                class="bi bi-pencil-square"></i></a>

                                        <form action="{{ url('dashboard/suratkeluar/' . $suratKeluar->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn btn btn-danger btn-delete-suratkeluar"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px">
                                                <i class="bi bi-trash"></i>
                                            </div>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                {{-- link pagination --}}
                <div class="d-flex flex-column">
                    {{ $suratKeluars->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
