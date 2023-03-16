@extends('backend.layouts.app')
@section('title',$data ? 'Edit Category':'Tambah Category')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.category.store') !!}            
            @else
            {!! Form::open()->put()->route('admin.category.update',[$data->id])->fill($data) !!}            
            @endif
            <div class="row">            
                <div class="col-lg-12">
                    {!! Form::text('name', 'Nama')->attrs(['autofocus'=>'']) !!}
                </div>                
                <div class="col-lg-12">
                    {!! Form::submit('Simpan')->primary() !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.category.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@include('backend.plugins.select2')
@push('scripts')
<script>
$(document).ready(function(e){
    $('#parent_id').select2({
        allowClear: true,
        placeholder: '-- Pilih Parent --',
        theme: 'bootstrap4'
    })

    $('#type').select2({
        allowClear: true,
        placeholder: '-- Pilih Tipe Category --',
        theme: 'bootstrap4'
    })
});
</script>    
@endpush