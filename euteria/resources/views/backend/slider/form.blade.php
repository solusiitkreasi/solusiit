@extends('backend.layouts.app')
@section('title',$data ? 'Edit Slideshow':'Tambah Slideshow')
@section('content')
{{-- {{dd(session()->all())}} --}}
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.slider.store')->multipart() !!}            
            @else
            {!! Form::open()->put()->route('admin.slider.update',[$data->id])->fill($data)->multipart() !!}            
            @endif
            <div class="row">
                @if($data)
                <div class="col-12">
                    <div class="form-group">
                        <label>Gambar Lama</label>
                        <p>
                            <img src="{{asset($data->images)}}" class="img-fluid" width="100px">
                        </p>
                    </div>
                </div>            
                @endif
                <div class="col-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        @if ($data)
                        <small class="form-text" class=""><em>Jika Ingin mengganti foto lama silahkan input photo baru, jika tidak biarkan isian gambar baru</em></small> <br>                            
                        @endif
                        <div id="uploads"></div>
                        @if($errors->has('image.*'))
                        <div class="invalid-feedback">{{$errors->first('image.*')}}</div>
                        @endif
                    </div>
                </div>        
                {{-- <div class="col-lg-4">
                    {!! Form::text('title', 'Title')->attrs(['autofocus'=>''])->required() !!}
                </div>                
                <div class="col-lg-4">
                    {!! Form::text('sub_title', 'Sub Title')->attrs(['autofocus'=>''])->required() !!}
                </div>                
                <div class="col-lg-4">
                    {!! Form::text('link', 'Tautan <span class="text-muted"><em>(Opsional)</em></span>')->attrs(['autofocus'=>'']) !!}
                </div>                 --}}
                <div class="col-lg-12">
                    {!! Form::submit('Simpan')->primary() !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.slider.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@include('backend.plugins.uploadHBR')
@push('scripts')
<script>
$(document).ready(function(e){
    uploadHBR.init({
        "target": "#uploads",
        "textNew": "Add Photo",
        // "textNew": "<i class='fa fa-plus'></i>",
        "max":1
    });
});
</script>    
@endpush