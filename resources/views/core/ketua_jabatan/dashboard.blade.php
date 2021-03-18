@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard',
])

@section('content') 
    @component('layouts.headers.auth') 
    @include('forms.header', [
         'title' => __('Selamat Datang ke Modul Ketua Jabatan') . ' ',
        'description' => __('Sistem Elaun Lebih Masa Majlis Bandaraya Petaling Jaya'),
        'class' => 'col-lg-8 mb--6'
    ])

    @include('layouts.headers.cards') 
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Jumlah Tuntutan Elaun Yang Diluluskan Dan Ditolak</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="row px-4">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="form-group">
                                    <select id="selectJenisPermohonan" class="form-select form-select-sm " aria-label=".form-select-sm example">
                                        <option selected value="out">-- Pilihan --</option>
                                        <option value="semua">Semua</option>
                                        <option value="dp">Dalam Proses</option>
                                        <option value="lulus">Lulus</option>
                                        <option value="tolak">Tolak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="table-responsive py--4">
                            <table class="table" id="dashboardKJDT">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>ID Permohonan</th>
                                        <th>Tarikh Permohonan</th>
                                        <th>Masa Mula</th>
                                        <th>Masa Akhir</th>
                                        <th>Masa</th>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Kadar Jam</th>
                                        <th>Tujuan</th>
                                        <th></th>
                                        <th hidden>Status</th>
                                        <th hidden></th>
                                        <th hidden></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Analisa Permohonan dan Tuntutan</h3>
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
    <input id="userID" value="{{auth()->user()->id}}" hidden>
        
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection


@push('js')
    
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/js/ketua-jabatan/dashboardDT.js"></script>
    

@endpush