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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row ">
                            <div class="col-6">
                                <h2>Pengurusan Pengguna</h2>
                            </div>
                            <div class="col-6 content-end">
                                <input type="text" class="form-control rounded" placeholder="Carian">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Tarikh Daftar</th>
                                            <th>Jenis</th>
                                            <th>Emel</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-12 my-4">
                            
                                <form class="form-inline" style="display: flex; justify-content: flex-end">
                                    
                                        <label for="jam">Jumlah Persamaan Jam:</label>
                                        <input type="text" class="form-control mx-sm-3" id="jam" placeholder="">

                                        <label for="masa">Jumlah Tuntutan Lebih Masa:</label>
                                        <input type="text" class="form-control mx-sm-3" id="masa" placeholder="">
                                                    
                                </form>
                                
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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/js/pentadbir-sistem/pengurusan-pengguna.js"></script>

@endpush