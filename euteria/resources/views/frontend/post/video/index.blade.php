@extends('frontend.layouts.app')
@section('title',ucwords($menu->name))
@section('content')
<div class="grid-box">
    <div class="title-section">
        <h1><span class="home">@yield('title')</span></h1>
    </div>

    <div class="row">
        @forelse ($post as $row)
        <div class="col-md-6">
            <div class="news-post standard-post2">
                <div class="post-gallery" style="background-image: url('{{$row->youtube_thumbnail}}');background-size:cover;width:100%;height:250px; background-repeat: no-repeat;background-position: center; " loading="lazy">
                    {{-- <img src="{{$row->youtube_thumbnail}}" alt=""> --}}
                    {{-- <a class="category-post world" href="#">{{$row->category->name}}</a> --}}
                </div>
                <div class="post-title">
                    <h2><a href="{{route('index.show',[$menu->slug,$row->slug])}}">{{Str::limit($row->name,40)}}</a></h2>
                    <ul class="post-tags">
                        <li><i class="fa fa-clock-o"></i>{{$row->created_at->format('d F Y')}}</li>
                        <li><i class="fa fa-user"></i><a href="#">Admin</a></li>
                        {{-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> --}}
                        <li><i class="fa fa-eye"></i>{{$row->view_count}}</li>
                    </ul>
                </div>
                {{-- <div class="post-content">
                    <p>{{Str::limit(strip_tags($row->description),100)}}</p>
                    <a href="{{route('index.show',[$menu->slug,$row->slug])}}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                </div> --}}
            </div>
        </div>
        @empty
        <div class="col-lg-12">
            <h6 class="text-center">Belum ada data</h6>
        </div>
        @endforelse
    </div>
</div>
@if ($post)
{{-- <div class="mt-5"> --}}
    {{$post->links()}}                    
{{-- </div> --}}
@endif


@endsection