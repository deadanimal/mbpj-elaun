<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="mb-2" id="titleTable"></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 ml-4 mt-2 text-left">
                    <button type="button" onclick="terimaSemuaPermohonan()" class="btn btn-sm btn btn-outline-primary">{{ __('Hantar semua') }}</button>
                </div>
            </div>
            <div class="table-responsive py-4">
                <table class="table" id="semakanKSDT">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th><input type="checkbox" onClick="toggleCheckboxSemakan(this)" /></th>
                            <th>Tarikh Permohonan</th>
                            <th>Masa Mula</th>
                            <th>Masa Akhir</th>
                            <th>Masa</th>
                            <th>Tujuan</th>
                            <th>Tindakan</th>
                            <th></th>
                            {{-- 2 extra th Had to be added cause they cause prob  --}}
                            <th hidden></th>
                            <th hidden></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="col-12 my-4">
                <form class="form-inline" style="display: flex; justify-content: flex-end">
                    <label for="jam">Jumlah Persamaan Jam:</label>
                    <input type="text" class="form-control mx-sm-3" id="jam" placeholder="">

                    <label for="masa">Jumlah Tuntutan Lebih Masa:</label>
                    <input type="text" class="form-control mx-sm-3" id="masa" placeholder="">   
                </form>
            </div>
        </div>
    </div>
</div>