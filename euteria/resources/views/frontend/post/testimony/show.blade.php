@extends('frontend.layouts.app')
@section('title',ucwords($menu->name))
@section('content')
<section class="bg-black">	
    <div class="container">
        <ol class="cd-breadcrumb custom-separator">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('index.menu',$menu->slug)}}">{{$menu->name}}</a></li>
            <li class="current"><em>{{$post->name}}</em></li>
        </ol>
    </div>
</section>
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <img class="img-fluid img shadow rounded-circle" width="100px" src="{{asset($post->first_images)}}" alt="{{$post->name}}">
                <h1 class="section-title mt-3 mb-2">{{$post->name}}</h1>
                <h6 class="text-muted">{{$post->position}}</h6>
                <p>{!! $post->description !!}</p>
                <div class="mt-5">
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@include('frontend.plugins.addthis')
@push('scripts')
<script>
    $('img').addClass('img-fluid');
</script>
    
@endpush