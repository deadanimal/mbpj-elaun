<div class="modal fade" id="borangB1Modal">
    <div id="modaldialog" class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                        
                    <div class="col-sm-6">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                Permohonan Baru Kerja Lebih Masa
                            </h4>

                        </div>
                    </div>
                        
                    <div class="col-sm-6">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                Ekedatangan
                            </h4>
                            <button onclick="event.preventDefault();closeModal('borangB1Modal')" aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                ×
                            </button>
                        </div>
                    </div>
                        
                </div>
            </div>
            
            <hr class="my-auto">
            <div class="modal-body">
                <div class="alert alert-danger" id="permohonanbaru-error-bag" hidden>
                    <ul id="permohonan-baru-errors">
                    </ul>
                </div>
                
                <div id="divPermohonanIndividu" class="my-3">
                    <form id="frmTuntutan">
                        <div class="row vdivide">


                                        <!--  -->
                            <!-- LEFT COLUMN FORM HERE -->
                                        <!--  -->


                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('* No. Pekerja') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Nama') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('No K/P Baru') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Tarikh Kerja Mula') }}</label>
                                            <input type="date" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="20/01/2020" >

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Masa Mula') }}</label>
                                            <input type="time" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="">

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Tarikh Kerja Akhir') }}</label>
                                            <input type="date" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="20/01/2020" >

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Masa Akhir') }}</label>
                                            <input type="time" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" >

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Hari') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="S" disabled >

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <legend><h4 class="form-control-label">{{ __('Waktu') }}</h4></legend>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioWaktu" type="radio" id="inlineRadiobox1" value="option1">
                                                <label class="form-check-label" for="inlineRadiobox1">S</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioWaktu" type="radio" id="inlineRadiobox2" value="option2">
                                                <label class="form-check-label" for="inlineRadiobox2">M</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <legend><h4 class="form-control-label">{{ __('Kadar Jam') }}</h4></legend>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioWaktu" type="radio" id="inlineRadiobox1" value="option1">
                                                <label class="form-check-label" for="inlineRadiobox1">1.125</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioWaktu" type="radio" id="inlineRadiobox2" value="option2">
                                                <label class="form-check-label" for="inlineRadiobox2">1.225</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Catatan') }}</label>
                                            <textarea type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" ></textarea>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                            </div>


                                        <!--  -->
                            <!-- RIGHT COLUMN EKEDATANGAN HERE -->
                                        <!--  -->


                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('* Tarikh') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Nama') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Status') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Daftar Masuk') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Daftar Keluar') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Jumlah') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Mula Kerja') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Akhir Kerja') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Jumlah Kerja') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Waktu Anjal') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                            
                    
                        <!-- <div class="col">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                        <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

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
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="modal-footer mx-auto">
                <button onclick="event.preventDefault();closeModal('borangB1Modal')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
