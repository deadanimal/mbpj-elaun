<div id="cardPermohonanDT" class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-2">{{ __('Senarai Permohonan Borang B1') }}</h2>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-12 mt-2">
            <div class="table-responsive py-4">
                <table class="table table-flush" id="permohonanDT">
                    <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Tarikh Permohonan</th>
                        <th>Status</th>
                        <th>Progres</th>
                        <th>Masa Mula</th>
                        <th>Masa Akhir</th>
                        <th>Masa</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Kadar Jam</th>
                        <th>Tujuan</th>
                        <th></th>
                        <th hidden>Status</th>
                        <th hidden></th>
                        <th hidden></th>
                        <th ></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        
                    </tbody>
                </table>

            </div>
            <div class="col-12 my-4">
            
                <form class="form-inline" style="display: flex; justify-content: flex-end">
                    
                        <label for="jam" class="col-form-label col-form-label-sm">Jumlah Persamaan Jam: </label>
                        <input type="text" class="form-control form-control-sm column_filter" id="col0_filter" placeholder="" data-column="0">

                        <label for="masa" class="col-form-label col-form-label-sm">Jumlah Tuntutan Lebih Masa: </label>
                        <input type="text" class="form-control form-control-sm column_filter" id="col4_filter" placeholder="" data-column="4">
                                    
                </form>
            </div>
        </div>
    </div>
</div>