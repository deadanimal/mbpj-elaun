<form  method="get" id="formOTEL" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf

        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <h6 class="heading-small text-muted">{{ __('Maklumat Peribadi') }}</h6>
                        <select id="selectJenisPermohonan" class="form-select form-select-sm col-8" aria-label=".form-select-sm example">
                            <option selected value="out">Pilih Jenis Permohonan</option>
                            <option value="individu">Permohonan Individu</option>
                            <option value="berkumpulan">Permohonan Berkumpulan</option>
                        </select>
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ __('Nama') }}</label>
                                <input type="text" name="nama" id="nama-semakan" class="form-control form-control-sm" value="" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-5">
                    <div class="row">
                        <div class="form-group">
                            <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                            <input type="text" name="noPekerja" id="noPekerja" class="form-control form-control-sm" value="" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ __('No. KP Baru') }}</label>
                                <input type="text" name="noKPbaru" id="noKPBaru-semakan" class="form-control form-control-sm" value="" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ __('Jawatan') }}</label>
                                <input type="text" name="jawatan" id="jawatan-semakan" class="form-control form-control-sm" value="" disabled>
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
                            <input id="min" class="form-control form-control-sm" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                        <div class="col">
                            <label class="form-control-label" for="max">Ke</label>
                            <input id="max" class="form-control form-control-sm" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>         
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ __('Bahagian') }}</label>
                                <input type="text" name="bahagian" id="bahagian-semakan" class="form-control form-control-sm" value="" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ __('Jabatan') }}</label>
                                <input type="text" name="jabatan" id="jabatan-semakan" class="form-control form-control-sm" value="" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end align-items-end">
                <div class="col-md-auto">
                    <button type="button" onclick="event.preventDefault();" id="padamCarian" class="btn btn-sm btn-danger">{{ __('Padam Carian') }}</button>
                </div>
                <div class="col-md-auto">
                    <button type="button" onclick="checkUser()" id="semakPenyelia" class="btn btn-sm btn-success mt-4">{{ __('Semak') }}</button>
                </div>
            </div>    
        </div> 
</form>