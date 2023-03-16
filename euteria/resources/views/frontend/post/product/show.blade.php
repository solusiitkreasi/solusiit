@extends('frontend.layouts.app')
@section('content.slider', '')
@section('content')
<section id="products" class="section-gap flex-grow-1">
    <div class="container">
        <div class="row">
            <div class="col-auto product-col-carousel">
                <div class="main-carousel product-carousel">
                    <div class="main-slider product-slider">
                        @foreach ($post->post_images as $image)
                        <div class="main-slide-item product-slide-item is-auto">
                            <img src="{{ asset($image->file_name) }}" alt="Image {{ $image->file_name }}" draggable="false" />
                        </div>
                        @endforeach
                    </div>

                    <div class="thumb-slider product-thumb-slider">
                        @foreach ($post->post_images as $image)
                            <div class="thumb-slide-item product-thumb-slide-item">
                                <img src="{{ asset($image->file_name) }}" alt="Image {{ $image->file_name }}" draggable="false" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col d-flex flex-column product-col-content">
                <h4 class="mb-4">
                    {{$post->name}}
                    <br>
                    SKU : {{$post->sku}}
                </h4>

                <div class="primary-content flex-grow-1">
                    <p>
                        {!! $post->description !!}
                    </p>
                </div>

                <div class="row mt-4 no-gutters product-list-action mx-auto mx-md-0" style="max-width: 220px">
                    <div class="col-12">
                        <a href="{{ asset($post->brochure) }}" target="_blank" class="btn btn-primary btn-lg rounded-pill btn-block">
                            Download Pdf
                        </a>
                    </div>

                    <div class="col-12 mt-3">
                        <a href="{{ asset($post->certificate) }}" target="_blank" class="btn btn-primary btn-lg rounded-pill btn-block">
                            Download @lang('front.certificate')
                        </a>
                    </div>

                    @if (isset($post->marketplace_link))
                    <div class="col-12 mt-3">
                        <div class="product-action">
                            <button class="btn btn-primary btn-lg rounded-pill btn-block">
                                <span class="product-list-actiontext">
                                    @lang('front.buy_now')
                                </span>
                            </button>
                            <div class="product-action-extra">
                                @foreach (json_decode($post->marketplace_link) as $item)
                                <a href="{{$item->link}}" class="btn btn-primary btn-lg rounded-pill btn-block" target="_blank">
                                    @lang('front.buy_on') {{$item->name}}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('content.after')
    @include('frontend.partials.product-related')
@stop

@push('scripts')
<script>
(function($) {
    $(function() {
        $('.main-slider').slick({
            asNavFor: '.thumb-slider',
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            nextArrow: false,
            prevArrow: false,
            fade: true,
        });

        $('.thumb-slider').slick({
            asNavFor: '.main-slider',
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            nextArrow: false,
            prevArrow: false,
            focusOnSelect: true
        });
    });
})(jQuery);
</script>
@endpush
