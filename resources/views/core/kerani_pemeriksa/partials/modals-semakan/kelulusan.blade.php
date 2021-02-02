<div class="row">
    <div class="mt-3 mb-2">
        <h6 class="modal-title" id="modal-title-default">Kelulusan</h6>
    </div>
    <form method="post" action="{{ route('profile.update') }}" id="formKelulusan" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-name">{{ __('Penyelia') }}</label>
            <input type="text" name="penyelia" id="kelulusan-penyelia" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>

            @include('alerts.feedback', ['field' => 'name'])
        </div>
        <div class="form-group mt--3">
            <label class="form-control-label">{{ __('Ketua Bahagian') }}</label>
            <input class="form-control" name="ketuaBahagian" id="kelulusan-ketuaBahagian" type="text" placeholder="">

            @include('alerts.feedback', ['field' => 'name'])
        </div>
        <div class="form-group mt--3">
            <label class="form-control-label">{{ __('Ketua Jabatan') }}</label>
            <input class="form-control" name="ketuaJabatan" id="kelulusan-ketuaJabatan" type="text" placeholder="">

            @include('alerts.feedback', ['field' => 'name'])
        </div>
        <div class="form-group mt--3">
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