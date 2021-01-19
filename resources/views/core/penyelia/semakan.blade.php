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
            <div class="col-xl-8">

                {{-- Tab options --}}
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabPilihanPermohonanKerjaLebihMasa" data-toggle="tab" 
                                href="#formPermohonanKerjaLebihMasa" role="tab" aria-controls="tabs-icons-text-1" 
                                aria-selected="true" onclick="retrieveTabPilihan('tabPilihanPermohonanKerjaLebihMasa')">
                                <i class="ni ni-time-alarm"></i>
                                Permohonan Kerja Lebih Masa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabPilihanTuntutanElaunLebihMasa" data-toggle="tab" 
                                href="#formTuntuanElaunLebihMasa" role="tab" aria-controls="tabs-icons-text-2" 
                                aria-selected="false" onclick="retrieveTabPilihan('tabPilihanTuntutanElaunLebihMasa')">
                                <i class="ni ni-money-coins"></i>
                                Tuntuan Elaun Lebih Masa
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">  
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select id="selectJenisPermohonan" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option selected value="out">Pilih Jenis Permohonan</option>
                                        <option value="individu">Permohonan Individu</option>
                                        <option value="berkumpulan">Permohonan Berkumpulan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="formPermohonanKerjaLebihMasa" role="tabpanel" aria-labelledby="tabPilihanPermohonanKerjaLebihMasa">
                                {{-- Tab content -> Form --}}
                                @include('core.ketua_bahagian.partials.formPermohonanKerjaLebihMasa')
                            </div>

                            <div class="tab-pane fade" id="formTuntuanElaunLebihMasa" role="tabpanel" aria-labelledby="tabPilihanTuntutanElaunLebihMasa">
                                {{-- Tab content -> Form --}}
                                @include('core.ketua_bahagian.partials.formTuntuanElaunLebihMasa')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 d-flex">
                <div class="card flex-fill">
                <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">{{ __('Analisa Permohonan') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Permohonan Kerja Lebih Masa Diluluskan</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Permohonan Kerja Lebih Masa Ditolak</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Permohonan Elaun Kerja Lebih Masa Diluluskan</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Permohonan Elaun Kerja Lebih Masa Ditolak</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            {{-- Datatables --}}
            @include('core.penyelia.partials.dataTablesPenyelia')

        </div>

        @include('layouts.footers.auth')
    </div>

{{-- Modal --}}
@include('core.penyelia.partials.modals-semakan.modalEditIndividuPenyelia')
@include('core.penyelia.partials.modals-semakan.modalEditBerkumpulanPenyelia')
@include('core.penyelia.partials.modals-semakan.modalValidatePenyelia')
@include('core.penyelia.partials.modals-semakan.modalRejectPenyelia')
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
    <script src="{{ asset('argon') }}/js/penyelia/jenisPermohonan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/modalOpenClose.js"></script>

@endpush