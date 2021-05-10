<div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
                        <a class="nav-link" href="/{{$role}}/dashboard" role="button" >
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboard') }}</span>
                        </a>
                        
                    </li>
                    <li class="nav-item {{ $parentSection == 'permohonan' ? 'active' : '' }}">
                        <a class="nav-link " href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'permohonan' ? 'true' : '' }}" aria-controls="navbar-examples">
                            <i class="ni ni-book-bookmark text-success"></i>
                            <span class="nav-link-text" >{{ __('Permohonan') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'permohonan' ? 'show' : '' }}" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'profile' ? 'active' : '' }} ml-3">
                                    <a href="permohonan-baru" class="nav-link">{{ __('Mohon Baru') }}</a>
                                </li>
                                <li class="nav-item  {{ $elementName == 'role-management' ? 'active' : '' }} ml-3">
                                    <a href="semakan" class="nav-link">{{ __('Pengesahan') }}</a>
                                </li>
                                <li class="nav-item {{ $parentSection == 'tuntutan' ? 'active' : '' }} ml-3">
                                    <a href="tuntutan" class="nav-link">{{ __('Tuntutan') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ $parentSection == 'bantuan' ? 'active' : '' }}">
                        <a class="nav-link" href="bantuan" >
                            <i class="ni ni-ungroup text-yellow"></i>
                            <span class="nav-link-text">{{ __('Bantuan') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'laporan' ? 'active' : '' }}">
                        <a class="nav-link" href="laporan" >
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">{{ __('Laporan') }}</span>
                        </a>
                    </li>
                </ul>

