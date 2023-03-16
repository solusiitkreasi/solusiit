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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Judul</strong>
                            <p>{{$data->name}}</p>                            
                        </div>
                        <div class="col-lg-12">
                            <strong>Video</strong>
                            <iframe src="{{$data->youtube_embed_link}}" frameborder="0" width="100%" height="600"></iframe>
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