<form  method="get" action="{{ route('penyelia-semakan.index')}}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    
        <h6 class="heading-small text-muted mb-4">{{ __('Maklumat Peribadi') }}</h6>

        @include('alerts.success')
        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

        <div class="col">
            <div class="col-sm-6 ml--3">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('No Pekerja') }}</label>
                    <input type="text" name="name" id="noPekerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                    @include('alerts.feedback', ['field' => 'name'])
                </div>
            </div>
        
            <div class="row"> 
                <div class="col-md-8">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Nama') }}</label>
                        <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Jawatan') }}</label>
                        <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
            </div>

            <div class="row"> 
            <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('No. KP Baru') }}</label>
                        <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Bahagian') }}</label>
                        <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="col">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Jabatan') }}</label>
                        <input type="email" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" disabled>

                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="button" onclick="event.preventDefault();checkUser();" id="semakPenyelia" class="btn btn-success mt-4">{{ __('Semak') }}</button>
                {{-- <button type="button" value="submit" id="semakPenyelia" class="btn btn-success mt-4">{{ __('Semak') }}</button> --}}
            </div>
        </div>
</form>