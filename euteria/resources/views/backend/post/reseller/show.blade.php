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
                <div class="col-lg-3">
                    {{-- <strong>Gambar</strong> --}}
                    <p><img src="{{asset($data->first_images)}}" class="img-fluid img-thumbnail"></p>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <strong>Nama</strong>
                            <p class="pt-2 text-gray">{{$data->name}}</p>                            
                        </div>
                        <div class="col-lg-6">
                            <strong>Email</strong>
                            <p class="pt-2 text-gray">{{$data->email}}</p>                            
                        </div>
                        <div class="col-lg-6">
                            <strong>Nomer Telepon</strong>
                            <p class="pt-2 text-gray">{{$data->phone_number}}</p>                            
                        </div>
                        <div class="col-lg-6">
                            <strong>Provinsi</strong>
                            <p class="pt-2 text-gray">{{$data->provinsi->nama_provinsi}}</p>                            
                        </div>
                        <div class="col-lg-6">
                            <strong>Kota</strong>
                            <p class="pt-2 text-gray">{{$data->kota->nama_kota}}</p>                            
                        </div>
                        <div class="col-lg-12">
                            <strong>Koordinat</strong>
                            <p class="pt-2 text-gray">{{$data->coordinate}}</p>                            
                        </div>
                        
                        <div class="col-lg-12">
                            <strong>Address</strong>
                            <p class="pt-2 text-gray">{!! $data->address !!}</p>
                        </div>
                        
                    </div>
                </div>
            </div>                        
        </div>
        <div class="card-footer">                    
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
        </div>
    </div>
</div>
@endsection