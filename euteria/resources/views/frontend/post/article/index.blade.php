@extends('frontend.layouts.app')

@section('content')
<section id="news-event" class="section-gap">
    <div class="container">
        <h4 class="mb-4 text-primary text-uppercase">{{ $menu->name }}</h4>

        @foreach ($post as $row)
            @php
            $post_url = route('index.show', [$menu->slug,$row->slug]);

            $has_image = $row->post_images->count();
            @endphp
            <div class="row half-gutters post-item-row {{ $has_image ? ' has-image' : '' }} mb-5">
                @if ($has_image)
                    <div class="col-auto">
                        <h4 class="mb-2 text-uppercase text-left">
                            <a href="{{ $post_url }}" class="text-primary">{{ $row->name }}</a>
                        </h4>

                        <a
                            href="{{ $post_url }}"
                            title="Baca {{ $row->name }}"
                            class="post-item-image"
                        >
                            <img src="{{ asset($row->first_images) }}" alt="Thumbnail {{ $row->name }}" />
                        </a>
                    </div>
                @endif

                <div class="col d-flex flex-column pl-3">
                    <div class="primary-content flex-grow-1">
                        <h4 class="mb-3 text-uppercase text-left">
                            <a href="{{ $post_url }}" class="text-primary">{{ $row->name }}</a>
                        </h4>

                        <p>{!! Str::words(strip_tags($row->description), 100, '...') !!}</p>
                    </div>

                    <p class="mt-4 mb-0">
                        @if ($row->post_date)
                            <span>{{ $row->post_date->format('F j, Y') }}</span>
                        @endif

                        @if ($row->category)
                            <span> - {{ $row->category->name }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach

        @if ($post)
            <div class="pt-4">
                {{$post->links('components.pagination')}}                    
            </div>
        @endif
    </div>
</section>
@stop

@section('content.after', '')
