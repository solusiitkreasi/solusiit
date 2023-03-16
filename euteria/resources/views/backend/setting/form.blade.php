@extends('backend.layouts.app')
@section('title',$data ? 'Ubah Setting':'Tambah Setting')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.setting.store')->multipart() !!}            
            @else
            {!! Form::open()->put()->route('admin.setting.update',[$data->id])->fill($data)->multipart() !!}            
            @endif
            <div class="row">          
                <div class="col-lg-12">
                    {!! Form::hidden('new_setting', '1') !!}
                    {!! Form::text('display_name', 'Display Name')->required() !!}
                </div>                
                <div class="col-lg-12">
                    {!! Form::select('type', 'Tipe')->options(App\Models\Backend\Setting::type())->id('type') !!}
                </div>    
                <div class="col-lg-12">
                    {!! Form::select('form', 'Tipe Form')->options(App\Models\Backend\Setting::form())->id('form') !!}
                </div>              
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Status</label>
                        <div class="d-block">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="1" {{$data ? ($data->status == 1 ? 'checked' : ''):'checked'}}>
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="0" {{$data ? ($data->status ? '' : 'checked'):''}}>
                                <label class="form-check-label" for="inlineRadio2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="col-lg-12">
                    {!! Form::textarea('value', 'Value')->required() !!}
                </div>                
                <div class="col-lg-12">
                    {!! Form::submit('Simpan')->primary() !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.setting.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection