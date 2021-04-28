@extends('layouts.app', [
'parentSection' => 'dashboards',
'elementName' => 'dashboard'
])

@section('content')
    @component('layouts.headers.auth')
        {{-- @if (Auth::user()->role_id != '1') --}}
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Default') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
    @endcomponent

    {{-- @elseif(Auth::user()->role_id == '1'  )
    @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Default') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
        @include('layouts.headers.cards') 
    @endif
    @endcomponent --}}


    <div class="container-fluid mt--6">
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    @include('core.pelulus_pindaan_sah.formOT&EL')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h2>Permohonan Pengesahan Pindaan</h2>
                            </div>
                            <div class="col-1 text-right">
                                <span id="printButton" onclick="printTuntutan()" style="cursor: pointer"><i
                                        class="fa fa-print fa-3x"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="pindaanLulusDT">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tarikh Daftar</th>
                                            <th>No Pekerja</th>
                                            <th>Kerani Pemohon</th>
                                            <th>Catatan</th>
                                            <th>Status</th>
                                            <th></th>
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
@endsection


@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/js/pelulus-pindaan-lulus/pelulus-pindaan-lulus.js"></script>
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
