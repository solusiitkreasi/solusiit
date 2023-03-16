@extends('backend.layouts.app')
@section('title','Detail Permission')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">            
                <div class="col-lg-12">
                    <strong>Nama</strong>
                    <p class="pt-2 text-gray">{{$data->name}}</p>
                </div>
                <div class="col-lg-12">
                    <strong>Tampilan Nama</strong>
                    <p class="pt-2 text-gray">{{$data->display_name}}</p>
                </div>
                <div class="col-lg-12">
                    <strong>Deskripsi</strong>
                    <p class="pt-2 text-gray">{{$data->description}}</p>
                </div>
                
            </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.permission.index') !!}
        </div>
    </div>
</div>
@endsection