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
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb-2">{{ __('Analisa Tuntutan Elaun Lulus/Gagal') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="3d-chart" class="chart">
                            <!-- Chart wrapper -->
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pt-1 pb-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h2>Audit Trail</h2>
                            </div>
                            <div class="col-6" >
                                <form id = "joiningDateSearch">
                                    <div class="form-row justify-content-end align-items-end">
                                        <div class="form-group col-sm-5">
                                            <label class ="col-form-label col-form-label-sm" for="min">From</label>
                                            <input id="min"
                                                class="form-control form-control-sm" value="dd / mm / yyyy" autocomplete="off">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label class ="col-form-label col-form-label-sm" for="max">To</label>
                                            <input id="max"
                                                class="form-control form-control-sm" value="dd / mm / yyyy" autocomplete="off">
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <button class="form-control form-control-sm btn btn-sm btn-primary" id="btnGo" type="button">Search</button>
                                        </div>
                                    </div>
                                    
                                </form>
                                                                    
                            </div>
                            <div class="col-2 text-right">
                                <span id="printButton" onclick="printTuntutan()" style="cursor: pointer"><i class="fa fa-print fa-3x" ></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        
                            <div class="table-responsive">
                                <table class="table table-flush" id="adminDT">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($Users as $user)
                                        <tr>
                                            <td>{{$user->USERID}}</td>
                                            <td>{{$user->NAME}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                Permohonan Kerja Lebih Masa
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

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
    <script src="{{ asset('argon') }}/js/amchart.js"></script>
    <script src="{{ asset('argon') }}/js/pentadbir-sistem/dashboard.js"></script>

@endpush