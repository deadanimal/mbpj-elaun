@extends('layouts.app', [
    'title' => __('User Profile'),
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])

@section('content')
@component('layouts.headers.auth') 
    <!-- @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Permohonan Kerja Lebih Masa') }} 
            @endslot

        @endcomponent -->
    <!-- <div class="container-fluid my-auto"> -->
        <div class="row">
            <div class="col-xl-12 mt-4 py-2">
                <h2 class="mb-2" style="color:white;">
                    Senarai Maklum Balas
                </h2>
            </div>
        </div>
        @include('layouts.headers.cardAduan') 
    <!-- </div> -->
@endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Senarai Maklum Balas') }}</h3>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="btn-group">
                                <button type="button" class="btn btn-outline-default mb-2 mr-sm-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Bulan
                                </button>
                                    <div class="dropdown-menu scrollable-menu">
                                        <a class="dropdown-item" href="#">Januari</a>
                                        <a class="dropdown-item" href="#">Februari</a>
                                        <a class="dropdown-item" href="#">Mac</a>
                                        <a class="dropdown-item" href="#">April</a>
                                        <a class="dropdown-item" href="#">Mei</a>
                                        <a class="dropdown-item" href="#">Jun</a>
                                        <a class="dropdown-item" href="#">Julai</a>
                                        <a class="dropdown-item" href="#">Ogos</a>
                                        <a class="dropdown-item" href="#">September</a>
                                        <a class="dropdown-item" href="#">Oktober</a>
                                        <a class="dropdown-item" href="#">November</a>
                                        <a class="dropdown-item" href="#">Disember</a>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-sm-2 text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-default mb-2 mr-sm-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tahun
                                    </button>
                                    <div class="dropdown-menu scrollable-menu">
                                    @for ($year = date('Y'); $year > date('Y') - 60; $year--)
                                    <a class="dropdown-item" href="#" value="{{$year}}">
                                            {{$year}}
                                    </a>
                                    @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="table-responsive py-2">
                                <table class="table " id="aduanDT">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tarikh Aduan</th>
                                        <th class="text-center">Aduan</th>
                                        <th class="text-center">Catatan Pentadbir</th>
                                        <th class="text-center">Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                    </tbody>
                                </table>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    @include('layouts.footers.auth')
</div>


@endsection


@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('argon') }}/js/pentadbir-sistem/modulAduan.js"></script>


@endpush