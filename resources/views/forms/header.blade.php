<!-- <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;"> -->
<div class="header pb-7  pt-lg-4 d-flex align-items-center" >
    <!-- Mask -->
    <span class="mask bg-secondary"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h1 class="display-2 text-dark">{{ $title }}</h1>
                @if (isset($description) && $description)
                    <p class="text-dark mt-0 mb-2">{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
</div> 