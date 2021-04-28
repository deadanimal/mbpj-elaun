<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="/{{$role}}/dashboard">
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

        @switch(Auth::user()->role_id)
            @case(1)
                @include('layouts.navbars.partials.adminsidebar')
            @break

            @case(2)
            @case(4)
            @case(5)
            @case(6)
            @case(7)
                @include('layouts.navbars.partials.ktsidebar')
                @include('layouts.navbars.partials.2ndsidebar')
            @break

            @case(3)
            @case(9)
            @case(10)
                @include('layouts.navbars.partials.dbppsidebar')
            @break

            @case(8)
                @include('layouts.navbars.partials.ktsidebar')
            @break

            @default
                @include('layouts.navbars.partials.unauthenticatedsidebar')
        @endswitch

            </div>
        </div>
    </div>
</nav>

@push('js')
        
            

@endpush
