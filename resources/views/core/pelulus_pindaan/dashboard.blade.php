@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content') 
    @component('layouts.headers.auth') 
    @if(Auth::user()->role_id != '1'  )
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Default') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
        @include('layouts.headers.cards') 
    @elseif(Auth::user()->role_id == '1'  )
    @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Default') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
        @include('layouts.headers.cards') 
    @endif
    @endcomponent

    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h2 class="mb-0">Permohonan Pengesahan Pindaan</h2>
                            </div>
                            <div class="col-6" >
                                <form id = "joiningDateSearch">
                                    <div class="form-row justify-content-end align-items-end">
                                        <div class="form-group col-sm-5">
                                            <label class ="col-form-label col-form-label-sm" for="min">From</label>
                                            <input id="min"
                                                class="form-control form-control-sm" value="dd / mm / yyyy" autocomplete="off">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label class ="col-form-label col-form-label-sm" for="max">To</label>
                                            <input id="max"
                                                class="form-control form-control-sm" value="dd / mm / yyyy" autocomplete="off">
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <button class="form-control form-control-sm btn btn-sm btn-primary" id="btnGo" type="button">Search</button>
                                        </div>
                                    </div>
                                    
                                </form>
                                                                    
                            </div>
                            {{-- <div class="col-1 text-right">
                                <!-- <div class="custom-select"> -->
                                    <select id="bulanSelect" class="form-select form-select-sm">
                                    <!-- <div class="dropdown-menu scrollable-menu"> -->
                                        <option value="" selected="selected">Pilih Bulan</option>
                                        <option href="jan">Januari</option>
                                        <option href="feb">Februari</option>
                                        <option href="mac">Mac</option>
                                        <option href="apr">April</option>
                                        <option href="mei">Mei</option>
                                        <option href="jun">Jun</option>
                                        <option href="jul">Julai</option>
                                        <option href="ogo">Ogos</option>
                                        <option href="sep">September</option>
                                        <option href="okt">Oktober</option>
                                        <option href="nov">November</option>
                                        <option href="dis">Disember</option>
                                        <option value="">Semua</option>
                                    <!-- </div> -->
                                    </select>
                                <!-- </div> -->
                            </div>
                                
                            <div class="col-1 text-right">
                                <select class="form-select form-select-sm">
                                @for ($year = date('Y'); $year > date('Y') - 60; $year--)
                                <option href="#" value="{{$year}}">
                                        {{$year}}
                                </option>
                                @endfor
                                </select> 
                            </div> --}}
                            <div class="col-1 text-right">
                                <span id="printButton" onclick="printTuntutan()" style="cursor: pointer"><i class="fa fa-print fa-3x" ></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="pindaanDT">
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
    <script src="{{ asset('argon') }}/js/pelulus-pindaan/pelulus-pindaan.js"></script>
    

@endpush