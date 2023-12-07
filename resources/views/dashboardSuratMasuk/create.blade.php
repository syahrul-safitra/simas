@extends('layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Create new incoming mail</h6>
                <form action="{{ url('dashboard/suratmasuk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- row 1 -->
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="no-surat" class="form-label">No Surat</label>
                            <input type="text" class="form-control @error('no_surat') is-invalid @enderror"
                                name="no_surat" value="{{ @old('no_surat') }}" id="no-surat" autocomplete="off">
                            @error('no_surat')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="instansi" class="form-label">Instansi</label>
                            <select class="form-select @error('instansi_id') is-invalid @enderror" name="instansi_id"
                                id="instansi">
                                @if (@old('instansi_id'))
                                    @foreach ($instansis as $instansi)
                                        @if (@old('instansi_id') == $instansi->id)
                                            <option value="{{ $instansi->id }}" selected>{{ $instansi->nama }}</option>
                                        @else
                                            <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="" selected>Pilih Instansi</option>
                                    @foreach ($instansis as $instansi)
                                        <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('instansi_id')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- row 2 -->
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="tanggal-surat" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                name="tanggal_surat" value="{{ @old('tanggal_surat') }}" id="tanggal-surat">
                            @error('tanggal_surat')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="tanggal-diterima" class="form-label">Tanggal Diterima</label>
                            <input type="datetime-local"
                                class="form-control @error('tanggal_diterima') is-invalid @enderror" name="tanggal_diterima"
                                value="{{ @old('tanggal_diterima') }}" id="tanggal-diterima">
                            @error('tanggal_diterima')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- row 3 -->
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">


                                @if (@old('status'))
                                    @foreach ($statuss as $status)
                                        @if (@old('status') == $status)
                                            <option value="{{ $status }}" selected>{{ $status }}</option>
                                        @else
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="" selected>Pilih</option>
                                    @foreach ($statuss as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('status')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="file" class="form-label">File</label>
                            <input class="form-control" type="file" name="file" id="file"
                                accept="application/pdf" required>
                        </div>
                    </div>

                    <a href="{{ url('dashboard/suratmasuk') }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
