@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content') 
    @component('layouts.headers.auth') 
    @if(Auth::user()->role_id != '1'  )
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Dashboard') }} 
            @endslot

        @endcomponent
        @include('core.kakitangan.cardsKakitangan') 
    @elseif(Auth::user()->role_id == '1'  )
    @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Dashboard') }} 
            @endslot
        @endcomponent
        @include('layouts.headers.cards') 
    @endif
    @endcomponent

    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Pengurusan Sistem Elaun</h3>
                            </div>
                            <div class="col-3 text-right">
                                <select id="jenisTable" name="jenisTable" class="custom-select custom-select-sm" autocomplete="off">
                                    <option value="permohonan" selected>Permohonan</option>
                                    <option value="tuntutan">Tuntutan</option>
                                    <option value="lulus">Lulus</option>
                                    <option value="tolak">Tolak</option>
                                </select>                       
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive py-4">
                                <table class="table" id="datatable1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Permohonan</th>
                                            <th>Tarikh Transaksi</th>
                                            <th>Tarikh Kelulusan</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 py-2 my-4 text-center">
                                <a id="footerDT" href="/{{$temp}}/semakan">Lihat selanjutnya di semakan permohonan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <input id="userID" value="{{auth()->user()->USERID}}" hidden>
    <input id="type" value="{{$temp}}" hidden>


        <!-- Footer -->
        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection


@push('js')
    
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    
    
    
    

@endpush