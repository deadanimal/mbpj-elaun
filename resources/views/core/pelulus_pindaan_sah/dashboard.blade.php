@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content') 
    @component('layouts.headers.auth') 
    {{-- @if(Auth::user()->role_id != '1'  ) --}}
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Default') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
    @endcomponent
    
    <div class="container-fluid mt--6">
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">  
                    @include('core.pelulus_pindaan_sah.partials.formOT&EL')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h2 id="titleTable"></h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="pindaanSahDT">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th><input type="checkbox" onClick="toggleCheckboxSemakan(this)" /></th>
                                            <th>Tarikh Permohonan</th>
                                            <th>Masa Mula</th>
                                            <th>Masa Akhir</th>
                                            <th>Masa</th>
                                            <th>Tujuan</th>
                                            <th>Tindakan</th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            {{-- 2 extra th Had to be added cause they cause prob  --}}
                                            <th hidden></th>
                                            <th hidden></th>
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
        
        
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>

{{-- Modal --}}
@include('core.pelulus_pindaan_sah.partials.modals-semakan.modalEditIndividuPelulusPindaanSah')
@include('core.pelulus_pindaan_sah.partials.modals-semakan.modalEditBerkumpulanPelulusPindaanSah')
@include('core.pelulus_pindaan_sah.partials.modals-semakan.modalRejectPelulusPindaanSah')

@endsection


@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/js/pelulus-pindaan-sah/pelulus-pindaan-sah.js"></script>
    <script src="{{ asset('argon') }}/js/shared/retrieveUserDataEkedatangan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/retrieveGaji.js"></script>
    <script src="{{ asset('argon') }}/js/shared/rejectIndividually.js"></script>
    <script src="{{ asset('argon') }}/js/shared/jenisPermohonan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/changeDataTarget.js"></script>
    <script src="{{ asset('argon') }}/js/shared/senaraiKakitangan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/fillKedatangan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/kemaskiniModal.js"></script>
    <script src="{{ asset('argon') }}/js/shared/approvedKelulusan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/terimaSemuaPermohonan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/saveCatatan.js"></script>
    <script src="{{ asset('argon') }}/js/shared/hariKadarJam.js"></script>
    <script src="{{ asset('argon') }}/js/shared/modalOpenClose.js"></script>
@endpush