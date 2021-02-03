<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="">
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

        @switch($group)
            @case(1)
                @include('layouts.navbars.partials.ktsidebar')
                @break
            
            @case(2)
                @include('layouts.navbars.partials.dbppsidebar')
                @break
            
            @case(3)
                @include('layouts.navbars.partials.adminsidebar')
                @break

            @case(4)
                @include('layouts.navbars.partials.ktsidebar')
                @include('layouts.navbars.partials.2ndsidebar')
                @break

            @default
                @include('layouts.navbars.partials.unauthenticated')
                
            @endswitch

        {{-- @if(Auth::user()->status == 00)
            @include('layouts.navbars.partials.unauthenticated')

        @elseif(Auth::user()->role_id == '2' ||  Auth::user()->role_id == '4' || Auth::user()->role_id == '5' || Auth::user()->role_id == '6' || Auth::user()->role_id == '7' || Auth::user()->role_id == '8' )
            @include('layouts.navbars.partials.ktsidebar')

        @elseif(Auth::user()->role_id == '1' ) 
            @include('layouts.navbars.partials.adminsidebar')
        
        @elseif(Auth::user()->role_id == '3'  || Auth::user()->role_id == '9')
            @include('layouts.navbars.partials.dbppsidebar')
        @endif --}}

        {{-- 2nd sidebar for Penyelia / KB / KJ / KS / KP --}}
        {{-- @if(Auth::user()->role_id == '2' ||  Auth::user()->role_id == '4' || Auth::user()->role_id == '5' || Auth::user()->role_id == '6' || Auth::user()->role_id == '7' )
            @include('layouts.navbars.partials.2ndsidebar')
            
        @endif --}}
            </div>
        </div>
    </div>
</nav>
