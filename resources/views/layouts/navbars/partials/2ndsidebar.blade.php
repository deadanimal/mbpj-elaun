<hr class="my-3">
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
            <a class="nav-link" href="ketua-bahagian-dashboard" role="button" >
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">{{ __('Dashboard') }}</span>
            </a>
            
        </li>
        <li class="nav-item {{ $parentSection == 'permohonan' ? 'active' : '' }}">
            <a class="nav-link " href="penyelia-semakan" >
                <i class="fab fa-laravel" style="color: #f4645f;"></i>
                <span class="nav-link-text" >{{ __('Semakan') }}</span>
            </a>
        </li>
        <li class="nav-item {{ $parentSection == 'bantuan' ? 'active' : '' }}">
            <a class="nav-link" href="penyelia-bantuan" >
                <i class="ni ni-collection text-yellow"></i>
                <span class="nav-link-text">{{ __('Bantuan') }}</span>
            </a>
        </li>
        <li class="nav-item {{ $parentSection == 'laporan' ? 'active' : '' }}">
            <a class="nav-link" href="penyelia-laporan" >
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Laporan</span>
            </a>
        </li>
    </ul>
