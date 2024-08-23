@extends('layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Surat Keluar</h6>
                <form action="{{ url('dashboard/suratkeluar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- row 1 -->
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="kode" class="form-label">Kode Klasifikasi</label>
                            <input type="text" class="form-control @error('kode_klasifikasi') is-invalid @enderror"
                                name="kode_klasifikasi" value="{{ @old('kode_klasifikasi') }}" id="kode"
                                autocomplete="off">
                            @error('kode_klasifikasi')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="tanggal-surat" class="form-label">Tanggal Surat Keluar</label>
                            <input type="date" class="form-control @error('tanggal_surat_keluar') is-invalid @enderror"
                                name="tanggal_surat_keluar" value="{{ @old('tanggal_surat_keluar') }}" id="tanggal-surat">
                            @error('tanggal_surat_keluar')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- row 2 -->
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="sifat" class="form-label">Sifat</label>
                            <select class="form-select @error('sifat') is-invalid @enderror" name="sifat" id="sifat">
                                @if (@old('sifat'))
                                    @foreach ($sifats as $sifat)
                                        @if (@old('sifat') == $sifat)
                                            <option value="{{ $sifat }}" selected>{{ $sifat }}</option>
                                        @else
                                            <option value="{{ $sifat }}">{{ $sifat }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="" selected>Pilih</option>
                                    @foreach ($sifats as $sifat)
                                        <option value="{{ $sifat }}">{{ $sifat }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('sifat')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <input type="text" class="form-control @error('isi') is-invalid @enderror" name="isi"
                                value="{{ @old('isi') }}" id="isi-diterima">
                            @error('isi')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- row 3 -->
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <select class="form-select @error('tujuan') is-invalid @enderror" name="tujuan" id="tujuan">
                                @if (@old('tujuan'))
                                    @foreach ($instansis as $instansi)
                                        @if (@old('tujuan') == $instansi->id)
                                            <option value="{{ $instansi->id }}" selected>{{ $instansi->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="" selected>Pilih</option>
                                    @foreach ($instansis as $instansi)
                                        <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('tujuan')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="file" class="form-label">File</label>
                            <input class="form-control" type="file" name="file" id="file"
                                accept="application/pdf" required>
                        </div>
                    </div>

                    <div class="row">

                    </div>

                    <a href="{{ url('dashboard/suratkeluar') }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
