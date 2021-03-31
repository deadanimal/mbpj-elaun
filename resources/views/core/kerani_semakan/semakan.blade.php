@extends('layouts.app', [
    'title' => __('User Profile'),
    'navClass' => 'bg-default',
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])
 
@section('content')
    @include('forms.header', [
        'title' => __('Selamat Datang ke Modul Kerani Semakan') . ' ',
        'description' => __('Sistem Elaun Lebih Masa Majlis Bandaraya Petaling Jaya'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">  
                        

                            {{-- Form semakan --}}
                                @include('core.kerani_semakan.partials.formOT&EL')
                        </div>
                    </div>
                </div>

                    {{-- Datatables --}}
                    @include('core.kerani_semakan.partials.dataTablesKeraniSemakan')
    
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

{{-- Modal --}}
@include('core.kerani_semakan.partials.modals-semakan.modalEditIndividuKeraniSemakan')
@include('core.kerani_semakan.partials.modals-semakan.modalEditBerkumpulanKeraniSemakan')
@include('core.kerani_semakan.partials.modals-semakan.modalRejectKeraniSemakan')
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
    <script src="{{ asset('argon') }}/js/kerani-semakan/semakanDatatable.js"></script>
    <script src="{{ asset('argon') }}/js/shared/retrieveUserDataEkedatangan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/retrieveGaji.js"></script>
    <script src="{{ asset('argon') }}/js/shared/rejectIndividually.js"></script>
    <script src="{{ asset('argon') }}/js/shared/jenisPermohonan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/senaraiKakitangan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/fillKedatangan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/kemaskiniModal.js"></script>
    <script src="{{ asset('argon') }}/js/shared/approvedKelulusan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/saveCatatan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/modalOpenClose.js"></script>
@endpush