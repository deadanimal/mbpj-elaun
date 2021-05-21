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
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="kp">{{ __('Nama') }}</label>
                                            <input type="text" name="name" id="kp" class="form-control form-control-sm"  value="{{ auth()->user()->NAME }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="noKPB1">{{ __('No K/P Baru') }}</label>
                                            <input type="text" name="noKP" id="noKPB1" class="form-control form-control-sm" placeholder="" value="{{ auth()->user()->NIRC }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="noPekerjaB1">{{ __('No. Pekerja') }}</label>
                                            <input type="text" name="noPekerja" id="noPekerjaB1" class="form-control form-control-sm" placeholder="" value="{{ sprintf('%05d', auth()->user()->CUSTOMERID) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="tarikhKerjaMula">{{ __('Tarikh Kerja Mula') }}</label>
                                            <input name="tarikhKerjaMula" id="tarikhKerjaMula" class="form-control form-control-sm"  value="20/01/2020" >
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="tarikhKerjaAkhir">{{ __('Tarikh Kerja Akhir') }}</label>
                                            <input name="tarikhKerjaAkhir" id="tarikhKerjaAkhir" class="form-control form-control-sm"  value="20/01/2020" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="masaMula">{{ __('Masa Mula') }}</label>
                                            <input name="masaMula" id="masaMula" class="form-control form-control-sm" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="masaAkhir">{{ __('Masa Akhir') }}</label>
                                            <input name="masaAkhir" id="masaAkhir" class="form-control form-control-sm" placeholder="" value="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Mula Sebenar') }}</label>
                                        <input class="form-control form-control-sm" name="masaMulaSebenar-individu" value="{{ auth()->user()->CUSTOMERID }}" id="semakan-modal-individu-masaMulaSebenar" type="text" placeholder="" autofocus required>
                                    </div>
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Akhir Sebenar') }}</label>
                                        <input class="form-control form-control-sm" name="masaAkhirSebenar-individu" id="semakan-modal-individu-masaAkhirSebenar" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="tujuan">{{ __('Tujuan') }}</label>
                                            <textarea name="tujuan" id="tujuan" class="form-control" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-control-label" for="lokasiB1">{{ __('Lokasi') }}</label>
                                            <textarea name="lokasiB1" id="lokasiB1" class="form-control" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                        <!--  -->
                            <!-- RIGHT COLUMN EKEDATANGAN HERE -->
                                        <!--  -->

                            <div class="col-sm-6">
                                {{-- <h4>E-Kedatangan</h4> --}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label class="form-control-label" for="ekedatangan-tarikh">{{ __('Tarikh') }}</label>
                                            <input type="text" class="form-control form-control-sm" disabled name="tarikh" id="ekedatangan-tarikh" value="" aria-label="Tarikh">
                                        </div>
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
                </div>
            </div>
            {{-- <div class="modal-footer mx-auto"> --}}
            <div class="text-center mt-3">
                <input name="jenisPermohonanKT" value="" hidden>
                <input name="jenisPermohonanReal" value="" hidden>
                <input name="idPermohonan" value="" hidden>
                <button onclick="event.preventDefault();closeModal('borangB1Modal');" type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                <button id='buttonHantarPengesahan' onclick="event.preventDefault(); hantarPengesahan();"  type="button" class="btn btn-sm btn-success">Hantar Untuk Pengesahan</button>
            </div>
        </div>
    </div>
</div>
