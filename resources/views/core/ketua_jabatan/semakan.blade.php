@extends('layouts.app', [
    'title' => __('User Profile'),
    'navClass' => 'bg-default',
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])
 
@section('content')
    @include('forms.header', [
        'title' => __('Semakan Permohonan') . ' ',
        'description' => __(''),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">

                {{-- Tab options --}}
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabPilihanPermohonanKerjaLebihMasa" data-toggle="tab" 
                                    href="#" role="tab" aria-controls="tabs-icons-text-1" value="OT"
                                    aria-selected="true" onclick="retrieveTabPilihan('tabPilihanPermohonanKerjaLebihMasa');">
                                    <i class="ni ni-time-alarm"></i>
                                    Permohonan Kerja Lebih Masa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabPilihanPengesahanKerjaLebihMasa" data-toggle="tab" 
                                    href="#" role="tab" aria-controls="tabs-icons-text-2" value="PS"
                                    aria-selected="false" onclick="retrieveTabPilihan('tabPilihanPengesahanKerjaLebihMasa');">
                                    <i class="ni ni-money-coins"></i>
                                    Pengesahan Kerja Lebih Masa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabPilihanTuntutanElaunLebihMasa" data-toggle="tab" 
                                    href="#" role="tab" aria-controls="tabs-icons-text-3" value="EL"
                                    aria-selected="false" onclick="retrieveTabPilihan('tabPilihanTuntutanElaunLebihMasa');">
                                    <i class="ni ni-money-coins"></i>
                                    Tuntuan Elaun Lebih Masa
                                </a>
                            </li>
                        </ul>
                    </div>

                
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">  
                        

                            {{-- Form semakan --}}
                                @include('core.ketua_jabatan.partials.formOT&EL')
                        </div>
                    </div>
                </div>

                    {{-- Datatables --}}
                    @include('core.ketua_jabatan.partials.dataTablesKetuaJabatan')
    
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

{{-- Modal --}}
@include('core.ketua_jabatan.partials.modals-semakan.modalEditIndividuKetuaJabatan')
@include('core.ketua_jabatan.partials.modals-semakan.modalEditBerkumpulanKetuaJabatan')
@include('core.ketua_jabatan.partials.modals-semakan.modalValidateKetuaJabatan')
@include('core.ketua_jabatan.partials.modals-semakan.modalRejectKetuaJabatan')
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
    <script src="{{ asset('argon') }}/js/ketua-jabatan/jenisPermohonan.js"></script>
    <script src="{{ asset('argon') }}/js/ketua-jabatan/semakanDatatable.js"></script>
    <script src="{{ asset('argon') }}/js/shared/retrieveUserDataEkedatangan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/approvedKelulusan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/saveCatatan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/modalOpenClose.js"></script>
@endpush