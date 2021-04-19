@extends('layouts.app', [
    'title' => __('User Profile'),
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])

@section('content')
@component('layouts.headers.auth') 
    <!-- @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Permohonan Kerja Lebih Masa') }} 
            @endslot

        @endcomponent -->
    <!-- <div class="container-fluid my-auto"> -->

    <!-- </div> -->
@endcomponent

    <div class="container-fluid mt--6">
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Permohonan Baru Kerja Lebih Masa') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                            <h6 class="heading-small text-muted mb-4">{{ __('Maklumat Peribadi') }}</h6>

                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                            <div class="col">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="input-name">{{ __('No Pekerja') }}</label>
                                            <input type="text" name="noPekerja" id="noPekerja" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{  auth()->user()->CUSTOMERID }}" required autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row"> 
                                   <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="name">{{ __('Nama') }}</label>
                                            <input type="text" name="name" id="name" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Sarip Dol') }}" value="{{ auth()->user()->NAME }}" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="jawatan">{{ __('Jawatan') }}</label>
                                            <input type="text" name="jawatan" id="jawatan" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Pegawai') }}" value="Pegawai" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                   <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="nric">{{ __('No. KP Baru') }}</label>
                                            <input type="text" name="nric" id="nric" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ auth()->user()->NIRC }}" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="bahagian">{{ __('Bahagian') }}</label>
                                            <input type="text" name="bahagian" id="bahagian" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="Pengurusan" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="jabatan">{{ __('Jabatan') }}</label>
                                            <input type="text" name="jabatan" id="jabatan" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="Teknologi Maklumat" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                   <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="gajiMatriks">{{ __('Gaji Matriks') }}</label>
                                            <input type="text" name="gajiMatriks" id="gajiMatriks" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="2,455" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="col-form-label col-form-label-sm font-weight-bold" for="gred">{{ __('Gred') }}</label>
                                            <input type="text" name="gred" id="gred" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="F41" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <!-- <a href="#"> -->
                                    <button  onclick="event.preventDefault();setEnableDropdown();" class="btn btn-primary" data-toggle="tooltip" title="Edit">{{ __('Mohon Baru') }}</button></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        
            <div class="col">
                <div class="row">
                    <div class="col"> 
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" role="tab" href="#pills-individu" aria-controls="pills-individu" aria-selected="true">Permohonan Individu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-berkumpulan" role="tab" aria-controls="pills-berkumpulan" aria-selected="false">Permohonan Berkumpulan</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-individu" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h3 class="mb-0">{{ __('Permohonan Individu') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <div class="table-responsive">
                                            <table class="table " id="individuDT">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tarikh Permohonan</th>
                                                    <th>Status</th>
                                                    <th>Progres</th>
                                                    <th>Masa Mula</th>
                                                    <th>Masa Akhir</th>
                                                    <th>Masa</th>
                                                    <th>Hari</th>
                                                    <th>Waktu</th>
                                                    <th>Kadar Jam</th>
                                                    <th>Tujuan</th>
                                                    <th></th>
                                                    <th>id user</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    
                                                </tbody>
                                            </table>
                
                                        </div>
                                        <div class="col-12 my-4">
                                        
                                            <form class="form-inline" style="display: flex; justify-content: flex-end">
                                                
                                                    <label for="jam" class="col-form-label col-form-label-sm">Jumlah Persamaan Jam:</label>
                                                    <input type="text" class="form-control form-control-sm column_filter" id="filterIndividu0" placeholder="" autocomplete="off" data-column="0">

                                                    <label for="masa" class="col-form-label col-form-label-sm">Jumlah Tuntutan Lebih Masa:</label>
                                                    <input type="text" class="form-control form-control-sm column_filter" id="filterIndividu4" placeholder="" autocomplete="off" data-column="4">
                                                                
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-berkumpulan" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h3 class="mb-0">{{ __('Permohonan Berkumpulan') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <div class="table-responsive">
                                            <table class="table table-flush" id="berkumpulanDT">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tarikh Permohonan</th>
                                                        <th>Status</th>
                                                        <th>Progres</th>
                                                        <th>Masa Mula</th>
                                                        <th>Masa Akhir</th>
                                                        <th>Masa</th>
                                                        <th>Hari</th>
                                                        <th>Waktu</th>
                                                        <th>Kadar Jam</th>
                                                        <th>Tujuan</th>
                                                        <th></th>
                                                        <th>id user</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                
                                        </div>
                                        <div class="col-12 my-4">
                                        
                                            <form class="form-inline" style="display: flex; justify-content: flex-end">
                                                
                                                    <label for="jam" class="col-form-label col-form-label-sm">Jumlah Persamaan Jam:</label>
                                                    <input type="text" class="form-control form-control-sm column_filter_bk" id="filterKumpulan0" placeholder="" autocomplete="off" data-column="0">

                                                    <label for="masa" class="col-form-label col-form-label-sm">Jumlah Tuntutan Lebih Masa:</label>
                                                    <input type="text" class="form-control form-control-sm column_filter_bk" id="filterKumpulan4" placeholder="" autocomplete="off" data-column="4">
                                                                
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <input type="text" id="depcode" value="{{Auth::user()->DEPARTMENTCODE }}" hidden>
    @include('layouts.footers.auth')
</div>

@include('core.kakitangan.partials.permohonanbaruModal')

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
    <script src="{{ asset('argon') }}/js/kakitangan/permohonanbaru.js"></script>
    <script src="{{ asset('argon') }}/js/kakitangan/semakanPermohonanBaru.js"></script>
    <script src="{{ asset('argon') }}/js/shared/modalOpenClose.js"></script>

@endpush