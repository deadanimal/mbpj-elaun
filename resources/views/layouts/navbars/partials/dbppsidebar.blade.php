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
                    <span class="nav-link-text">{{ __('Modul Bantuan') }}</span>
                </a>
            </li>
        </ul>