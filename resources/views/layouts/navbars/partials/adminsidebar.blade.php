<div class="navbar-inner">
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
            <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
                <a class="nav-link" href="dashboard" role="button" >
                    <i class="ni ni-shop text-primary"></i>
                    <span class="nav-link-text">{{ __('Dashboard') }}</span>
                </a>
                
            </li>
            <li class="nav-item {{ $parentSection == 'permohonan' ? 'active' : '' }}">
                <a class="nav-link " href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'permohonan' ? 'true' : '' }}" aria-controls="navbar-examples">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                    <span class="nav-link-text" >{{ __('Pengurusan Pengguna') }}</span>
                </a>
                <div class="collapse {{ $parentSection == 'permohonan' ? 'show' : '' }}" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item {{ $elementName == 'profile' ? 'active' : '' }}">
                            <a href="pengurusan-pengguna" class="nav-link">{{ __('Pengurusan Pengguna') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ $parentSection == 'laporan' ? 'active' : '' }}">
                <a class="nav-link" href="modul-laporan" >
                    <i class="ni ni-single-copy-04 text-pink"></i>
                    <span class="nav-link-text">{{ __('Modul Laporan') }}</span>
                </a>
                
            </li>
            <li class="nav-item {{ $parentSection == 'bantuan' ? 'active' : '' }}">
                <a class="nav-link" href="modul-aduan" >
                    <i class="ni ni-collection text-yellow"></i>
                    <span class="nav-link-text">{{ __('Modul Aduan') }}</span>
                </a>
                
            </li>                    
        </ul>
        
        