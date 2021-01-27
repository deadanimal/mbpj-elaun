<div class="modal fade" id="permohonanbaruModal">
    <div id="modaldialog" class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Permohonan Baru Kerja Lebih Masa
                </h4>
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    ×
                </button>
            </div>
            <hr class="my-auto">
            <div class="modal-body">
                <div class="alert alert-danger" id="permohonanbaru-error-bag" hidden>
                    <ul id="permohonan-baru-errors">
                    </ul>
                </div>
                    <div class="col">
                        <div class="row">
                            <div id="selectpermohonan" class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="jenisPermohonan"><font color="red">*</font> Jenis Permohonan</label>
                                    <select id="jenisPermohonan" name="jenisPermohonan" class="form-control custom-select" autocomplete="off">
                                        <option disabled selected="true" value> -- pilih satu pilihan -- </option>
                                        <option value="frmPermohonanIndividu">Permohonan Individu</option>
                                        <option value="frmPermohonanBerkumpulan">Permohonan Berkumpulan</option>
                                    </select>                       
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div id="divPermohonanIndividu" class="my-3">
                    <hr class="my-3">
                    <form id="frmPermohonanIndividu">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                                        <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="tarikh-mohon">{{ __('Tarikh Mohon') }}</label>
                                        <input type="date" name="name" id="tarikh-mohon" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="11/01/2021" disabled>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="tarikh-kerja">{{ __('Tarikh Kerja') }}</label>
                                        <input type="date" name="date" id="tarikh-kerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" >

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="masa-akhir">{{ __('Masa Akhir') }}</label>
                                        <input type="date" name="name" id="masa-akhir" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" >

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="masa-mula">{{ __('Masa Mula') }}</label>
                                        <input type="date" name="name" id="masa-mula" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}" >

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="sebab">{{ __('Sebab - Sebab Lebih Masa') }}</label>
                                        <textarea type="text" name="name" id="sebab" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="Catatan"></textarea>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="lokasi">{{ __('Lokasi') }}</label>
                                        <textarea type="text" name="name" id="lokasi" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}"></textarea>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="col my-3">
                            <div class="row"> 
                                <div class="col-sm">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('No. KP Baru') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('email', auth()->user()->name) }}">

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </form>
                </div>


                        <!-- PERMOHOHANAN BERKUMPULAN SINI -->

                <div id="divPermohonanBerkumpulan" class="my-3">
                    <hr class="my-auto">
                    <form id="frmPermohonanBerkumpulan">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                                        <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                                        <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                                        <textarea type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" ></textarea>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                                        <textarea type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" ></textarea>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-right">
                                    <button id="add" class="btn btn-sm btn-primary" type="button" title="Tambah Pekerja">{{ __('Tambah Pekerja') }}</button>
                                    <button id="remove" class="btn btn-sm btn-primary" type="button" title="Buang Pekerja" disabled>{{ __('Buang Pekerja') }}</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                                        <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div id="new_chq">

                            </div>
                            <input type="hidden" value="1" id="total_chq">
                        </div>  
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<div class="hide" id="template" hidden>
    <div id="inputpekerja_00" class="row">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                @include('alerts.feedback', ['field' => 'name'])
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                @include('alerts.feedback', ['field' => 'name'])
            </div>
        </div>
    </div>
</div>