<div class="table-data">
    <table class="table table-hover" style="color:black">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Asal Surat</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Tanggal Diterima</th>
                <th scope="col">Sifat</th>
                <th scope="col">Isi Ringkas</th>
                <th scope="col">Status</th>
                <th scope="col">Berkas</th>
                @if (auth()->user()->status == 'kasubag')
                    <th scope="col">Diteruskan</th>
                @endif
                <th scope="col">Disposisi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @if (auth()->user()->status == 'kasubag')
                @foreach ($suratMasuks as $suratMasuk)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $suratMasuk->no_surat }}</td>
                        <td>{{ $suratMasuk->instansi->nama }}</td>
                        <td>{{ $suratMasuk->tanggal_surat }}</td>
                        <td>{{ $suratMasuk->tanggal_diterima }}</td>
                        <td>{{ $suratMasuk->sifat }}</td>
                        <td>{{ $suratMasuk->isi_ringkas }}</td>
                        <td>{{ $suratMasuk->status }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="fs-4" style="color: red" href="{!! asset('file/' . $suratMasuk->file) !!}"><i
                                        class="bi bi-file-earmark-pdf-fill"></i></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">

                                <a href="{{ url('dashboard/diteruskan/' . $suratMasuk->id) }}" class="btn btn-primary"
                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                        class="bi bi-arrow-up-square"></i></a>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('dashboard/disposisi/' . $suratMasuk->id) }}" class="btn btn-success"
                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                    class="bi bi-file-earmark-arrow-up"></i></a>
                        </td>
                        <td>
                            <div class="d-flex gap-4">
                                <a href="{{ url('dashboard/suratmasuk/' . $suratMasuk->id . '/edit') }}"
                                    class="btn btn-warning"
                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                        class="bi bi-pencil-square"></i></a>

                                <div class="btn btn btn-danger btn-delete-suratmasuk"
                                    data-id="{{ url('dashboard/suratmasuks/delete/' . $suratMasuk->id) }}"
                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px">
                                    <i class="bi bi-trash"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($suratMasuks as $suratMasuk)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $suratMasuk->no_surat }}</td>
                        <td>{{ $suratMasuk->instansi->nama }}</td>
                        <td>{{ $suratMasuk->tanggal_surat }}</td>
                        <td>{{ $suratMasuk->tanggal_diterima }}</td>
                        <td>{{ $suratMasuk->sifat }}</td>
                        <td>{{ $suratMasuk->isi_ringkas }}</td>
                        <td>{{ $suratMasuk->status }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="fs-4" style="color: red" href="{!! asset('file/' . $suratMasuk->file) !!}"><i
                                        class="bi bi-file-earmark-pdf-fill"></i></a>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('dashboard/disposisi/' . $suratMasuk->id) }}" class="btn btn-success"
                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                    class="bi bi-file-earmark-arrow-up"></i></a>
                        </td>
                        <td>
                            <div class="d-flex gap-4">
                                <a href="{{ url('dashboard/suratmasuk/' . $suratMasuk->id . '/edit') }}"
                                    class="btn btn-warning"
                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                        class="bi bi-pencil-square"></i></a>

                                <div class="btn btn btn-danger btn-delete-suratmasuk"
                                    data-id="{{ url('dashboard/suratmasuks/delete/' . $suratMasuk->id) }}"
                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px">
                                    <i class="bi bi-trash"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</div>
