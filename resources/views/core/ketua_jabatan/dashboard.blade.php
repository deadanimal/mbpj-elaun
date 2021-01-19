@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard',
])

@section('content') 
    @component('layouts.headers.auth') 
    @component('layouts.headers.breadcrumbs')
        @slot('title') 
            {{ __('Ketua Jabatan') }} 
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('ketua-jabatan-dashboard.index') }}">{{ __('Dashboards') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
    @endcomponent

    <h1><strong class="text-white">Selamat Datang Ke Modul Ketua Jabatan</strong></h1>
    <h3 class="text-white mb-4 ml-4">" Sistem Elaun Lebih Masa Majlis Bandaraya Petaling Jaya "</h3>

    @include('layouts.headers.cards') 
    @endcomponent

    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Jumlah Tuntutan Elaun Yang Diluluskan Dan Ditolak</h3>
                            </div>
                            <div class="col text-right">
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="col-lg-12">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
        
                </div>
            </div>
            <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Analisa Permohonan dan Tuntutan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-pie" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection


@push('js')
    
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    
    {!! $dataTable->scripts() !!}
    

@endpush