@extends('layouts.app', [
    'title' => __('Role Management'),
    'parentSection' => 'permohonan',
    'elementName' => 'pengesahan'
])

@section('content')
    @component('layouts.headers.auth') 
        
    @endcomponent
    <input type="text" id="nopekerja" value="{{Auth::user()->CUSTOMERID }}" hidden>
    <div class="container-fluid mt--6">
        {{-- <div class="row mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb-2">{{ __('Statistik Permohonan') }}</h2>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb-2">{{ __('Statistik Permohonan') }}</h2>
                            
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> 
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form id = "joiningDateSearch">
                                <div class="col-12">
                                    <div class="row align-items-end">
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm w-100 rounded-pill" id="carian" placeholder="Carian">
                                        </div>

                                        <div class="col-7">            
                                            <div class="form-row align-items-end">
                                                <div class="col-sm-3">
                                                    <label class ="col-form-label col-form-label-sm" for="min">From</label>
                                                    <input id="min"
                                                        class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class ="col-form-label col-form-label-sm" for="max">To</label>
                                                    <input id="max"
                                                        class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4">
                                                    <select id="jenisTable" name="jenisTable" class="custom-select custom-select-sm" >
                                                        <option value="permohonan" selected="selected">Permohonan</option>
                                                        <option value="tuntutan">Tuntutan</option>
                                                        <option value="lulus">Lulus</option>
                                                        <option value="tolak">Tolak</option>
                                                    </select>    
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-sm btn-primary" id="btnGo" type="button">Search</button>
                                                </div>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @include('core.kakitangan.partials.semakanDT.datatables')
            </div>
        </div>
    </div>
        @include('layouts.footers.auth')

    

    @include('core.kakitangan.partials.borangB1Modal')
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
    <script src="{{ asset('argon') }}/js/kakitangan/semakan.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/hantarPengesahan.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/eKedatangan.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/kemaskiniModal.js"></script>

@endpush