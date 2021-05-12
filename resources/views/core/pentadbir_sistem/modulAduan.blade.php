@extends('layouts.app', [
    'title' => __('User Profile'),
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])

@section('content')
@component('layouts.headers.auth') 
    {{-- <!-- @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Permohonan Kerja Lebih Masa') }} 
            @endslot

        @endcomponent --> --}}
    <!-- <div class="container-fluid my-auto"> -->
        <div class="row">
            <div class="col-xl-12 mt-4 py-2">
                <h2 class="mb-2">
                    Senarai Maklum Balas
                </h2>
            </div>
        </div>
        {{-- @include('layouts.headers.cardAduan')  --}}
    <!-- </div> -->
@endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Senarai Maklum Balas') }}</h3>
                            </div>
                            <div class="col-6">            
                                <div class="form-row align-items-end">
                                    <div class="col-sm-5">
                                        <label class ="col-form-label col-form-label-sm" for="min">From</label>
                                        <input id="min"
                                            class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                                    </div>
                                    <div class="col-sm-5">
                                        <label class ="col-form-label col-form-label-sm" for="max">To</label>
                                        <input id="max"
                                            class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <button class="btn btn-sm btn-primary" id="btnGo" type="button">Search</button>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table " id="aduanDT" style="width:100%">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tarikh Aduan</th>
                                    <th class="text-center">Aduan</th>
                                    <th class="text-center">Catatan Pentadbir</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center"></th>
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