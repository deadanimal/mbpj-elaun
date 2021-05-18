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
                                <select id="jenisPermohonan" name="jenisPermohonan" class="form-control custom-select" autocomplete="off">
                                    <option disabled selected="true" value="pilihan"> Pilih Jenis Permohonan</option>
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
                                <div class="form-group">
                                    <label class="form-control-label" for="namaPekerjaID">{{ __('Nama') }}</label>
                                    <input type="text" name="namaPekerjaID" id="namaPekerjaID" class="form-control form-control-sm text-default" value="{{ auth()->user()->NAME }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="noPekerjaID">{{ __('No Pekerja') }}</label>
                                        <input type="text" name="noPekerjaID" id="noPekerjaID" class="form-control form-control-sm text-default" value="{{ sprintf('%05d',auth()->user()->CUSTOMERID) }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="kpID">{{ __('No KP Baru') }}</label>
                                        <input type="text" name="kpID" id="kpID" class="form-control form-control-sm text-default"  value="{{ auth()->user()->NIRC }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tarikh-kerjaID">{{ __('Tarikh Kerja') }}</label>
                                        <input name="tarikh-kerjaID" id="tarikh-kerjaID" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tarikh-akhir-kerjaID">{{ __('Tarikh Akhir Kerja') }}</label>
                                        <input name="tarikh-akhir-kerjaID" id="tarikh-akhir-kerjaID" class="form-control form-control-sm"  autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="masa-mulaID">{{ __('Masa Mula') }}</label>
                                        <input name="masa-mulaID" id="masa-mulaID" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="masa-akhirID">{{ __('Masa Akhir') }}</label>
                                        <input name="masa-akhirID" id="masa-akhirID" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="sebabID">{{ __('Sebab - Sebab Lebih Masa') }}</label>
                                        <textarea type="text" name="sebabID" id="sebabID" class="form-control form-control-sm" value=""></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="lokasiID">{{ __('Lokasi') }}</label>
                                        <textarea type="text" name="lokasiID" id="lokasiID" class="form-control form-control-sm" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="pegawaiSokongID">{{ __('Pegawai Sokong') }}</label>
                                    <select name="pegawaiSokongID" id="pegawaiSokongID">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="pegawaiLulusID">{{ __('Pegawai Pelulus') }}</label>
                                    <select class="form-select form-select-sm" name="pegawaiLulusID" id="pegawaiLulusID">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="footerID" class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" onclick="event.preventDefault();closeModal('permohonanbaruModal');" data-dismiss="modal">Batal</button>
                        <button id="submitBtnID" type="button" class="btn btn-sm btn-success" onclick="event.preventDefault();hantarPermohonanIndividu();">Hantar</button>
                    </div>
                </div>

                <!-- PERMOHOHANAN BERKUMPULAN SINI -->

                <div id="divPermohonanBerkumpulan" class="my-3">
                    <hr class="my-3">
                    <form id="frmPermohonanBerkumpulan">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tarikh-kerjaBK">{{ __('Tarikh Kerja') }}</label>
                                        <input name="tarikh-kerjaBK" id="tarikh-kerjaBK" class="form-control form-control-sm" min="{{Carbon\Carbon::now()->toDateString()}}" >
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tarikh-akhir-kerjaBK">{{ __('Tarikh Akhir Kerja') }}</label>
                                        <input name="tarikh-akhir-kerjaBK" id="tarikh-akhir-kerjaBK" class="form-control form-control-sm"  >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="masa-akhirBK">{{ __('Masa Akhir') }}</label>
                                        <input name="masa-akhirBK" id="masa-akhirBK" class="form-control form-control-sm" autocomplete="off" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="masa-mulaBK">{{ __('Masa Mula') }}</label>
                                        <input name="masa-mulaBK" id="masa-mulaBK" class="form-control form-control-sm" autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="sebabBK">{{ __('Sebab-Sebab Lebih Masa') }}</label>
                                        <textarea type="text" name="sebabBK" id="sebabBK" class="form-control form-control-sm" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="lokasiBK">{{ __('Lokasi') }}</label>
                                        <textarea type="text" name="lokasiBK" id="lokasiBK" class="form-control form-control-sm" placeholder="" ></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="pegawaiSokongBK">{{ __('Pegawai Sokong') }}</label>
                                        <select class="custom-select custom-select-sm" name="pegawaiSokongBK" id="pegawaiSokongBK">
                                        <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="pegawaiLulusBK">{{ __('Pegawai Pelulus') }}</label>
                                        <select class="custom-select custom-select-sm" name="pegawaiLulusBK" id="pegawaiLulusBK">
                                        <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="namaPekerjaBK">{{ __('No Pekerja') }}</label>
                                        <input type="text" name="namaPekerjaBK" id="namaPekerjaBK" class="form-control form-control-sm text-default" value="{{ sprintf('%05d',auth()->user()->CUSTOMERID) }}" disabled>                                        
                                    </div>
                                </div> 
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="noKPBK">{{ __('No KP') }}</label>
                                        <input type="text" name="noKPBK" id="noKPBK" class="form-control form-control-sm text-default" value="{{ auth()->user()->NIRC }}" disabled>                                        
                                    </div>
                                </div> 
                            </div>

                            <div id="divbuttonAdd" class="row mb-4">
                                <div class="col align-self-center text-left ">
                                    <button id="add" class="btn btn-sm btn-primary" type="button" title="Tambah Pekerja">
                                        <i class="ni ni-fat-add"></i> 
                                        Tambah Pekerja
                                    </button>
                                </div>
                            </div>
                            <div id="pekerjaAddDiv" class="mb-4">

                                <div id="new_chq" class="pekerjasform">

                                </div>
                                <input type="hidden" value="1" id="total_chq">
                            </div>
                        </div>  
                    </form>
                    <div id="footerBK" class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" onclick="event.preventDefault();closeModal('permohonanbaruModal');" data-dismiss="modal">Batal</button>
                        <button id="submitBtnBK" type="button" class="btn btn-sm btn-success" onclick="event.preventDefault();hantarPermohonanBerkumpulan();">Hantar</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="hide" id="template" hidden>
    <div id="inputpekerja_00" class="row inputpekerjaform">
        <div class="col-6 divInputPekerja">
            <div class="form-group">
                <input type="text" name="inputnopekerja" id="inputnopekerja" class="form-control form-control-sm inputnopekerja" placeholder="{{ __('No Pekerja') }}" value="" >
            </div>
        </div> 
        <div class="col-5">
            <div class="form-group">
                <input type="text" name="name" id="kp" class="form-control form-control-sm" placeholder="No KP Baru" >
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                <button id="buttonremove" type="button" class="btn btn-sm btn-outline-danger" onclick="buang(this.id);" aria-hidden="true">Buang</button>
            </div>
        </div>
    </div>
</div>