<div class="modal fade" id="modal-default-berkumpulan" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-berkumpulan-title"></h6>
                <button onclick="closeModal('modal-default-berkumpulan')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-5 border-right">
                            <div class="text-left mt-2">
                                <h5>* Jenis Permohonan</h5>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="pilihanJenisPermohonanBerkumpulanInModal" placeholder="" readonly>
                            </div>

                            <h5 class="mt-3">Senarai Nama Kakitangan Terlibat: </h5>
                            <div class="mb-2 card-body border" style="height: 200px; overflow-y: scroll;">
                                <ul class="nav nav-pills list-group" id="senaraiKakitanganBerkumpulan" role="tab">
                                    {{-- JS appends <li> --}}
                                </ul>
                            </div> 

                            <form method="post" action="" id="formModalEdit" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')
    
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
    
                                <div class="form-group mb-5">
                                    <label class="form-control-label">{{ __('Tarikh Mohon') }}</label>
                                    <input class="form-control" name="tarikhMohon-berkumpulan" id="semakan-modal-berkumpulan-tarikhMohon" type="text" placeholder="">

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="row">
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Tarikh Mula Kerja') }}</label>
                                        <input class="form-control" name="tarikhMulaKerja-berkumpulan" id="semakan-modal-berkumpulan-tarikhMulaKerja" type="text" placeholder="">
     
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Tarikh Akhir Kerja') }}</label>
                                        <input class="form-control" name="tarikhAkhirKerja-berkumpulan" id="semakan-modal-berkumpulan-tarikhAkhirKerja" type="text" placeholder="">
     
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Masa Mula') }}</label>
                                        <input class="form-control" name="masaMula-berkumpulan" id="semakan-modal-berkumpulan-masaMula" type="text" placeholder="">
                                        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Masa Akhir') }}</label>
                                        <input class="form-control" name="masaAkhir-berkumpulan" id="semakan-modal-berkumpulan-masaAkhir" type="text" placeholder="">
    
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- VALUE IS USED TO STORE ID USER --}}
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Mula Sebenar') }}</label>
                                        <input class="form-control" name="masaMulaSebenar-berkumpulan" value="" id="semakan-modal-berkumpulan-masaMulaSebenar" type="text" placeholder="">
     
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Akhir Sebenar') }}</label>
                                        <input class="form-control" name="masaAkhirSebenar-berkumpulan" value="" id="semakan-modal-berkumpulan-masaAkhirSebenar" type="text" placeholder="">
    
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <button type="button" onclick="kemaskiniModal('berkumpulan')" class="btn btn-light btn-sm float-end">{{ __('Kemaskini') }}</button>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Lokasi') }}</label>
                                    <input class="form-control" name="lokasi-berkumpulan" id="semakan-modal-berkumpulan-lokasi" type="text" placeholder="">

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label" for="exampleFormControlTextarea1">{{ __('Sebab-Sebab Lebih Masa') }}</label>
                                    <textarea class="form-control" name="tujuan-berkumpulan" id="semakan-modal-berkumpulan-tujuan" rows="3"></textarea>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-7">
                            <div class="row" id="waktuKerjaBerkumpulan">
                                <form method="post" id="ekedatanganModalEL" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
        
                                    @include('alerts.success')
                                    @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane show active mt-2" id="testRetrieveDataContent" role="tabpanel" aria-labelledby="test1">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="form-control-label">{{ __('Nama') }}</label>
                                                        <input class="form-control" name="ekedatanganNama" type="text" placeholder="">
                    
                                                        @include('alerts.feedback', ['field' => 'name'])
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="form-control-label">{{ __('No Pekerja') }}</label>
                                                        <input class="form-control" name="ekedatanganNoPekerja" type="text" placeholder="">
                    
                                                        @include('alerts.feedback', ['field' => 'name'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div id="eKedatanganBerkumpulan">
                                    {{-- eKedatangan --}}
                                    @include('core.kerani_semakan.partials.modals-semakan.ekedatangan')
                                </div>

                                {{-- Kelulusan --}}
                                @include('core.kerani_semakan.partials.modals-semakan.kelulusan')
                            </div>
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
