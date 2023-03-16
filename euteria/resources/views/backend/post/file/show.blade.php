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
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Nama</strong>
                            <p>{{$data->name}}</p>                            
                        </div>
                        <div class="col-lg-12">
                            <strong>Tahun</strong>
                            <p>{!! $data->year !!}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Tanggal</strong>
                            <p>{!! $data->post_date->format('d F Y')!!}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Keterangan</strong>
                            <p>{{ strip_tags($data->description) }}</p>
                        </div>
                        <div class="col-lg-12">                    
                            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <iframe src="{{asset($data->first_file)}}" width="100%" height="450" frameborder="0"></iframe>
                </div>
            </div>                        
        </div>
    </div>
</div>
@endsection