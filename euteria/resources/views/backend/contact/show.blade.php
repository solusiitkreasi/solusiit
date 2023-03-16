@extends('backend.layouts.app')
@section('title','Detail Testimony')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">            
                <div class="col-lg-4">
                    <strong>Foto</strong>
                    @if ($data->image)
                        <img src="{{asset($data->image)}}" class="d-block img img-fluid img-thumbnail" width="200"/>
                    @else
                        -
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Nama</strong>
                            <p>{{$data->name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Status</strong>
                            <p>{{$data->name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Desctription</strong>
                            <p>{{$data->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <hr>
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.testimony.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection