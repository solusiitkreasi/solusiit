@extends('frontend.layouts.app')
@section('title',$post->name)
@section('content')
<div class="single-post-box">

    <div class="title-post">
        <h1>@yield('title')</h1>
        <ul class="post-tags">
            <li><i class="fa fa-clock-o"></i>{{$post->created_at->format('d F Y')}}</li>
            <li><i class="fa fa-user"></i><a href="#">Admin</a></li>
            {{-- <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li> --}}
            {{-- <li><i class="fa fa-eye"></i>{{$post->view_count}}</li> --}}
        </ul>
    </div>

    <div class="post-gallery">
        <iframe src="{{$post->youtube_embed_link}}" frameborder="0" width="100%" height="500"></iframe>
    </div>

    <div class="share-post-box">
        <div class="addthis_inline_share_toolbox"></div>
    </div>

</div>
@endsection
@include('frontend.plugins.addthis')
@push('scripts')
<script>
    $('img').addClass('img-fluid');
</script>
@endpush