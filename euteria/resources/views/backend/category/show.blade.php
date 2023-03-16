@extends('backend.layouts.app')
@section('title','Detail Category')
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
                    <p>{{$data->name}}</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.category.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection