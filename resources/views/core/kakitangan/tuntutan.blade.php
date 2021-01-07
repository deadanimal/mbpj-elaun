@extends('layouts.app', [
    'title' => __('Role Management'),
    'parentSection' => 'laravel',
    'elementName' => 'role-management'
])

@section('content')
    @component('layouts.headers.auth') 
        
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
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <form class="form-inline">
                                <div class="col-6">
                                    <input type="text" class="form-control w-100 mb-2 mr-sm-2 rounded" id="inlineFormInputName2" placeholder="Carian">
                                </div>

                                <div class="col">
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
                                
                                <div class="col">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-outline-default mb-2 mr-sm-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tahun
                                    </button>
                                    <div class="dropdown-menu scrollable-menu">
                                    @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                    <a class="dropdown-item" href="#" value="{{$year}}">
                                            {{$year}}
                                    </a>
                                    @endfor
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-outline-default mb-2 mr-sm-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Jenis Permohonan
                                    </button>
                                    <div class="dropdown-menu scrollable-menu">
                                        <a class="dropdown-item" href="#">Permohonan</a>
                                        <a class="dropdown-item" href="#">Tuntutan</a>
                                        <a class="dropdown-item" href="#">Lulus</a>
                                        <a class="dropdown-item" href="#">Tolak</a>
                                    </div>
                                    </div>
                                </div>
                                

                                <!-- {{ Form::open(['url' => 'foo/bar']) }}
                               
                                {{ Form::selectYear('year', 1970, \Carbon\Carbon::now()->year) }}
                                {{Form::date('name', \Carbon\Carbon::now()->year)}}
                                {{ Form::close() }} -->
                                
                                <!-- <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label> -->
                                <!-- <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>                  letak bulan dropdown sini
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                                </div> -->

                                <!-- <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>                  letak tahun dropdown sini
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                                </div> -->

                                <!-- <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>                  letak jenis carian (eg:permohonan/tuntutan) dropdown sini
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                                </div> -->

                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mt-2">
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb-2">{{ __('Senarai Permohonan Borang B1') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                    {!! $dataTable->table() !!}
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
    <script src="{{ asset('argon') }}/js/amchart.js"></script>
    {!! $dataTable->scripts() !!}
@endpush