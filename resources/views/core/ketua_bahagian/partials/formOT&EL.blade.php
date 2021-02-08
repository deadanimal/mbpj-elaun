<form  method="get" id="formOTEL" action="{{ route('ketua-bahagian-semakan.index')}}"" autocomplete="off" enctype="multipart/form-data">
    @csrf
        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

        <div class="row">
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <h6 class="heading-small text-muted mb-3">{{ __('Maklumat Peribadi') }}</h6>
                        <select id="selectJenisPermohonan" class="form-select form-select-sm col-5" aria-label=".form-select-sm example">
                            <option selected value="out">Pilih Jenis Permohonan</option>
                            <option value="individu">Permohonan Individu</option>
                            <option value="berkumpulan">Permohonan Berkumpulan</option>
                        </select>
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col">
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
                </div>
            </div>

            <div class="row"> 
                <div class="col-5">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                        <input type="text" name="noPekerja" id="noPekerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                <div class="col-7">
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
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                    <button type="button" onclick="event.preventDefault();checkUser();showUser();" id="semakPenyelia" class="btn btn-success mt-4">{{ __('Semak') }}</button>
                </div>
            </div>
        </div>
</form>