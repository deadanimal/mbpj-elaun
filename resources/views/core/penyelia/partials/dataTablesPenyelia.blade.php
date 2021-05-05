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
            <div class="table-responsive py-4">
                <table class="table" id="semakanPYDT">
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
                            <th hidden></th>
                            <th hidden></th>
                            {{-- 2 extra th Had to be added cause they cause prob  --}}
                            <th hidden></th>
                            <th hidden></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div id="jumlahPersamaanJamMasaBlock" class="col-12 mb-2">
                <form class="form-inline text-right" style="display: flex; justify-content: flex-end">
                    <label for="inlineFormJam" class="m-2">Jumlah Persamaan Jam:</label>
                    <input type="text" class="form-control form-control-sm m-2" id="jam">

                    <label for="inlineFormMasa" class="m-2">Jumlah Tuntutan Lebih Masa:</label>
                    <input type="text" class="form-control form-control-sm m-2" id="masa">
                  </form>
            </div>
        </div>
    </div>
</div>