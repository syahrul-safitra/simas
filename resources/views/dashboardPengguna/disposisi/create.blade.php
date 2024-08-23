@extends('dashboardPengguna.layouts.main')

@section('container')
    <form action="{{ url('dashboard/disposisi') }}" method="POST">
        @csrf
        {{-- input hidden no_surat_masuk --}}
        <input type="hidden" name="surat_masuk_id" value="{{ $suratMasuk->id }}">

        <!-- row 1 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="no-surat" class="form-label">No Surat</label>
                <input type="text" class="form-control" value="{{ $suratMasuk->no_surat }}" id="no-surat"
                    autocomplete="off" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <label for="asal-surat" class="form-label">Asal Surat</label>
                <input type="text" class="form-control" value="{{ $suratMasuk->instansi->nama }}" id="asal-surat"
                    autocomplete="off" readonly>
            </div>
        </div>

        <!-- row 2 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="indek" class="form-label">Indek</label>
                <input type="text" class="form-control @error('indek_berkas') is-invalid @enderror" name="indek_berkas"
                    value="{{ @old('indek_berkas') }}" id="indek" autocomplete="off">
                @error('indek')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" class="form-control" name="kode_klasifikasi_arsip"
                    value="{{ @old('kode_klasifikasi_arsip') }}" id="kode">
                @error('kode_klasifikasi_arsip')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- row 3 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="tgl-penyelesaian" class="form-label">Tanggal Penyelesaian</label>
                <input type="date" class="form-control @error('tanggal_penyelesaian') is-invalid @enderror"
                    name="tanggal_penyelesaian" value="{{ @old('tanggal_penyelesaian') }}" id="tgl-penyelesaian"
                    autocomplete="off">
                @error('tanggal_penyelesaian')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{ @old('tanggal') }}" id="tanggal">
                @error('tanggal')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- row 4 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="kepada" class="form-label">Kepada</label>
                <input type="text" class="form-control @error('kepada') is-invalid @enderror" name="kepada"
                    value="{{ @old('kepada') }}" id="kepada" autocomplete="off">
                @error('kepada')
                    <p class="text-danger">{{ $kepada }}</p>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="pukul" class="form-label">Pukul</label>
                <input type="time" class="form-control" name="pukul" value="@old('pukul')" id="pukul">
                @error('pukul')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- row 5 -->
        <div class="row">
            <div class="col-lg-12 mb-3">
                <label for="body" class="form-label">Isi</label>
                @error('isi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="isi" type="hidden" value="{{ old('isi') }}" name="isi" required>
                <trix-editor input="isi"></trix-editor>
            </div>
            <div class="col-lg-6 mb-3">
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12 mb-3">
                @error('diketahui')
                    <div class="alert alert-danger">
                        {{ 'Mohon input check-box minimal 1' }}
                    </div>
                @enderror
                @foreach ($users as $user)
                    <div class="d-block">
                        <input type="checkbox" class="form-check-input" value="{{ $user->id }}" name="diketahui[]"
                            {{ @old('diketahui') ? (in_array($user->id, @old('diketahui')) ? 'checked' : '') : '' }}>
                        <label class="form-check-label" for="{{ $user->name }}">{{ $user->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <a href="{{ url('dashboard/pengguna') }}" class="btn btn-warning me-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    {{-- Script JS --}}
    <script>
        // trix js : 
        document.addEventListener('trix-file-accept', function() {
            e.preventDefault();
        });
    </script>
@endsection
