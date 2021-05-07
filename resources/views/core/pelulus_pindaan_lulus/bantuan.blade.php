@extends('layouts.app', [
    'title' => __('Role Management'),
    'parentSection' => 'laravel',
    'elementName' => 'role-management'
])

@section('content')
    @component('layouts.headers.auth') 
    @endcomponent

    <div class="container-fluid mt--6">
        
        <div class="row mt-6">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-8">
                            <h3 class="pt-2">{{ __('Manual Pengguna') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col mx-4">
                                <strong>
                                    Panduan ini akan membimbing anda melalui asas menggunakan
                                    Sistem Pengurusan Elaun Lebih Masa termasuk cara mendaftar, 
                                    log masuk ke laman web dan mengisi borang
                                </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-4 mx-4">
                                <span class="text-blue ni ni-folder-17"></span>
                                <a href="">Muat turun manual pengguna</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h3 class="pt-2">{{ __('Versi Sistem') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mx-4">
                                <strong>
                                    Versi Sistem Elaun Lebih Masa
                                </strong>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mx-4 mt-4">
                                <span class="text-blue ni ni-settings">
                                    <strong>
                                        Versi 2020 1.0
                                    </strong> 
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-8">
                            <h3 class="pt-2">{{ __('Maklumat Aduan') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="col">
                                <div class="row"> 
                                   <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Tajuk Aduan') }}</label>
                                            <input name="tajukAduan" id="bantuan-tajukAduan" class="form-control" placeholder="" value="">

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                   <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Keterangan Aduan') }}</label>
                                            <textarea type="text" name="keteranganAduan" id="bantuan-keteranganAduan" class="form-control" placeholder="" value="" ></textarea>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="button" onclick="saveAduan();" class="btn btn-success mt-4">{{ __('Hantar') }}</button>
                                </div>
                            </div>
                        </form>
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
    <script src="{{ asset('argon') }}/js/shared/saveAduan.js"></script>
@endpush