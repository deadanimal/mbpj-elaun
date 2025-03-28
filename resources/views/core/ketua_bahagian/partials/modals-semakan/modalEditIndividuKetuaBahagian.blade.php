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
                        <div class="col-md-6 border-right">
                            <div class="text-left mb-4">
                                <h5>* Jenis Permohonan</h5>
                                <input type="text" name="name" class="form-control form-control-sm" disabled id="pilihanJenisPermohonanIndividuInModal">
                            </div>
                            <form method="post" action="" id="formModalEdit" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')
    
                                <div class="form-group mb-2">
                                    <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                    <input type="text" name="nama" id="semakan-modal-nama" class="form-control form-control-sm" disabled value="" >
                                </div>
                                <div class="row mb-5">
                                    <div class="col">
                                        <div class="form-group mb-2">
                                            <label class="form-control-label">{{ __('No. K/P Baru') }}</label>
                                            <input class="form-control form-control-sm" disabled name="noKP" id="semakan-modal-noKP" type="text">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-2">
                                            <label class="form-control-label">{{ __('No. Pekerja') }}</label>
                                            <input class="form-control form-control-sm" disabled name="noPekerja" id="semakan-modal-noPekerja" type="text">                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label">{{ __('Tarikh Mohon') }}</label>
                                    <input class="form-control form-control-sm" disabled name="tarikhMohon-individu" id="semakan-modal-individu-tarikhMohon" type="text">
                                </div>
                                <div class="row">
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Tarikh Mula Kerja') }}</label>
                                        <input class="form-control form-control-sm" disabled name="tarikhMulaKerja-individu" id="semakan-modal-individu-tarikhMulaKerja" type="text" placeholder="Default input">
                                    </div>
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Masa Mula') }}</label>
                                        <input class="form-control form-control-sm" disabled name="masaMula-individu" id="semakan-modal-individu-masaMula" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Tarikh Akhir Kerja') }}</label>
                                        <input class="form-control form-control-sm" disabled name="tarikhAkhirKerja-individu" id="semakan-modal-individu-tarikhAkhirKerja" type="text" placeholder="Default input">
                                    </div>
                                    <div class="col form-group mb-2">
                                        <label class="form-control-label">{{ __('Masa Akhir') }}</label>
                                        <input class="form-control form-control-sm" disabled name="masaAkhir-individu" id="semakan-modal-individu-masaAkhir" type="text">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Mula Sebenar') }}</label>
                                        <input class="form-control form-control-sm" value="" name="masaMulaSebenar-individu" id="semakan-modal-individu-masaMulaSebenar" type="text">
                                    </div>
                                    <div class="col form-group">
                                        <label class="form-control-label">{{ __('Masa Akhir Sebenar') }}</label>
                                        <input class="form-control form-control-sm" value="" name="masaAkhirSebenar-individu" id="semakan-modal-individu-masaAkhirSebenar" type="text">
                                    </div>
                                </div>

                                {{-- Kadar Jam --}}
                                @include('core.ketua_bahagian.partials.hariKadarJam')

                                <div class="form-group mb-5">
                                    <button type="button" onclick="kemaskiniModal('individu')" class="btn btn-primary btn-sm float-end">{{ __('Kemaskini') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="accordion" id="detailPermohananAccordion">
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="sebabLokasiHeading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sebabLokasiContent" aria-expanded="true" aria-controls="sebabLokasiContent">
                                        Sebab & Lokasi
                                    </button>
                                </h2>
                                <div id="sebabLokasiContent" class="accordion-collapse collapse" aria-labelledby="sebabLokasiHeading" data-bs-parent="#detailPermohananAccordion">
                                    <div class="accordion-body">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Lokasi') }}</label>
                                            <input class="form-control form-control-sm" disabled name="lokasi-individu" id="semakan-modal-individu-lokasi" type="text">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-control-label" >{{ __('Sebab-Sebab Lebih Masa') }}</label>
                                            <textarea class="form-control form-control-sm" disabled name="tujuan-individu" id="semakan-modal-individu-tujuan" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="eKedatanganHeading">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#eKedatanganContent" aria-expanded="false" aria-controls="eKedatanganContent">
                                        eKedatangan
                                        </button>
                                    </h2>
                                        <div id="eKedatanganContent" class="accordion-collapse collapse show" aria-labelledby="eKedatanganHeading" data-bs-parent="#detailPermohananAccordion">
                                            <div class="accordion-body">
                                                @include('core.ketua_bahagian.partials.modals-semakan.ekedatangan')
                                            </div>
                                        </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kelulusanHeading">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kelulusanContent" aria-expanded="false" aria-controls="kelulusanContent">
                                            Kelulusan
                                        </button>
                                    </h2>
                                    <div id="kelulusanContent" class="accordion-collapse collapse" aria-labelledby="kelulusanHeading" data-bs-parent="#detailPermohananAccordion">
                                        <div class="accordion-body">
                                            @include('core.ketua_bahagian.partials.modals-semakan.kelulusan')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
