@extends('dashboardPengguna.layouts.main')

@section('container')
    <form action="{{ url('dashboard/suratmasuk') }}" method="POST">
        @csrf
        <!-- row 1 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="no-surat" class="form-label">No Surat</label>
                <input type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat"
                    value="{{ @old('no_surat') }}" id="no-surat" autocomplete="off">
            </div>
            <div class="col-lg-6 mb-3">
                <label for="asal-surat" class="form-label">Asal Surat</label>
                <input type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat"
                    value="{{ @old('no_surat') }}" id="asal-surat" autocomplete="off">
            </div>
        </div>

        <!-- row 2 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="no-disposisi" class="form-label">No Disposisi</label>
                <input type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat"
                    value="{{ @old('no_surat') }}" id="no-disposisi" autocomplete="off">
            </div>
            <div class="col-lg-6 mb-3">
                <label for="belum-tau" class="form-label">Belum Tau</label>
                <input type="text" class="form-control" id="belum-tau">
            </div>
        </div>

        <!-- row 3 -->
        <div class="row">
            <div class="col-lg-6 mb-3">
            </div>
            <div class="col-lg-6 mb-3">
            </div>
        </div>

        <a href="{{ url('dashboard/suratmasuk') }}" class="btn btn-warning me-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
