@extends('frontend.layouts.app')
@section('title',ucwords($menu->name))
@section('content')
<div class="breadcrumbs overlay" style="background-image:url('{{asset('frontend/images/logo/breadcrumb.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <div class="bread-menu">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a>{{$menu->name}}</a></li>
                        </ul>
                    </div>
                    <div class="bread-title"><h2>{{$menu->name}}</h2></div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-space">
    <div class="container">
        <div class="row">
                     
            @forelse ($post as $row)
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{$loop->iteration * 300}}">
                <img src="{{asset($row->first_images)}}" class="d-block mx-auto rounded-circle shadow">
                <h5 class="text-center text-blue py-3">{{$row->name}}</h5>
                <h6 class="text-center text-yellow">{{$row->position}}</h6>
                <p class="text-center px-5 mt-3">{!! strip_tags($row->description) !!}</p>
                {{-- <a href="{{route('index.show',[$menu->slug,$row->slug])}}" style="text-decoration: none; color:inherit;">
                    <div class="card mx-auto mb-5" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset($row->first_images)}}" alt="Card image cap">
                        <div class="card-body text-center">
                            <hr>
                            <h5 class="card-title card-title-blue text-center">{{Str::limit($row->name,50)}}</h5>
                            <small class="text-muted">{{$row->position}}</small>
                            <p class="card-text mt-3">{{Str::limit(strip_tags($row->description),100)}}</p>
                        </div>
                    </div>
                </a> --}}
            </div>     
            @empty
            <div class="col-lg-12">
                <h6 class="text-center">Belum ada data</h6>
            </div>
            @endforelse
            
        </div>        
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if ($post)
                <div class="mt-5">
                    {{$post->links()}}                    
                </div>
                @endif
                {{-- <div class="wrapper-read-more text-center">
                    <a href="{{route('index.menu','pengumuman')}}" class="btn btn-blue btn-more">
                        Lihat lainnya <i class="fa fa-arrow-right fa-fw"></i>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection
@include('frontend.plugins.aos')