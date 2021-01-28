<div class="row">
    <form method="post" action="{{ route('profile.update') }}" id="formEkedatangan" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
  
        <h6 class="modal-title mb-3">eKedatangan</h6>

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('Tarikh') }}</label>
                    <input type="text" name="tarikh" id="ekedatangan-tarikh" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('Waktu Masuk') }}</label>
                    <input type="text" name="waktuMasuk" id="ekedatangan-waktuMasuk" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('Waktu Keluar') }}</label>
                    <input type="text" name="waktuKeluar" id="ekedatangan-waktuKeluar" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('JumlahWaktuKerja') }}</label>
                    <input type="text" name="jumlahWaktuKerja" id="ekedatangan-jumlahWaktuKerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
        </div>

        {{-- -------------- OT 1 -------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuMasukOT1') }}</label>
                    <input type="text" name="waktuMasukOT1" id="ekedatangan-waktuMasukOT1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuKeluarOT1') }}</label>
                    <input type="text" name="waktuKeluarOT1" id="ekedatangan-waktuKeluarOT1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOT1') }}</label>
                    <input type="text" name="jumlahOT1" id="ekedatangan-jumlahOT1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm smt--1">
                
            </div>
        </div>
        {{-- ------------- OT 2 --------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuMasukOT2') }}</label>
                    <input type="text" name="waktuMasukOT2" id="ekedatangan-waktuMasukOT2" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuKeluarOT2') }}</label>
                    <input type="text" name="waktuKeluarOT2" id="ekedatangan-waktuKeluarOT2" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOT2') }}</label>
                    <input type="text" name="jumlahOT2" id="ekedatangan-jumlahOT2" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                
            </div>
        </div>

        {{-- ------------ OT 3 ---------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuMasukOT3') }}</label>
                    <input type="text" name="waktuMasukOT3" id="ekedatangan-waktuMasukOT3" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('WaktuKeluarOT3') }}</label>
                    <input type="text" name="waktuKeluarOT3" id="ekedatangan-waktuKeluarOT3" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOT3') }}</label>
                    <input type="text" name="jumlahOT3" id="ekedatangan-jumlahOT3" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('JumlahOTKeseluruhan') }}</label>
                    <input type="text" name="jumlahOTKeseluruhan" id="ekedatangan-jumlahOTKeseluruhan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
        </div>
        {{-- ---------------------------- --}}

        <div class="row">
            <div class="col-sm mt--1">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                    <label class="form-control-label" for="input-name">{{ __('Waktu Anjal') }}</label>
                    <input type="text" name="waktuAnjal" id="ekedatangan-waktuAnjal" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value=""  required autofocus>

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
