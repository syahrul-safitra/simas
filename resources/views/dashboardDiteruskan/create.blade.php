@extends('layouts.main')

@section('container')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Ditersukan Kepada</h6>

            @error('nama')
                <div class="alert alert-danger">
                    {{ 'Mohon input check-box minimal 1' }}
                </div>
            @enderror
            <form action="{{ url('dashboard/diteruskan') }}" method="POST">
                @csrf
                {{-- id --}}
                <input type="hidden" name="surat_masuk_id" value="{{ $id }}">
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                        name="catatan" value="{{ @old('catatan') }}" autocomplete="off" autofocus>
                    @error('catatan')
                        <div class="invalid-feedback text-red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <div class="col-md-12 justify-content-between gap-4">
                        @foreach ($users as $user)
                            <div class="d-block">
                                <input type="checkbox" class="form-check-input" value="{{ $user->id }}" name="nama[]"
                                    id="{{ $user->nama }}"
                                    {{ @old('nama') ? (in_array($user->id, @old('nama')) ? 'checked' : '') : '' }}>
                                <label class="form-check-label" for="{{ $user->name }}">{{ $user->name }}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
