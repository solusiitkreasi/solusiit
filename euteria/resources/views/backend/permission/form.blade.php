@extends('backend.layouts.app')
@section('title',$data ? 'Edit Permission':'Tambah Permission')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.permission.store') !!}            
            @else
            {!! Form::open()->put()->route('admin.permission.update',[$data->id])->fill($data) !!}            
            @endif
            <div class="row">            
                <div class="col-lg-12">                    
                    {!! Form::text('display_name', 'Name')->required() !!}
                </div>
                <div class="col-lg-12">                    
                    {!! Form::textarea('description', 'Description') !!}
                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Simpan')->primary() !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.permission.index') !!}                    
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection