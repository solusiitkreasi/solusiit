@extends('backend.layouts.app')
@section('title',$data ? 'Edit Brand':'Tambah Brand')
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.brand.store')->multipart() !!}            
            @else
            {!! Form::open()->put()->route('admin.brand.update',[$data->id])->fill($data)->multipart() !!}            
            @endif
            <div class="row">          
                @if ($data)
                <div class="col-lg-12">
                    <label>Gambar Lama</label>
                    @if ($data->image)
                        <img src="{{asset($data->image)}}" class="img img-fluid" alt="">
                    @endif
                </div>
                @endif  
                <div class="col-lg-12">
                    {!! Form::file('file', 'Logo')->id('file') !!}
                </div>                
                <div class="col-lg-12">
                    {!! Form::text('name', 'Nama') !!}
                </div>                
                <div class="col-lg-12">
                    {!! Form::submit('Simpan')->primary() !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.brand.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection