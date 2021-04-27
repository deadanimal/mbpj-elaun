<hr class="my-3">
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
            <a class="nav-link" href="{{$role}}-dashboard" role="button" >
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">{{ __('Dashboard') }}</span>
            </a>
            
        </li>
        <li class="nav-item {{ $parentSection == 'permohonan' ? 'active' : '' }}">
            <a class="nav-link " href="{{$role}}-semakan" >
                <i class="ni ni-briefcase-24 text-green"></i>
                <span class="nav-link-text" >{{ __('Semakan') }}</span>
            </a>
        </li>
        @if (auth()->user()->role_id == 2)
        <li class="nav-item {{ $parentSection == 'permohonan' ? 'active' : '' }}">
            <a class="nav-link " href="{{$role}}-on-call" >
                <i class="ni ni-badge text-orange"></i>
                <span class="nav-link-text" >{{ __('Senarai On Call') }}</span>
            </a>
        </li>
        @endif
        <li class="nav-item {{ $parentSection == 'bantuan' ? 'active' : '' }}">
            <a class="nav-link" href="{{$role}}-bantuan" >
                <i class="ni ni-ungroup text-yellow"></i>
                <span class="nav-link-text">{{ __('Bantuan') }}</span>
            </a>
        </li>
        <li class="nav-item {{ $parentSection == 'laporan' ? 'active' : '' }}">
            <a class="nav-link" href="{{$role}}-laporan" >
                <i class="ni ni-single-copy-04 text-pink"></i>
                <span class="nav-link-text">Laporan</span>
            </a>
        </li>
    </ul>
