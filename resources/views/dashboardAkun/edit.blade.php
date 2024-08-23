@extends('layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit user</h6>
                <form action="{{ url('dashboard/user/' . $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ @old('name', $user->name) }}" autocomplete="off">
                        @error('name')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ @old('email', $user->email) }}" autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_wa" class="form-label">No Wa</label>
                        <input type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa"
                            id="no_wa" value="{{ @old('no_wa', $user->no_wa) }}" autocomplete="off">
                        @error('no_wa')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" autocomplete="off">
                        @error('password')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <a href="{{ url('dashboard/user') }}" class="btn btn-warning me-2">Batal</a>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
