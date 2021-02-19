<div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-secondary modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h6 class="modal-title text-white" id="modal-title-notification">Tindakan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input class="form-group-input" type="radio" name="radioTindakan" id="perluKemaskini">
                        <label class="form-group-label" for="perluKemaskini">
                            Perlu Kemaskini
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-group-input" type="radio" name="radioTindakan" id="perluKemaskini2">
                        <label class="form-group-label" for="tolak">
                            Tolak
                        </label>
                    </div>
                    <div class="form-group">
                        <h4 class="text-muted">Catatan</h4>
                        <textarea class="form-control" name="catatan" id="semakan-catatan" rows="3"></textarea>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="text-center">
                        <button type="button" onclick="saveCatatan();" data-dismiss="modal" class="btn btn-success mt-4">{{ __('Kemaskini') }}</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger mt-4">{{ __('Batal') }}</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>