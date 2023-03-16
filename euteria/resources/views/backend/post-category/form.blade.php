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
            {!! Form::open()->post()->route('admin.category.store')->multipart() !!}            
            @else
            {!! Form::open()->put()->route('admin.category.update',[$data->id])->fill($data)->multipart() !!}            
            @endif
            <div class="row">            
                <div class="col-lg-12">
                    {!! Form::file('file', 'Logo')->attrs(['autofocus'=>'']) !!}
                </div>
                <div class="col-lg-12">
                    {!! Form::select('parent_id', 'Sub Category Dari')->options(App\Models\Backend\PostCategory::get()->prepend('',''))->id('parent_id')->sm() !!}
                </div>                
                <div class="col-lg-12">
                    <label>Nama</label>
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
                                <input
                                    type="text"
                                    class="form-control @if($errors->has($locale.'.name')) is-invalid @endif "
                                    id="{{$locale.'[name]'}}"
                                    name="{{$locale.'[name]'}}"
                                    value="{{$data ? $data->translate($locale)->name:old($locale.'.name', '')}}"
                                />
                                @if($errors->has($locale.'.name'))
                                <div class="invalid-feedback">{{$errors->first($locale.'.name')}}</div>
                                @endif
                            </div>
                            
                            {{-- {!! Form::text($locale.'[name]', '',$data ? $data->translate($locale)->name:old($locale.'.name',''))->attrs(['autofocus'=>'']) !!} --}}
                        </div>
                        @endforeach
                    </div>
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
    $(document).ready(function(){
        $('#parent_id').select2({
            allowClear: true,
            placeholder: '-- Pilih Parent Category --',
            theme: 'bootstrap4'
        })

    })
</script>
    
@endpush