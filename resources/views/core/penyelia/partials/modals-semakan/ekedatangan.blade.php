<div class="row" id="waktuKerjaIndividu">
    <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

        <h6 class="modal-title mb-3">eKedatangan</h6>

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
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('Waktu Keluar') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('JumlahWaktuKerja') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
        </div>

        {{-- -------------- OT 1 -------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuMasukOT1') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuKeluarOT1') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOT1') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                
            </div>
        </div>
        {{-- ------------- OT 2 --------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuMasukOT2') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuKeluarOT2') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOT2') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                
            </div>
        </div>

        {{-- ------------ OT 3 ---------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuMasukOT3') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuKeluarOT3') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOT3') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOTKeseluruhan') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
        </div>
        {{-- ---------------------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('Waktu Anjal') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm pl-0 mt--1">
            </div>
            <div class="col-sm pl-0 mt--1">
            </div>
            <div class="col-sm pl-0 mt--1">
            </div>
        </div>
    </form>
</div>
