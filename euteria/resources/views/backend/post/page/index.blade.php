@extends('backend.layouts.app')
@section('title',ucwords($menu->name))
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->route('admin.post.store',[$menu->slug])->post()->multipart() !!}                
            @else
            {!! Form::open()->route('admin.post.update',[$menu->slug,$data->id])->put()->fill($data)->multipart() !!}                                
            @endif
            <div class="row">                
                <div class="col-lg-12"> 
                    <label>Deskripsi</label>                   
                    
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
                        {!! Form::hidden($locale.'[name]', $menu->translate($locale)->name) !!}
                        <div class="tab-pane fade {{$key==0 ?'show active':''}}" id="nav-{{$locale}}" role="tabpanel" aria-labelledby="nav-{{$locale}}-tab">
                            {{-- {!! Form::text($locale.'[name]', '',$data->translate($locale)->name)->attrs(['autofocus'=>'']) !!} --}}
                            {!! Form::textarea($locale.'[description]', '',$data ? $data->translate($locale)->description:'')->attrs(['class'=>'tiny-editor'])->required() !!}
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Simpan') !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@include('backend.plugins.tinymce')
@push('scripts')
<script>
$(document).ready(function(){
    tinymce.init({
        selector: '.tiny-editor',
        // height: 600,
        height: 400,
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        image_advtab: true,
        image_caption: true,
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        setup: function (editor) {
            editor.on('change', function (e) {
                editor.save();
            });
        }
    });
});
</script>    
@endpush