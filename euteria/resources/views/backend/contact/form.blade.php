@extends('backend.layouts.app')
@section('title',$data ? 'Edit Testimony':'Tambah Testimony')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.testimony.store')->multipart() !!}            
            @else
            {!! Form::open()->put()->route('admin.testimony.update',[$data->id])->fill($data)->multipart() !!}            
            @endif
            <div class="row">            
                <div class="col-lg-12">
                    @if ($data && $data->image)
                        <div class="form-group">
                            <label>Gambar Lama</label>
                            <img src="{{asset($data->image)}}" alt="" width="100px" class="img d-block">
                            <em class="text-info">
                                *Pilih file baru jika ingin update gambar
                            </em>
                        </div>
                    @endif

                    {!! Form::file('file', 'Image')->attrs(['autofocus'=>'']) !!}
                </div>  
                <div class="col-lg-12">
                    {!! Form::text('name', 'Nama') !!}
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
                    <label>Description</label>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach (config('translatable.locales') as $key=>$locale)
                            <a class="nav-link {{$key==0 ?'active':''}}" data-toggle="tab" href="#nav-{{$locale}}">
                                <i class="flag-icon flag-icon-{{config('translatable.locale_flag.'.$locale)}}"></i>
                            </a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @foreach (config('translatable.locales') as $key=>$locale)
                        <div class="tab-pane fade {{$key==0 ?'show active':''}}" id="nav-{{$locale}}" role="tabpanel" aria-labelledby="nav-{{$locale}}-tab">
                            <div class="form-group pt-2">
                                <textarea
                                    rows="7"
                                    class="form-control @if($errors->has($locale.'.description')) is-invalid @endif "
                                    id="{{$locale.'[description]'}}"
                                    name="{{$locale.'[description]'}}">{{$data ? $data->translate($locale)->description:old($locale.'.description', '')}}</textarea>
                                @if($errors->has($locale.'.description'))
                                <div class="invalid-feedback">{{$errors->first($locale.'.description')}}</div>
                                @endif
                            </div>
                            
                            {{-- {!! Form::text($locale.'[name]', '',$data ? $data->translate($locale)->name:old($locale.'.name',''))->attrs(['autofocus'=>'']) !!} --}}
                        </div>
                        @endforeach
                    </div>
                </div>                
                <div class="col-lg-12">
                    {!! Form::submit('Simpan')->primary() !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.testimony.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection