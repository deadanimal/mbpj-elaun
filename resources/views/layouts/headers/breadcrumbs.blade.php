<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-dark d-inline-block mb-0">{{ $title }}</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4 text-dark">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/{{$role}}/dashboard"><i class="fas fa-home text-dark"></i></a></li>
            </ol>
        </nav>
    </div>
    @if (isset($calendar))
        {{ $calendar }}
    @else
        <div class="col-lg-6 col-5 text-right">
            {{-- <a href="#" class="btn btn-sm btn-neutral">{{ __('New') }}</a>
            <a href="#" class="btn btn-sm btn-neutral">{{ __('Filters') }}</a> --}}
        </div>
    @endif
</div>