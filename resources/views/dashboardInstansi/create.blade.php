@extends('layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Create new instansi</h6>
                <form action="{{ url('dashboard/instansi') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama instansi</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" value="{{ @old('nama') }}" autocomplete="off" autofocus>
                        @error('nama')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                            id="alamat" value="{{ @old('alamat') }}" autocomplete="off">

                        @error('alamat')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ url('dashboard/instansi') }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
