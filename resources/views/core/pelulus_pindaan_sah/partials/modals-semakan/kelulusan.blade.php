
<form method="post" action="" id="formKelulusan" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Pegawai Sokong</span>
                </div>
                <input type="text" name="peg_sokong" id="kelulusan-peg-sokong" class="form-control form-control-sm" disabled value="">
            </div>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="jawatan_peg_sokong" id="kelulusan-jawatan-peg-sokong" class="form-control form-control-sm" disabled value="">  
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Pegawai Pelulus</span>
                </div>
                <input class="form-control form-control-sm" disabled name="peg_pelulus" id="kelulusan-peg-pelulus" type="text" >

            </div>
            <div class="input-group input-group-sm mb">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="jawatan_peg_pelulus" id="kelulusan-jawatan-peg-pelulus" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Kerani Pemeriksa</span>
                </div>
                <input class="form-control form-control-sm" disabled name="keraniPemeriksa" id="kelulusan-keraniPemeriksa" type="text" >

            </div>
            <div class="input-group input-group-sm mb">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="" id="" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Kerani Semakan</span>
                </div>
                <input class="form-control form-control-sm" disabled name="keraniSemakan" id="kelulusan-keraniSemakan" type="text" >

            </div>
            <div class="input-group input-group-sm mb">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">Jawatan</span>
                </div>
                <input type="text" name="" id="" class="form-control form-control-sm" disabled value="">
            </div>
        </div>
    </div>
</form>
