@extends('layouts.main')

@section('container')
    <form action="{{ url('dashboard/disposisi/' . $disposisi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- row 1 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="no-surat" class="form-label">No Surat</label>
                <input type="text" class="form-control" value="{{ $suratMasuk->no_surat }}" id="no-surat" autocomplete="off"
                    readonly>
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
                <label for="no-disposisi" class="form-label">No Disposisi</label>
                <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor"
                    value="{{ @old('nomor', $disposisi->nomor) }}" id="no-disposisi" autocomplete="off">
                @error('nomor')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="belum-tau" class="form-label">Belum Tau</label>
                <input type="text" class="form-control" id="belum-tau">
            </div>
        </div>

        <!-- row 3 -->
        <div class="row">
            <div class="col-lg-12 mb-3">
                <label for="body" class="form-label">Isi</label>
                @error('isi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="isi" type="hidden" value="{{ old('isi', $disposisi->isi) }}" name="isi" required>
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
                            {{ @old('diketahui', $disposisi->diketahui) ? (in_array($user->id, $disposisi->diketahui) ? 'checked' : '') : '' }}>
                        <label class="form-check-label" for="{{ $user->name }}">{{ $user->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <a href="{{ url('dashboard/suratmasuk') }}" class="btn btn-warning me-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    {{-- ----------------------------------------------------------------------------------------- --}}
    {{-- Script JS --}}
    <script>
        // trix js : 
        document.addEventListener('trix-file-accept', function() {
            e.preventDefault();
        });
    </script>
@endsection
