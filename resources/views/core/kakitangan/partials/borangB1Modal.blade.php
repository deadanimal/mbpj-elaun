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
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ auth()->user()->CUSTOMERID }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="kp">{{ __('Nama') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{auth()->user()->NIRC }}" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('No K/P Baru') }}</label>
                                            <input type="text" name="name1" id="input-name1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ auth()->user()->NAME }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="tarikhKerjaMula">{{ __('Tarikh Kerja Mula') }}</label>
                                            <input name="tarikhKerjaMula" id="tarikhKerjaMula" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="20/01/2020" >

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="masaMula">{{ __('Masa Mula') }}</label>
                                            <input name="masaMula" id="masaMula" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="">

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="tarikhKerjaAkhir">{{ __('Tarikh Kerja Akhir') }}</label>
                                            <input name="tarikhKerjaAkhir" id="tarikhKerjaAkhir" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="20/01/2020" >

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="masaAkhir">{{ __('Masa Akhir') }}</label>
                                            <input name="masaAkhir" id="masaAkhir" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" >

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
                                                <input class="form-check-input" name="radioWaktu" type="radio" id="inlineRadiobox1" value="Pagi" disabled>
                                                <label class="form-check-label" for="inlineRadiobox1">S</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioWaktu" type="radio" id="inlineRadiobox2" value="Petang" disabled>
                                                <label class="form-check-label" for="inlineRadiobox2">P</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioWaktu" type="radio" id="inlineRadiobox3" value="Malam" disabled>
                                                <label class="form-check-label" for="inlineRadiobox3">M</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <legend><h4 class="form-control-label">{{ __('Kadar Jam') }}</h4></legend>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioJam" type="radio" id="inlineJamRadio1" value="option1" disabled>
                                                <label class="form-check-label" for="inlineJamRadio1">1.125</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="radioJam" type="radio" id="inlineJamRadio2" value="option2" disabled>
                                                <label class="form-check-label" for="inlineJamRadio2">1.225</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="tujuan">{{ __('Tujuan') }}</label>
                                            <textarea name="tujuan" id="tujuan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" ></textarea>

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
                                            <label class="form-control-label" for="tarikh">{{ __('* Tarikh') }}</label>
                                            <input type="text" name="tarikh" id="tarikh" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="namaPekerja">{{ __('Nama') }}</label>
                                            <input type="text" name="namaPekerja" id="namaPekerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

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
                                            <label class="form-control-label" for="waktuMasuk">{{ __('Daftar Masuk') }}</label>
                                            <input type="text" name="waktuMasuk" id="waktuMasuk" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="waktuKeluar">{{ __('Daftar Keluar') }}</label>
                                            <input type="text" name="waktuKeluar" id="waktuKeluar" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="jumlahMasa">{{ __('Jumlah') }}</label>
                                            <input type="text" name="jumlahMasa" id="jumlahMasa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="mulaKerja">{{ __('Mula Kerja') }}</label>
                                            <input type="text" name="mulaKerja" id="mulaKerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="akhirKerja">{{ __('Akhir Kerja') }}</label>
                                            <input type="text" name="akhirKerja" id="akhirKerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="jumlahKerja">{{ __('Jumlah Kerja') }}</label>
                                            <input type="text" name="jumlahKerja" id="jumlahKerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required disabled autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="waktuAnjal">{{ __('Waktu Anjal') }}</label>
                                            <input type="text" name="waktuAnjal" id="waktuAnjal" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="modal-footer mx-auto">
                <input name="jenisPermohonanKT" value="" hidden>
                <input name="jenisPermohonanReal" value="" hidden>
                <input name="idPermohonan" value="" hidden>
                <button onclick="event.preventDefault();closeModal('borangB1Modal');" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button onclick="event.preventDefault();hantarPengesahan();" type="button" class="btn btn-primary">Hantar Untuk Pengesahan</button>
            </div>
        </div>
    </div>
</div>
