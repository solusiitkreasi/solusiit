@extends('backend.layouts.app')
@section('title','Detail Mengapa Kami')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-lg-12">
                    <strong>Gambar</strong>
                    <p><img src="{{$data->images}}" class="img-fluid" width="50px"></p>
                </div>
                <div class="col-lg-12">
                    <strong>Nama</strong>
                    <p>{{$data->name}}</p>                            
                </div>                        
                <div class="col-lg-12">                    
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.service.index') !!}
                </div>
            </div>                        
        </div>
    </div>
</div>
@endsection