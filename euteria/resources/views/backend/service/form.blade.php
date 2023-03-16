@extends('backend.layouts.app')
@section('title',$data ? 'Edit Mengapa Kami':'Tambah Mengapa Kami')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->route('admin.service.store')->post()->multipart() !!}                
            @else
            {!! Form::open()->route('admin.service.update',[$data->id])->put()->fill($data)->multipart() !!}                                
            @endif
            <div class="row">
                @if ($data)
                <div class="col-12">
                    <div class="form-group">
                        <label>Gambar Lama</label>
                        <p>
                            <img src="{{$data->images}}" class="img-fluid" width="100px">
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
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="desc-id-tab" data-toggle="tab" href="#desc-id" role="tab" aria-controls="desc-id" aria-selected="true">
                            <img src="{{asset('frontend/images/language/lang_id.png')}}" width="20px"> Indonesia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="desc-en-tab" data-toggle="tab" href="#desc-en" role="tab" aria-controls="desc-en" aria-selected="false">
                            <img src="{{asset('frontend/images/language/lang_en.png')}}" width="20px"> English
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @php
                            if($data)
                            {
                                $locale = json_decode($data->locale,true);                                
                            }
                        @endphp
                        <div class="tab-pane fade show active" id="desc-id" role="tabpanel" aria-labelledby="desc-id-tab">
                            {!! Form::text('name[id]', 'Nama',$data ? $locale['name']['id']:'')->required()->autocomplete("off") !!}                            
                        </div>
                        <div class="tab-pane fade" id="desc-en" role="tabpanel" aria-labelledby="desc-en-tab">
                            {!! Form::text('name[en]', 'Nama',$data ? $locale['name']['en']:'')->required()->autocomplete("off") !!}                            
                        </div>
                    </div>
                    {{-- {!! Form::text('name', 'Nama')->required()->autocomplete('off') !!} --}}
                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Simpan') !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.service.index') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@include('backend.plugins.tinymce')
@include('backend.plugins.uploadHBR')
@push('scripts')
<script>
    $(document).ready(function(){
        tinymce.init({
            selector: '#description',
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

        uploadHBR.init({
            "target": "#uploads",
            "textNew": "Add Photo",
            // "textNew": "<i class='fa fa-plus'></i>",
            "max":1
        });
    })
</script>    
@endpush