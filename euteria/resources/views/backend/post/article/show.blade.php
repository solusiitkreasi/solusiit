@extends('backend.layouts.app')
@section('title','Detail '.$menu->name)
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-lg-4">
                    {{-- <strong>Gambar</strong> --}}
                    @if (count($data->post_images) > 1)
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($data->post_images as $item)
                                <li data-target="#carouselId" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active':''}}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach ($data->post_images as $item)
                                    
                                <div class="carousel-item {{$loop->iteration == 1 ? 'active':''}}">
                                    <img src="{{asset($item->file_name)}}" height="200" class="img-thumbnail">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @else
                    <p class="pt-2"><img src="{{asset($data->first_images)}}" class="img-fluid img-thumbnail"></p>
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Nama</strong>
                            <p class="pt-2 text-gray">{{$data->name}}</p>                            
                        </div>
                        <div class="col-lg-12">
                            <strong>Tanggal</strong>
                            <p class="pt-2 text-gray">{{$data->post_date->format('d-m-Y')}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Deskripsi</strong>
                            <p class="pt-2 text-gray">{!! $data->description !!}</p>
                        </div>
                        
                    </div>
                </div>
            </div>                        
        </div>
        <div class="card-footer">                    
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
        </div>
    </div>
</div>
@endsection