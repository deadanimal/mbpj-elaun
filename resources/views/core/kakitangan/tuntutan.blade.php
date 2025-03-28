@extends('layouts.app', [
    'title' => __('Role Management'),
    'parentSection' => 'permohonan',
    'elementName' => 'tuntutan'
])

@section('content')
    @component('layouts.headers.auth') 
        
    @endcomponent

    <div class="container-fluid mt--6">
        {{-- <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb-2">{{ __('Analisa Tuntutan Elaun Lulus/Gagal Tahun Semasa') }}</h2>
                                <input type="button" value="Save as PDF" onclick="savePDF();" />
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
                                            <input type="text" class="form-control form-control-sm w-100 rounded-pill" id="carian" placeholder="Carian" autocomplete="off">
                                        </div>

                                        <div class="col-7">            
                                            <div class="form-row align-items-end">
                                                <div class="col-sm-4">
                                                    <label class ="col-form-label col-form-label-sm" for="min">From</label>
                                                    <input id="min"
                                                        class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class ="col-form-label col-form-label-sm" for="max">To</label>
                                                    <input id="max"
                                                        class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="jenisTable" name="jenisTable" class="custom-select custom-select-sm" >
                                                        <option value="permohonanan" selected="selected">Permohonan</option>
                                                        <option value="tuntutan">Tuntutan</option>
                                                        <option value="lulus">Lulus</option>
                                                        <option value="tolak">Tolak</option>
                                                    </select>    
                                                </div>
                                                <div class="col-sm-1 text-center">
                                                    <button class="btn btn-sm btn-primary" id="btnGo" type="button">Search</button>
                                                </div>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>
                            </form>
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
                                <h2 class="mb-2">{{ __('Senarai Tuntutan Elaun Lebih Masa') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive py-4">
                            <table class="table table-flush" id="tuntutansDT" style="width: 100%">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tarikh Permohonan</th>
                                    <th>Status</th>
                                    <th>Progres</th>
                                    <th>Masa Mula</th>
                                    <th>Masa Akhir</th>
                                    <th>Masa</th>
                                    {{-- <th>Hari</th>
                                    <th>Waktu</th>
                                    <th>Kadar Jam</th> --}}
                                    <th>Tujuan</th>
                                    <th>Tindakan</th>
                                    <th hidden>Status</th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th ></th>
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

        @include('core.kakitangan.partials.borangB1Modal')
        {{-- @include('layouts.footers.auth') --}}
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
    <script src="{{ asset('argon') }}/js/kakitangan/charts.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/semakan.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/deletePermohonanKT.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/tuntutan.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/hantarElaun.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/hantarPengesahan.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/eKedatangan.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/semakanPermohonanBaru.js"></script>
@endpush