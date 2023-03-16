@extends('backend.layouts.app')
@section('title','Detail Menu')
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
                    <strong>Sub Menu Dari</strong>
                    <p class="pt-2 text-gray">{{$data->parent->name}}</p>
                </div>
                <div class="col-lg-12">
                    <strong>Tipe</strong>
                    <p class="pt-2 text-gray">{{ucwords($data->type)}}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.menu.index') !!}
        </div>
    </div>
</div>
@endsection