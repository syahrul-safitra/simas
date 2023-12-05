@extends('layouts.main')

@section('container')
    <div class="col-12">
        <h4>Instansi Terkait</h4>
        <div class="bg-light rounded h-100 p-4">
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
                    @foreach ($instansis as $instansi)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $instansi->nama }}</td>
                            <td>{{ $instansi->alamat }}</td>
                            <td>
                                <div class="d-flex gap-4">
                                    <a href="" class="btn btn-warning"
                                        style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a href="{{ url('') }}" class="btn btn-danger"
                                        style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                            class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
