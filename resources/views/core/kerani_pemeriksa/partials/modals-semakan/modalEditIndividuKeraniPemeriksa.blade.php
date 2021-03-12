<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-individu-title"></h6>
                <button onclick="closeModal('modal-default')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 border-right">
                            <div class="text-left mb-4">
                                <h5>* Jenis Permohonan</h5>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="pilihanJenisPermohonanIndividuInModal" placeholder="" readonly>
                            </div>
                            <form method="post" action="" id="formModalEdit" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')
    
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
    
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-2">
                                    <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                    <input type="text" name="nama" id="semakan-modal-nama" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label">{{ __('No. K/P Baru') }}</label>
                                    <input class="form-control" type="text" placeholder="">

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group mb-5">
                                    <label class="form-control-label">{{ __('Tarikh Mohon') }}</label>
                                    <input class="form-control" name="tarikhMohon-individu" id="semakan-modal-individu-tarikhMohon" type="text" placeholder="">

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="row">
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Tarikh Mula Kerja') }}</label>
                                        <input class="form-control" name="tarikhMulaKerja-individu" id="semakan-modal-individu-tarikhMulaKerja" type="text" placeholder="Default input">
     
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Masa Mula') }}</label>
                                        <input class="form-control" name="masaMula-individu" id="semakan-modal-individu-masaMula" type="text" placeholder="">
                                        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Tarikh Akhir Kerja') }}</label>
                                        <input class="form-control" name="tarikhAkhirKerja-individu" id="semakan-modal-individu-tarikhAkhirKerja" type="text" placeholder="Default input">
     
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Masa Akhir') }}</label>
                                        <input class="form-control" name="masaAkhir-individu" id="semakan-modal-individu-masaAkhir" type="text" placeholder="">
    
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Mula Sebenar') }}</label>
                                        <input class="form-control" name="masaMulaSebenar-individu" id="semakan-modal-individu-masaMulaSebenar" type="text" placeholder="">
     
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Akhir Sebenar') }}</label>
                                        <input class="form-control" name="masaAkhirSebenar-individu" id="semakan-modal-individu-masaAkhirSebenar" type="text" placeholder="">
    
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <button type="button" onclick="kemaskiniModal('individu')" class="btn btn-light btn-sm float-end">{{ __('Kemaskini') }}</button>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Lokasi') }}</label>
                                    <input class="form-control" name="lokasi-individu" id="semakan-modal-individu-lokasi" type="text" placeholder="">

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label" for="exampleFormControlTextarea1">{{ __('Sebab-Sebab Lebih Masa') }}</label>
                                    <textarea class="form-control" name="tujuan-individu" id="semakan-modal-individu-tujuan" rows="3"></textarea>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-md-7">

                            <div id="eKedatanganIndividu">
                                {{-- eKedatangan --}}
                                @include('core.kerani_pemeriksa.partials.modals-semakan.ekedatangan')
                            </div>

                            {{-- Kelulusan --}}
                            @include('core.kerani_pemeriksa.partials.modals-semakan.kelulusan')

                        </div>
                        
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Kemaskini') }}</button>
                        <button type="submit" class="btn btn-primary mt-4">{{ __('Tutup') }}</button>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
