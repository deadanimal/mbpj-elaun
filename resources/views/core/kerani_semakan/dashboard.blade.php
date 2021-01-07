@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard',
    'navClass' => 'bg-default',
])

@section('content') 
    {{-- @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Kerani Semakan') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
        @include('layouts.headers.cards') 
    @endcomponent --}}

    @include('forms.header', [
        'title' => __('Selamat Datang ke Modul Kerani Semakan') . ' ',
        'description' => __(''),
        'class' => 'col-lg-7'
    ])

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
                                <!-- {!! $dataTable->table() !!} -->
                            </div>
                        </div>
                    
                   
                    <!-- <div class="table-responsive"> -->
                        <!-- Projects table -->
                        <!-- <table id="yajra" class="table align-items-center yajra-datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tarikh Permohonan</th>
                                    <th scope="col">Tarikh Kelulusan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table> -->
                            <!-- <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                <h5 class="h3 text-white mb-0">Sales value</h5>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        <!-- </div>
                    </div> -->
                    <!-- <div class="card-body"> -->
                        <!-- Chart -->
                        <!-- <div class="chart"> -->
                            <!-- Chart wrapper -->
                            <!-- <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
                        </div>
                    </div> -->
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
            <!-- <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h5 class="h3 mb-0">Total orders</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> -->
                        <!-- Chart -->
                        <!-- <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
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