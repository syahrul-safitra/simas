@extends('dashboardPengguna.layouts.main')

@section('container')
    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-envelope"></i> Surat</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="bg-light rounded h-100 p-4">
            <div class="table-responsive">
                <table class="table table-hover" style="color:black">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Asal Surat</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                            <th scope="col">Disposisi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($kepadaUsers as $kepadaUser)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kepadaUser->diteruskan->suratMasuk->instansi->nama }}</td>
                                <td>{{ $kepadaUser->diteruskan->suratMasuk->status }}</td>
                                <td><a href="{{ url('file/' . $kepadaUser->diteruskan->suratMasuk->file) }}">y</a></td>
                                <td><a
                                        href="{{ url('dashboard/disposisi/' . $kepadaUser->diteruskan->suratMasuk->id) }}">D</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
