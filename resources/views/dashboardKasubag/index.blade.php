@extends('layouts.main')

@section('container')
    <div class="d-flex flex-column gap-3">

        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-line fa-3x text-primary"></i> --}}
                    <i class="fas fa-envelope fa-2x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Jumlah Seluruh Surat Masuk</p>
                        <h6 class="mb-0">{{ $seluruhSuratMasuk }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-bar fa-3x text-primary"></i> --}}
                    <i class="fas fa-mail-bulk fa-2x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Jumlah Surat Masuk Bulan Ini</p>
                        <h6 class="mb-0">{{ $suratMasukBlnIni }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-area fa-3x text-primary"></i> --}}
                    <i class="fas fa-envelope-square fa-2x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Jumlah Seluruh Surat Keluar</p>
                        <h6 class="mb-0">{{ $suratKeluarBlnIni }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-pie fa-3x text-primary"></i> --}}
                    <i class="fas fa-envelope-open-text fa-2x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Jumlah Surat Keluar Bulan Ini</p>
                        <h6 class="mb-0">{{ $suratKeluarBlnIni }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-line fa-3x text-primary"></i> --}}
                    <i class="fas fa-building fa-2x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Instansi Terkait</p>
                        <h6 class="mb-0">{{ $seluruhSuratMasuk }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2"></p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
