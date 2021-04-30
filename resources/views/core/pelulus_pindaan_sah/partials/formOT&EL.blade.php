<form  method="get" id="formOTEL" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <h6 class="heading-small text-muted">{{ __('Maklumat Peribadi') }}</h6>
                        <select id="selectJabatan" class="form-select form-select-sm col-8" aria-label=".form-select-sm example">
                            <option selected value="out">Pilih Jabatan</option>
                            @foreach ( $jabatans as $jabatan)
                                {{-- exclude Datuk Bandar --}}
                                @if ($jabatan->GE_KETERANGAN_JABATAN != 'DATUK BANDAR')
                                    <option value="{{ $jabatan->GE_KOD_JABATAN }}">{{ $jabatan->GE_KETERANGAN_JABATAN }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Nama') }}</label>
                                <input type="email" name="nama" id="nama-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-sm" placeholder="" value="" disabled>
            
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-5">
                    <div class="row">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                            <input type="text" name="noPekerja" id="noPekerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-sm" placeholder="" value="" required autofocus>

                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('No. KP Baru') }}</label>
                                <input type="email" name="noKPbaru" id="noKPBaru-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-sm" placeholder="" value="" disabled>
            
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Jawatan') }}</label>
                                <input type="email" name="jawatan" id="jawatan-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-sm" placeholder="" value="" disabled>
            
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-row justify-content-end align-items-end">
                        <div class="col">
                            <label class="form-control-label" for="min">Dari</label>
                            <input id="min" class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                        </div>
                        <div class="col">
                            <label class="form-control-label" for="max">Ke</label>
                            <input id="max" class="form-control form-control-sm" value="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>         
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Bahagian') }}</label>
                                <input type="email" name="bahagian" id="bahagian-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-sm" placeholder="" value="" disabled>
            
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Jabatan') }}</label>
                                <input type="email" name="jabatan" id="jabatan-semakan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-sm" placeholder="" value="" disabled>
            
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end align-items-end">
                <div class="col-md-auto">
                    <button type="button" onclick="event.preventDefault();" id="padamCarian" class="btn btn-sm btn-md btn-danger">{{ __('Padam Carian') }}</button>
                </div>
                <div class="col-md-auto">
                    <button type="button" onclick="event.preventDefault();" id="semakKeraniPemeriksa" class="btn btn-sm btn-success mt-4">{{ __('Semak') }}</button>
                </div>
            </div>    
        </div> 
</form>