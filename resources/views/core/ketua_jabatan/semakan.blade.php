@extends('layouts.app', [
    'title' => __('User Profile'),
    'navClass' => 'bg-default',
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])

@section('content')
    @include('forms.header', [
        'title' => __('Selamat Datang ke Modul Ketua Jabatan') . ' ',
        'description' => __('" Sistem Elaun Lebih Masa Majlis Bandaraya Petaling Jaya"'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Semakan Permohonan') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

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
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
    
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
    
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                   <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Nama') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Jawatan') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                   <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('No. KP Baru') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Bahagian') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Jabatan') }}</label>
                                            <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" id="semakKetuaJabatan" class="btn btn-success mt-4">{{ __('Semak') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 d-flex">
                <div class="card flex-fill">
                <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">{{ __('Nota Permohanan Kerja Lebih Masa') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Task completed</span>
                                        
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
                                        
                                        <span>Task completed</span>
                                        
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
                                        
                                        <span>Task completed</span>
                                        
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
                                        
                                        <span>Task completed</span>
                                        
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
            
        <!-- letak tab heading -->
        <div class="mb-4" id="ketuaJabatanReveal" style="display: none;">
            <button class="btn hide btn-secondary" id="permohonanIndividu" type="button">Permohonan Individu</button>
            <button class="btn hide btn-secondary" id="permohonanBerkumpulan" type="button">Permohonan Berkumpulan</button>
        </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h2 class="mb-2">{{ __('Permohonan Baru Kerja Lebih Masa') }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                        {!! $dataTable->table() !!}

                        {{-- Modal for 3 action buttons  --}}

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered  modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h6 class="modal-title" id="modal-title-default">Permohonan Baru Kerja Lebih Masa</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6" style="border-right-style: solid; border-width: 0.5px;">
                                                    <div class="text-left mb-4">
                                                        <h5>* Jenis Permohonan</h5>
                                                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="JENIS PERMOHONAN" readonly>
                                                    </div>
                                                    <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                            
                                                        @include('alerts.success')
                                                        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
                            
                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                            <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                    
                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label class="form-control-label">{{ __('No. K/P Baru') }}</label>
                                                            <input class="form-control" type="text" placeholder="Default input">

                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label class="form-control-label">{{ __('Tarikh Mohon') }}</label>
                                                            <input class="form-control" type="text" placeholder="Default input">

                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label class="form-control-label">{{ __('Tarikh Kerja') }}</label>
                                                            <input class="form-control" type="text" placeholder="Default input">

                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label class="form-control-label">{{ __('Masa Akhir') }}</label>
                                                            <input class="form-control" type="text" placeholder="Default input">

                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label class="form-control-label">{{ __('Masa Mula') }}</label>
                                                            <input class="form-control" type="text" placeholder="Default input">

                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label class="form-control-label" for="exampleFormControlTextarea1">{{ __('Sebab-Sebab Lebih Masa') }}</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="exampleFormControlTextarea1">{{ __('Lokasi') }}</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" resize="none"></textarea>

                                                            @include('alerts.feedback', ['field' => 'name'])
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                    
                                                                @include('alerts.success')
                                                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
                                                                <div class="row">
                                                                    <div class="col-sm mt--1">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Tarikh') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0 mt--1">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Waktu Masuk') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0 mt--1">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                            <label class="form-control-label" for="input-name">{{ __('Jumlah Waktu Kerja') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- ---------------------------- --}}

                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Waktu Masuk') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Jumlah OT') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Jumlah OT Keseluruhan') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- ---------------------------- --}}

                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Waktu Masuk') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Jumlah OT') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Waktu Anjal') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- ---------------------------- --}}

                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Waktu Masuk') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0">
                                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                                                            <label class="form-control-label" for="input-name">{{ __('Jumlah OT') }}</label>
                                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                                    
                                                                            @include('alerts.feedback', ['field' => 'name'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm pl-0"></div>
                                                                </div>
                                                            </form>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mt-3 mb-2">
                                                            <h6 class="modal-title" id="modal-title-default">Kelulusan</h6>
                                                        </div>
                                                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                
                                                            @include('alerts.success')
                                                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
                                
                                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                <label class="form-control-label" for="input-name">{{ __('Penyelia') }}</label>
                                                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>
                        
                                                                @include('alerts.feedback', ['field' => 'name'])
                                                            </div>
                                                            <div class="form-group mt--3">
                                                                <label class="form-control-label">{{ __('Ketua Bahagian') }}</label>
                                                                <input class="form-control" type="text" placeholder="Default input">
        
                                                                @include('alerts.feedback', ['field' => 'name'])
                                                            </div>
                                                            <div class="form-group mt--3">
                                                                <label class="form-control-label">{{ __('Kerani Pemeriksa') }}</label>
                                                                <input class="form-control" type="text" placeholder="Default input">
        
                                                                @include('alerts.feedback', ['field' => 'name'])
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label">{{ __('Kerani Semakan') }}</label>
                                                                <input class="form-control" type="text" placeholder="Default input">
        
                                                                @include('alerts.feedback', ['field' => 'name'])
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3">
                                                <button type="submit" class="btn btn-success mt-4">{{ __('Kemaskini') }}</button>
                                                <button type="submit" class="btn btn-primary mt-4">{{ __('Tutup') }}</button>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Modal Validate --}}
                        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-secondary modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-blue">
                                        <h6 class="modal-title text-white" id="modal-title-notification">Notifikasi</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="{{ asset('argon') }}/img/tick.png" alt="tick sign">
                                            <h1 class="heading mt-2">Lulus Permohonan</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Reject --}}
                        <div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-secondary modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-blue">
                                        <h6 class="modal-title text-white" id="modal-title-notification">Notifikasi</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="heading m-2 text-center">Tolak Permohonan</h1>

                                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ __('Catatan') }}</textarea>

                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success mt-4">{{ __('Ya') }}</button>
                                                <button type="submit" class="btn btn-danger mt-4">{{ __('Tidak') }}</button>
                                            </div>  
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- End of Modal --}}

                            <div class="col-12 my-4">
                            
                                <form class="form-inline" style="display: flex; justify-content: flex-end">
                                    
                                        <label for="jam">Jumlah Persamaan Jam:</label>
                                        <input type="text" class="form-control mx-sm-3" id="jam" placeholder="">

                                        <label for="masa">Jumlah Tuntutan Lebih Masa:</label>
                                        <input type="text" class="form-control mx-sm-3" id="masa" placeholder="">
                                                    
                                </form>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('argon') }}/js/ketua-jabatan/revealButtonKetuaJabatan.js"></script>
    {!! $dataTable->scripts() !!}
@endpush