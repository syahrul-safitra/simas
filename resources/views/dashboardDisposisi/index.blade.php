@extends('layouts.main')

@section('container')
    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-box-arrow-up"></i> Disposisi</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="bg-light rounded h-100 p-4">
            <table class="table table-striped table-hover">
                <div class="d-flex gap-2">
                    @if (!$disposisi)
                        <a href="{{ url('dashboard/disposisis/create/' . $suratMasuk->id) }} "
                            class="btn btn-primary mb-3"><i class="bi bi-plus-circle me-2"></i></i>Tambah</a>
                    @else
                        <a href="{{ url('dashboard/disposisi/' . $disposisi->id) . '/edit' }} "
                            class="btn btn-warning mb-3"><i class="bi bi-pencil-square me-2"></i></i>Edit</a>

                        <div class="btn btn btn-danger mb-3 " id="btn-delete-disposisi"
                            data-id="{{ url('dashboard/disposisis/delete/' . $disposisi->id) }}">
                            <i class="bi bi-trash me-2"></i>Hapus
                        </div>
                    @endif
                </div>
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
                        <th scope="row" style="width: 30%">Nomor Disposisi</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $disposisi ? $disposisi->nomor : '' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Isi</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{!! $disposisi ? $disposisi->isi : '' !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Diketahui</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">
                            @if ($disposisi)
                                @foreach ($users as $user)
                                    @if (in_array($user->id, json_decode($disposisi->diketahui)))
                                        <p>{{ $user->name }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
