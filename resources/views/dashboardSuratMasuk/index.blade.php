@extends('layouts.main')

@section('container')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Surat Masuk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('dashboard/suratmasuks/cetak') }}" method="POST">
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
        <h4 class="mb-2"><i class="bi bi-envelope"></i> Surat Masuk</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="bg-light rounded h-100 p-4">
            <div class="table-responsive">
                {{-- <table class="table table-hover" style="color:black" id="surat_masuk"> --}}
                <table class="table table-hover" id="surat_masuk" style="color:black">

                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-3">
                            <a href="{{ url('dashboard/suratmasuk/create') }} " class="btn btn-primary mb-3"><i
                                    class="bi bi-plus-circle me-2"></i></i>Tambah</a>

                            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-printer me-2"></i>Cetak</button>
                        </div>

                    </div>

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Asal Surat</th>
                            <th scope="col">Tanggal Surat</th>
                            <th scope="col">Tanggal Diterima</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">Isi Ringkas</th>
                            <th scope="col">Status</th>
                            <th scope="col">Berkas</th>
                            @if (auth()->user()->status == 'kasubag')
                                <th scope="col">Diteruskan</th>
                            @endif
                            <th scope="col">Disposisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (auth()->user()->status == 'kasubag')
                            @foreach ($suratMasuks as $suratMasuk)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $suratMasuk->no_surat }}</td>
                                    <td>{{ $suratMasuk->instansi->nama }}</td>
                                    <td>{{ $suratMasuk->tanggal_surat }}</td>
                                    <td>{{ $suratMasuk->tanggal_diterima }}</td>
                                    <td>{{ $suratMasuk->sifat }}</td>
                                    <td>{{ $suratMasuk->isi_ringkas }}</td>
                                    <td>{{ $suratMasuk->status }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a class="fs-4" style="color: red" href="{!! asset('file/' . $suratMasuk->file) !!}"><i
                                                    class="bi bi-file-earmark-pdf-fill"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <a href="{{ url('dashboard/diteruskan/' . $suratMasuk->id) }}"
                                                class="btn btn-primary"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                    class="bi bi-arrow-up-square"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('dashboard/disposisi/' . $suratMasuk->id) }}"
                                            class="btn btn-success"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                class="bi bi-file-earmark-arrow-up"></i></a>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-4">
                                            <a href="{{ url('dashboard/suratmasuk/' . $suratMasuk->id . '/edit') }}"
                                                class="btn btn-warning"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <form action="{{ url('dashboard/suratmasuk/' . $suratMasuk->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn btn btn-danger btn-delete-suratmasuk"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px">
                                                    <i class="bi bi-trash"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach ($suratMasuks as $suratMasuk)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $suratMasuk->no_surat }}</td>
                                    <td>{{ $suratMasuk->instansi->nama }}</td>
                                    <td>{{ $suratMasuk->tanggal_surat }}</td>
                                    <td>{{ $suratMasuk->tanggal_diterima }}</td>
                                    <td>{{ $suratMasuk->sifat }}</td>
                                    <td>{{ $suratMasuk->isi_ringkas }}</td>
                                    <td>{{ $suratMasuk->status }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a class="fs-4" style="color: red" href="{!! asset('file/' . $suratMasuk->file) !!}"><i
                                                    class="bi bi-file-earmark-pdf-fill"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('dashboard/disposisi/' . $suratMasuk->id) }}"
                                            class="btn btn-success"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                class="bi bi-file-earmark-arrow-up"></i></a>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-4">
                                            <a href="{{ url('dashboard/suratmasuk/' . $suratMasuk->id . '/edit') }}"
                                                class="btn btn-warning"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <form action="{{ url('dashboard/suratmasuk' . $suratMasuk->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn btn btn-danger btn-delete-suratmasuk"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px">
                                                    <i class="bi bi-trash"></i>
                                                </div>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
