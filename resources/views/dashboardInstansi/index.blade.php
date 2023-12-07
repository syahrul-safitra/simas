@extends('layouts.main')

@section('container')
    <div class="col-12">
        <h4><i class="bi bi-building"></i> Instansi Terkait</h4>
        {{-- pesan success input data :  --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="bg-light rounded h-100 p-4">
            <div class="table-responsive">
                <table class="table table-hover" style="color:black">
                    <a href="{{ url('dashboard/instansi/create') }} " class="btn btn-primary mb-3"><i
                            class="bi bi-plus-circle me-2"></i></i>Add
                        Instansi</a>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instansis as $key => $instansi)
                            <tr>
                                <th scope="row">{{ $instansis->firstItem() + $key }}</th>
                                <td>{{ $instansi->nama }}</td>
                                <td>{{ $instansi->alamat }}</td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <a href="{{ url('dashboard/instansi/' . $instansi->id . '/edit') }}"
                                            class="btn btn-warning"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                class="bi bi-pencil-square"></i></a>

                                        <div class="btn btn btn-danger btn-delete-instansi"
                                            data-id="{{ url('dashboard/instansis/delete/' . $instansi->id) }}"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px">
                                            <i class="bi bi-trash"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- link pagination --}}
                <div class="d-flex flex-column">
                    {{ $instansis->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
