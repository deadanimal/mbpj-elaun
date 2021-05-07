<form method="post" action="{{ route('profile.update') }}" id="formEkedatangan" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('put')

    @include('alerts.success')
    @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

    <div class="row">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Tarikh</span>
            </div>
            <input type="text" class="form-control" disabled name="tarikh" id="ekedatangan-tarikh" value="" aria-label="Tarikh">
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Masuk') }}</label>
                <input type="text" name="waktuMasuk" id="ekedatangan-waktuMasuk" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Keluar') }}</label>
                <input type="text" name="waktuKeluar" id="ekedatangan-waktuKeluar" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Jumlah Waktu') }}</label>
                <input type="text" name="jumlahWaktuKerja" id="ekedatangan-jumlahWaktuKerja" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
    </div>

    {{-- -------------- OT 1 -------------- --}}
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Masuk OT1') }}</label>
                <input type="text" name="waktuMasukOT1" id="ekedatangan-waktuMasukOT1" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Keluar OT1') }}</label>
                <input type="text" name="waktuKeluarOT1" id="ekedatangan-waktuKeluarOT1" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Jumlah OT1') }}</label>
                <input type="text" name="jumlahOT1" id="ekedatangan-jumlahOT1" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
    </div>

    {{-- ------------- OT 2 --------------- --}}
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Masuk OT2') }}</label>
                <input type="text" name="waktuMasukOT2" id="ekedatangan-waktuMasukOT2" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Keluar OT2') }}</label>
                <input type="text" name="waktuKeluarOT2" id="ekedatangan-waktuKeluarOT2" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Jumlah OT2') }}</label>
                <input type="text" name="jumlahOT2" id="ekedatangan-jumlahOT2" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
    </div>

    {{-- ------------ OT 3 ---------------- --}}
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Masuk OT3') }}</label>
                <input type="text" name="waktuMasukOT3" id="ekedatangan-waktuMasukOT3" class="form-control form-control-sm" disabled value="">    
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Keluar OT3') }}</label>
                <input type="text" name="waktuKeluarOT3" id="ekedatangan-waktuKeluarOT3" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Jumlah OT3') }}</label>
                <input type="text" name="jumlahOT3" id="ekedatangan-jumlahOT3" class="form-control form-control-sm" disabled value="">   
            </div>
        </div>
    </div>

    {{-- ---------------------------- --}}
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <input type="hidden">                
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Waktu Anjal') }}</label>
                <input type="text" name="waktuAnjal" id="ekedatangan-waktuAnjal" class="form-control form-control-sm" disabled value="">                
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label class="form-control-label" for="input-name">{{ __('Jumlah OT') }}</label>
                <input type="text" name="jumlahOTKeseluruhan" id="ekedatangan-jumlahOTKeseluruhan" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
    </div>
</form>

