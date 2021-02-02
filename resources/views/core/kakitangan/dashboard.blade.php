@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content') 
    @component('layouts.headers.auth') 
    @if(Auth::user()->role_id != '1'  )
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Default') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
        @include('layouts.headers.cards') 
    @elseif(Auth::user()->role_id == '1'  )
    @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Default') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
        @include('layouts.headers.cards') 
    @endif
    @endcomponent

    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Pengurusan Sistem Elaun</h3>
                            </div>
                            <div class="col-3 text-right">
                                <select id="jenisTable" name="jenisTable" class="custom-select custom-select-sm" >
                                    <option value="permohonanan" selected="selected">Permohonan</option>
                                    <option value="tuntutan">Tuntutan</option>
                                    <option value="lulus">Lulus</option>
                                    <option value="tolak">Tolak</option>
                                </select>                       
                            </div>
                        </div>
                    </div>
                    
                    <div id="permohonan" class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="datatable1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Permohonan</th>
                                            <th>Tarikh Transaksi</th>
                                            <th>Tarikh Kelulusan</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                    </tbody>
                                </table>
                            </div>

                            @if(Auth::user()->role_id == '2' )
                            <div class="col-12 py-2 my-4 text-center">
                                <a href="/penyelia/semakan">Lihat selanjutnya di semakan permohonan</a>
                            </div>
                            @elseif(Auth::user()->role_id == '8' )
                            <div class="col-12 py-2 my-4 text-center">
                                <a href="/kakitangan/semakan">Lihat selanjutnya di semakan permohonan</a>
                            </div>
                            @endif
                        </div>
                    </div>
                            

                    <div id="tuntutan" class="row">
                    <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="tuntutanDT">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Permohonan</th>
                                            <th>Tarikh Transaksi</th>
                                            <th>Tarikh Kelulusan</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 py-2 my-4 text-center">
                                <a href="">Lihat selanjutnya di semakan tuntutan</a>
                            </div>
                        </div>
                    </div>

                    <div id="lulus" class="row">
                    <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="lulusDT">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Permohonan</th>
                                            <th>Tarikh Transaksi</th>
                                            <th>Tarikh Kelulusan</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 py-2 my-4 text-center">
                                <a href="">Lihat selanjutnya di semakan permohonan</a>
                            </div>
                        </div>
                    </div>

                    <div id="tolak" class="row">
                    <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="tolakDT">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Permohonan</th>
                                            <th>Tarikh Transaksi</th>
                                            <th>Tarikh Kelulusan</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 py-2 my-4 text-center">
                                <a href="">Lihat selanjutnya di semakan permohonan</a>
                            </div>
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
    
    
    
    

@endpush