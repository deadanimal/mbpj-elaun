<div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-secondary modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h6 class="modal-title text-white" id="modal-title-notification">Notifikasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="heading m-2 text-center">Tolak Permohonan</h1>

                <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ __('Catatan') }}</textarea>

                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Ya') }}</button>
                        <button type="submit" class="btn btn-danger mt-4">{{ __('Tidak') }}</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>