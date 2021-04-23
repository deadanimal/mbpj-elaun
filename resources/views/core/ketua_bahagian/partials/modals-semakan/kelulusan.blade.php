
<form method="post" action="{{ route('profile.update') }}" id="formKelulusan" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Pegawai Sokong</span>
                </div>
                <input type="text" name="peg_sokong" id="kelulusan-peg-sokong" class="form-control form-control-sm" placeholder="" value="">
            </div>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="jawatan_peg_sokong" id="kelulusan-jawatan-peg-sokong" class="form-control form-control-sm" placeholder="" value="">  
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Pegawai Pelulus</span>
                </div>
                <input class="form-control form-control-sm" name="peg_pelulus" id="kelulusan-peg-pelulus" type="text" placeholder="">

            </div>
            <div class="input-group input-group-sm mb">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="jawatan_peg_pelulus" id="kelulusan-jawatan-peg-pelulus" class="form-control form-control-sm" placeholder="" value="">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Kerani Pemeriksa</span>
                </div>
                <input class="form-control form-control-sm" name="keraniPemeriksa" id="kelulusan-keraniPemeriksa" type="text" placeholder="">

            </div>
            <div class="input-group input-group-sm mb">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" value="">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Kerani Semakan</span>
                </div>
                <input class="form-control form-control-sm" name="keraniSemakan" id="kelulusan-keraniSemakan" type="text" placeholder="">

            </div>
            <div class="input-group input-group-sm mb">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" value="">
            </div>
        </div>
    </div>
</form>
