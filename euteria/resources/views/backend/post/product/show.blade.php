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
                <div class="col-lg-3">
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
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Nama</strong>
                            <p class="pt-2 text-gray">{{$data->name}}</p>                            
                        </div>
                        <div class="col-lg-6">
                            <strong>SKU</strong>
                            <p class="pt-2 text-gray">{{$data->sku}}</p>
                        </div>
                        <div class="col-lg-6">
                            <strong>Brand</strong>
                            <p class="pt-2 text-gray">{{$data->post_brand->name}}</p>
                        </div>
                        <div class="col-lg-6">
                            <strong>Kategori</strong>
                            <p class="pt-2 text-gray">{{$data->post_category->name}}</p>
                        </div>
                        <div class="col-lg-6">
                            <strong>Sub Kategori</strong>
                            <p class="pt-2 text-gray">{{$data->sub_category ? $data->post_subcategory->name:'-'}}</p>
                        </div>
                        <div class="col-lg-6">
                            <strong>Brochure</strong>
                            <a href="{{asset($data->brochure)}}" class="py-2 d-block" target="_blank">
                                File
                            </a>
                            {{-- <p class="pt-2 text-gray">{{$data->post_category->name}}</p> --}}
                        </div>
                        <div class="col-lg-6">
                            <strong>Certificate</strong>
                            <a href="{{asset($data->certificate)}}" class="py-2 d-block" target="_blank">
                                File
                            </a>
                            {{-- <p class="pt-2 text-gray">{{$data->sub_category ? $data->post_subcategory->name:'-'}}</p> --}}
                        </div>
                        <div class="col-lg-12">
                            <strong>Marketplace Link</strong>
                            @if (isset($data->marketplace_link))
                            
                            <ul>
                                @foreach (json_decode($data->marketplace_link) as $item)
                                <li>
                                    <a href="{{$item->link}}" class="href">
                                        {{$item->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p class="pt-2 text-gray">-</p>
                            
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <strong>Deskripsi</strong>
                            <p class="pt-2 text-gray">
                                {{ strip_tags($data->description) }}
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer">                    
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
        </div>
    </div>
</div>
@endsection