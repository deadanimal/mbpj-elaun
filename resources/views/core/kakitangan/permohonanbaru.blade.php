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
        <div class="row">
            <div class="col-xl-12 mt-4 py-2">
                <h2 class="mb-2" style="color:white;">
                    Permohonan Kerja Lebih Masa
                </h2>
            </div>
        </div>
    <!-- </div> -->
@endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
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
                                <div class="col-sm-6 ml--3">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                
                                <div class="row"> 
                                   <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Nama') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Sarip Dol') }}" value="Sarip Dol" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Jawatan') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Pegawai') }}" value="Pegawai" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                   <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('No. KP Baru') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="910234564555" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Bahagian') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="Pengurusan" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Jabatan') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="Teknologi Maklumat" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                   <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Gaji Matriks') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="2,455" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Gred') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="F41" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <a href="#" class="edit open-modal" data-toggle="modal" data-target="#permohonanbaruModal">
                                    <button class="btn btn-primary" data-toggle="tooltip" title="Edit">{{ __('Mohon Baru') }}</button></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">{{ __('Nota Permohanan Kerja Lebih Masa') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="col">
                        
                            <div class="row">
                            <h4 class="heading-medium ">{{ __('Langkah 1') }}</h4>
                                <div class="col ml--3">
                                    <p><b style="color:black">Borang A1 / A2</b> Borang kelulusan</p>
                                </div>
                            </div>

                            
                            <div class="row"> 
                            <h4 class="heading-medium mt-3">{{ __('Langkah 2') }}</h4>
                                <div class="col ml--3">
                                    <p><b style="color:black">Borang B1 -</b> Borang kelulusan</p>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col ml--3">
                                    <p><b style="color:black">Borang A1 -</b> Borang kelulusan</p>
                                </div>
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
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h3 class="mb-0">{{ __('Permohonan Individu') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table " id="individuDT">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tarikh Permohonan</th>
                                                        <th>Masa Mula</th>
                                                        <th>Masa Akhir</th>
                                                        <th>Masa</th>
                                                        <th>Hari</th>
                                                        <th>Waktu</th>
                                                        <th>Kadar Jam</th>
                                                        <th>Tujuan</th>
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
                            </div>
                            <div class="tab-pane fade" id="pills-berkumpulan" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h3 class="mb-0">{{ __('Permohonan Berkumpulan') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-flush" id="berkumpulanDT">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tarikh Permohonan</th>
                                                            <th>Masa Mula</th>
                                                            <th>Masa Akhir</th>
                                                            <th>Masa</th>
                                                            <th>Hari</th>
                                                            <th>Waktu</th>
                                                            <th>Kadar Jam</th>
                                                            <th>Tujuan</th>
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
    </div>

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


@endpush