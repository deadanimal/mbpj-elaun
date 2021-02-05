<form  method="get" id="formOTEL" action="{{ route('penyelia-semakan.index')}}" autocomplete="off" enctype="multipart/form-data">
    @csrf

        <h6 class="heading-small text-muted mb-4">{{ __('Maklumat Peribadi') }}</h6>

        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

        <div class="col">
            <div class="row">
                <div class="col-8">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                        <input type="text" name="noPekerja" id="noPekerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                <div class="col-4">            
                    <div class="form-row justify-content-end align-items-end">
                        <div class="col-sm-6">
                            <label class ="form-control-label" for="min">From</label>
                            <input id="min"
                                class="form-control" value="dd / mm / yyyy" autocomplete="off">
                        </div>
                        <div class="col-sm-6">
                            <label class ="form-control-label" for="max">To</label>
                            <input id="max"
                                class="form-control" value="dd / mm / yyyy" autocomplete="off">
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row"> 
                <div class="col-md-8">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Nama') }}</label>
                        <input type="email" name="nama" id="nama-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" disabled>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Jawatan') }}</label>
                        <input type="email" name="jawatan" id="jawatan-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" disabled>

                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('No. KP Baru') }}</label>
                        <input type="email" name="noKPbaru" id="noKPBaru-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" disabled>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Bahagian') }}</label>
                        <input type="email" name="bahagian" id="bahagian-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" disabled>

                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Jabatan') }}</label>
                        <input type="email" name="jabatan" id="jabatan-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" disabled>

                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
            </div>

            <div class="row justify-content-end mx-4">
                <div class="col-2">
                <button type="button" onclick="event.preventDefault();" id="padamCarian" class="btn btn-md btn-danger">{{ __('Padam Carian') }}</button>
                </div>
                <div class="col-1">
                    <button type="button" id="semakPenyelia" class="btn btn-md btn-success ">{{ __('Semak') }}</button>
                    <input id="search" value="0" hidden>
                </div>
            </div>
           
        </div>
</form>