@extends('backend.layouts.app')
@section('title','Detail Brand')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">            
                <div class="col-lg-4">
                    @if ($data->image)
                        <img src="{{asset($data->image)}}" class="img-fluid img-thumbnail"/>
                    @else
                        -
                    @endif
                </div>
                <div class="col-lg-8">
                    <strong>Nama</strong>
                    <p>{{$data->name}}</p>
                </div>
                
            </div>
        </div>
        <div class="card-footer">
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.brand.index') !!}

        </div>
    </div>
</div>
@endsection