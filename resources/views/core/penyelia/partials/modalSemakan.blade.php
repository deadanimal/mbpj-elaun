{{-- Modal Edit individu --}}
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Permohonan Baru Kerja Lebih Masa</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    
                    <div class="card-body px-lg-4 py-lg-4">
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Kemaskini') }}</button>
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Tutup') }}</button>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit Berkumpulan --}}

<div class="modal fade" id="modal-default-berkumpulan" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
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