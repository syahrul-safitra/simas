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
                    <a href="{{ url('dashboard/pengguna') }}" class="btn btn-info  mb-3"><i
                            class="bi bi-arrow-left-circle me-2"></i>Kembali</a>
                    @if (!$disposisi)
                        <a href="{{ url('dashboard/disposisis/create/' . $suratMasuk->id) }} "
                            class="btn btn-primary mb-3"><i class="bi bi-plus-circle me-2"></i>Tambah</a>
                    @else
                        <a href="{{ url('dashboard/disposisis/' . $disposisi->id) . '/cetak' }} "
                            class="btn btn-success mb-3"><i class="bi bi-printer me-2"></i>Cetak</a>

                        <a href="{{ url('dashboard/disposisi/' . $disposisi->id) . '/edit' }} "
                            class="btn btn-warning mb-3"><i class="bi bi-pencil-square me-2"></i>Edit</a>

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
                        <th scope="row" style="width: 30%">Indek</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $disposisi ? $disposisi->indek_berkas : '' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Kode Klasifikasi</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{!! $disposisi ? $disposisi->kode_klasifikasi_arsip : '' !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tanggal Penyelesaian</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{!! $disposisi ? $disposisi->tanggal_penyelesaian : '' !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Isi</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{!! $disposisi ? $disposisi->isi : '' !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Kepada</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{!! $disposisi ? $disposisi->kepada : '' !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tanggal</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{!! $disposisi ? $disposisi->tanggal : '' !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Pukul</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{!! $disposisi ? $disposisi->pukul->format('H:i') : '' !!}</td>
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
