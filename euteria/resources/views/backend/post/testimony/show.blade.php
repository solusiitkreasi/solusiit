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
                    <strong>Gambar</strong>
                    <p><img src="{{asset($data->first_images)}}" class="img-fluid"></p>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Nama</strong>
                            <p class="pt-2 text-gray">{{$data->name}}</p>                            
                        </div>
                        <div class="col-lg-12">
                            <strong>Testimoni</strong>
                            <p>{!! $data->description !!}</p>
                        </div>
                        <div class="col-lg-12">                    
                            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>
@endsection