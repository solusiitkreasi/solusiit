@extends('frontend.layouts.app')

@section('content')
<div id="news-event-post" class="section-gap">
    <div class="container">
        <h4 class="mb-4 text-primary text-uppercase">{{ $post->name }}</h4>

        <div class="slider-carousel">
            <div class="main-slider article-slider">
                @foreach ($post->post_images as $row)
                <div class="main-slide-item">
                    <img src="{{ asset($row->file_name) }}" alt="Image {{ $loop->iteration }}" draggable="false" />
                </div>
                    
                @endforeach
            </div>

            <div class="thumb-slider">
                @foreach ($post->post_images as $row)
                <div class="thumb-slide-item">
                    <img src="{{ asset($row->file_name) }}" alt="Image {{ $loop->iteration }}" draggable="false" />
                </div>
                    
                @endforeach
            </div>
        </div>

        <div class="primary-content mt-4">
            {!! $post->description !!}

            <p class="mt-5 mb-0">
                @if ($post->post_date)
                    <span>{{ $post->post_date->format('F j, Y') }}</span>
                @endif

                @if ($post->category)
                    <span> - {{ $post->category->name }}</span>
                @endif
            </p>
        </div>
    </div>
</div>
@stop

@section('content.after', '')

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
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            nextArrow: false,
            prevArrow: false,
            focusOnSelect: true,
        });
    })
})(jQuery);
</script>
@endpush
