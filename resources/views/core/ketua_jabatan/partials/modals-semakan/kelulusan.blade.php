<div class="row">
    <div class="mt-3 mb-2">
        <h6 class="modal-title" id="modal-title-default">Kelulusan</h6>
    </div>
    <form method="post" action="{{ route('profile.update') }}" id="formKelulusan" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

        <div class="row">
            <div class="col">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Pegawai Sokong') }}</label>
                    <input type="text" name="peg_sokong" id="kelulusan-peg-sokong" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="">
        
                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Jawatan') }}</label>
                    <input type="text" name="jawatan_peg_sokong" id="kelulusan-jawatan-peg-sokong" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="">
        
                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="form-control-label">{{ __('Pegawai Pelulus') }}</label>
                    <input class="form-control" name="peg_pelulus" id="kelulusan-peg-pelulus" type="text" placeholder="">
        
                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
            <div class="col">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Jawatan') }}</label>
                    <input type="text" name="jawatan_peg_pelulus" id="kelulusan-jawatan-peg-pelulus" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="">
        
                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-control-label">{{ __('Kerani Pemeriksa') }}</label>
            <input class="form-control" name="keraniPemeriksa" id="kelulusan-keraniPemeriksa" type="text" placeholder="">

            @include('alerts.feedback', ['field' => 'name'])
        </div>
        <div class="form-group">
            <label class="form-control-label">{{ __('Kerani Semakan') }}</label>
            <input class="form-control" name="keraniSemakan" id="kelulusan-keraniSemakan" type="text" placeholder="">

            @include('alerts.feedback', ['field' => 'name'])
        </div>
    </form>
</div>