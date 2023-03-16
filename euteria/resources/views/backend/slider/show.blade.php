@extends('backend.layouts.app')
@section('title','Detail Slideshow')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">            
                <div class="col-lg-12">
                    <strong>Gambar</strong>
                    <p>
                        <img src="{{asset($data->images)}}" class="img-fluid" width="50px">
                    </p>
                </div>
                {{-- <div class="col-lg-12">
                    <strong>Title</strong>
                    <p>{{$data->title}}</p>
                </div>
                <div class="col-lg-12">
                    <strong>Sub Title</strong>
                    <p>{{$data->sub_title}}</p>
                </div> --}}
            </div>
        </div>
        <div class="card-footer">
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.slider.index') !!}
        </div>
    </div>
</div>
@endsection