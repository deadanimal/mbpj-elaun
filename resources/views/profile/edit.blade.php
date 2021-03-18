@extends('layouts.app', [
    'title' => __('User Profile'),
    'navClass' => 'bg-default',
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])

@section('content')
    @include('forms.header', [
        'title' => __('Selamat Datang') . ', '. auth()->user()->name,
        'description' => __('Sistem Pengurusan Elaun Lebih Masa Bandaraya Petaling Jaya'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2 d-flex align-items-stretch">
                <div class="card card-profile">
                    <img src="{{ asset('argon') }}/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#" class="pop">
                                    <img src="{{ asset('argon') }}/img/icons/profile/silhouette.jpg" class="border border-dark rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Photos</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="h3">
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-8 order-xl-1 align-items-stretch">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="text-muted mb-0">{{ __('MAKLUMAT PERIBADI') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="noPekerja" class="form-control-label col-form-label-sm mb-0 mt-2">{{__('No Pekerja')}}</label>
                                    <input type="text" name="noPekerja" id="noPekerja" class="form-control form-control-sm" value="{{auth()->user()->id}}" required autofocus disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group mb-0 {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="namaPekerja">{{ __('Nama') }}</label>
                                    <input type="text" name="namaPekerja" id="namaPekerja" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus disabled>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="noKP">{{ __('No. K/P Baru') }}</label>
                                    <input type="text" name="noKP" id="noKP" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="99999999999" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="noKPLama">{{ __('No. K/P Lama') }}</label>
                                    <input type="text" name="noKPLama" id="noKPLama" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="99999999999" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="tarikhLahir">{{ __('No. Tarikh Lahir') }}</label>
                                    <input type="text" name="tarikhLahir" id="tarikhLahir" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="11/11/1990" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="noTel">{{ __('No. Tel. Bimbit') }}</label>
                                    <input type="text" name="noTel" id="noTel" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="01234567891" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="noKPBaru">{{ __('No. K/P Baru') }}</label>
                                    <input type="text" name="noKPBaru" id="noKPBaru" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="999999999" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="bahagian">{{ __('Bahagian') }}</label>
                                    <input type="text" name="bahagian" id="bahagian" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="Pengurusan" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="jabatan">{{ __('Jabatan') }}</label>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="Teknologi Maklumat" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group mb-0 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label-sm mb-0 mt-2" for="jawatan">{{ __('Jawatan') }}</label>
                                    <input type="text" name="jawatan" id="jawatan" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="Pegawai" required disabled>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Kemaskini') }}</button>
                                </div>
                            </div>
                        </div> -->
                        </form>
                        <!-- <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @include('alerts.success', ['key' => 'password_status'])
                            @include('alerts.error_self_update', ['key' => 'not_allow_password'])

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                                    @include('alerts.feedback', ['field' => 'old_password'])
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
    @include('profile.partials.modalImage')
@endsection

@push('js')

        <script src="{{ asset('argon') }}/js/shared/userProfile.js"></script>

@endpush