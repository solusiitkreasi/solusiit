<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="block-content">
                    @yield('content')
                </div>
            </div>
            <div class="col-sm-4">
                @include('frontend.partials.sidebar')
            </div>
        </div>
    </div>
</section>