<div class="header pb-7  pt-lg-4 d-flex align-items-center" >
    <!-- Mask -->
    <span class="mask bg-secondary"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h1 class="display-3 text-dark">{{ $title }}</h1>
                @if (isset($description) && $description)
                    <p class="text-dark mt-0 mb-2">{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
</div> 