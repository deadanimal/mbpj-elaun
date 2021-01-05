<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('argon') }}/img/mbpj/logo/logo-mbpj(2).png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user()->role_id != '3'  )
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
                            <span class="nav-link-text" >{{ __('Permohonan') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'permohonan' ? 'show' : '' }}" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'profile' ? 'active' : '' }}">
                                    <a href="permohonan-baru" class="nav-link">{{ __('Permohonan Baru') }}</a>
                                </li>
                                <li class="nav-item  {{ $elementName == 'role-management' ? 'active' : '' }}">
                                    <a href="semakan" class="nav-link">{{ __('Semakan') }}</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ $parentSection == 'bantuan' ? 'active' : '' }}">
                        <a class="nav-link" href="bantuan" >
                            <i class="ni ni-collection text-yellow"></i>
                            <span class="nav-link-text">{{ __('Bantuan') }}</span>
                        </a>
                        
                    </li>
                    <li class="nav-item {{ $parentSection == 'tuntutan' ? 'active' : '' }}">
                        <a class="nav-link" href="tuntutan" >
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">{{ __('Tuntutan') }}</span>
                        </a>
                        
                    </li>
                    <li class="nav-item {{ $parentSection == 'laporan' ? 'active' : '' }}">
                        <a class="nav-link" href="laporan" >
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">{{ __('Laporan') }}</span>
                        </a>
                     
                    </li>
                    
                </ul>
                
                @elseif(Auth::user()->role_id == '3'  )
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
                    <li class="nav-item {{ $parentSection == 'bantuan' ? 'active' : '' }}">
                        <a class="nav-link" href="bantuan" >
                            <i class="ni ni-collection text-yellow"></i>
                            <span class="nav-link-text">{{ __('Modul Aduan') }}</span>
                        </a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_id == '2'  )
                
                
                <hr class="my-3">
                <ul class="navbar-nav mb-md-3">
                <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
                        <a class="nav-link" href="penyelia-dashboard" role="button" >
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
                @endif
            </div>
        </div>
    </div>
</nav>
