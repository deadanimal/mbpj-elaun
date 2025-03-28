<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Permohonan Lebih Masa</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $jumlahTuntutanKerjaLebihMasa }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-active-40"></i>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Permohonan Diluluskan</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $jumlahTuntutanDiluluskan }}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Permohonan Ditolak</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $jumlahTuntutanTidakDiluluskan }}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Permohonan Tahun Semasa</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $jumlahTuntutanTahunSemasa }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-chart-bar-32"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>