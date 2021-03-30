<div class="modal fade" id="permohonanbaruModal">
    <div id="modaldialog" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Permohonan Baru Kerja Lebih Masa
                </h4>
                <button onclick="event.preventDefault();closeModal('permohonanbaruModal')" aria-hidden="true" class="close" data-dismiss="modal" type="button">
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
                                        <option disabled selected="true" value="pilihan"> -- pilih satu pilihan -- </option>
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
                                        <label class="form-control-label" for="namaPekerjaID">{{ __('No Pekerja') }}</label>
                                        <input type="text" name="namaPekerjaID" id="namaPekerjaID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="kpID">{{ __('No KP Baru') }}</label>
                                        <input type="text" name="kpID" id="kpID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" disabled>
                                        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="tarikh-kerjaID">{{ __('Tarikh Kerja') }}</label>
                                        <input name="tarikh-kerjaID" id="tarikh-kerjaID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"  >

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="masa-mulaID">{{ __('Masa Mula') }}</label>
                                        <input name="masa-mulaID" id="masa-mulaID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off">

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="tarikh-akhir-kerjaID">{{ __('Tarikh Akhir Kerja') }}</label>
                                        <input name="tarikh-akhir-kerjaID" id="tarikh-akhir-kerjaID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"  >

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="masa-akhirID">{{ __('Masa Akhir') }}</label>
                                        <input name="masa-akhirID" id="masa-akhirID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off">

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row "> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="sebabID">{{ __('Sebab - Sebab Lebih Masa') }}</label>
                                        <textarea type="text" name="sebabID" id="sebabID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="Catatan"></textarea>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row "> 
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="lokasiID">{{ __('Lokasi') }}</label>
                                        <textarea type="text" name="lokasiID" id="lokasiID" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}"></textarea>

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
                                        <label class="form-control-label" for="pegawaiSokongID">{{ __('Pegawai Sokong') }}</label>
                                        <select class="custom-select custom-select-sm" name="pegawaiSokongID" id="pegawaiSokongID">
                                        </select>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="pegawaiLulusID">{{ __('Pegawai Pelulus') }}</label>
                                        <select class="custom-select custom-select-sm" name="pegawaiLulusID" id="pegawaiLulusID">
                                        </select>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </form>
                    <div id="footerID" class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="event.preventDefault();closeModal('permohonanbaruModal');" data-dismiss="modal">Batal</button>
                        <button id="submitBtnID" type="button" class="btn btn-success" onclick="event.preventDefault();hantarPermohonanIndividu();">Hantar</button>
                    </div>
                </div>


                        <!-- PERMOHOHANAN BERKUMPULAN SINI -->

                <div id="divPermohonanBerkumpulan" class="my-3">
                    <hr class="my-3">
                    <form id="frmPermohonanBerkumpulan">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="namaPekerjaBK">{{ __('No Pekerja') }}</label>
                                        <input type="text" name="namaPekerjaBK" id="namaPekerjaBK" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->id) }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div> 
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="pegawaiSokongBK">{{ __('Pegawai Sokong') }}</label>
                                        <select class="custom-select custom-select-sm" name="pegawaiSokongBK" id="pegawaiSokongBK">
                                        </select>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="pegawaiLulusBK">{{ __('Pegawai Pelulus') }}</label>
                                        <select class="custom-select custom-select-sm" name="pegawaiLulusBK" id="pegawaiLulusBK">
                                        </select>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="tarikh-kerjaBK">{{ __('Tarikh Kerja') }}</label>
                                        <input name="tarikh-kerjaBK" id="tarikh-kerjaBK" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" min="{{Carbon\Carbon::now()->toDateString()}}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="masa-mulaBK">{{ __('Masa Mula') }}</label>
                                        <input name="masa-mulaBK" id="masa-mulaBK" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="tarikh-akhir-kerjaBK">{{ __('Tarikh Akhir Kerja') }}</label>
                                        <input name="tarikh-akhir-kerjaBK" id="tarikh-akhir-kerjaBK" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"  >

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="masa-akhirBK">{{ __('Masa Akhir') }}</label>
                                        <input name="masa-akhirBK" id="masa-akhirBK" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="sebabBK">{{ __('Sebab-Sebab Lebih Masa') }}</label>
                                        <textarea type="text" name="sebabBK" id="sebabBK" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Catatan') }}"></textarea>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="lokasiBK">{{ __('Lokasi') }}</label>
                                        <textarea type="text" name="lokasiBK" id="lokasiBK" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Catatan') }}" ></textarea>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>

                            <div id="pekerjaAddDiv">
                                <div id="divbuttonAdd" class="row">
                                    <div class="col align-self-center text-right">
                                        <button id="add" class="btn btn-sm btn-primary" type="button" title="Tambah Pekerja">{{ __('Tambah Pekerja') }}</button>
                                        <!-- <button id="remove" class="btn btn-sm btn-primary" type="button" title="Buang Pekerja" disabled>{{ __('Buang Pekerja') }}</button> -->
                                    </div>
                                </div>


                                <div id="new_chq" class="pekerjasform">

                                </div>
                                <input type="hidden" value="1" id="total_chq">
                            </div>
                        </div>  
                    </form>
                    <div id="footerBK" class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="event.preventDefault();closeModal('permohonanbaruModal');" data-dismiss="modal">Batal</button>
                        <button id="submitBtnBK" type="button" class="btn btn-success" onclick="event.preventDefault();hantarPermohonanBerkumpulan();">Hantar</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="hide" id="template" hidden>
    <div id="inputpekerja_00" class="row align-items-center inputpekerjaform">
        <div class="col-sm-5 divInputPekerja">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="inputnopekerja">{{ __('Nama') }}</label>
                <input type="text" name="inputnopekerja" id="inputnopekerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} inputnopekerja" placeholder="{{ __('No Pekerja') }}" value="" required autofocus>

                @include('alerts.feedback', ['field' => 'name'])
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="kp">{{ __('No KP Baru') }}</label>
                <input type="text" name="name" id="kp" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="98121114234" >

                @include('alerts.feedback', ['field' => 'name'])
            </div>
        </div>
        <div class="col-sm-1 ">
            <button onclick="buang(this.id);" id="buttonremove" aria-hidden="true" class="close" type="button">
                ×
            </button>
        </div>
    </div>
</div>