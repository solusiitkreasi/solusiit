@extends('backend.layouts.app')
@section('title',$data ? 'Edit '.$menu->name:'Tambah '.$menu->name)
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
                @if ($data)
                <div class="col-12">
                    <div class="form-group">
                        <label>Gambar Lama</label>
                        <p>
                            <img src="{{asset($data->first_images)}}" class="img-fluid" width="100px"">
                        </p>
                    </div>
                </div>                    
                @endif
                <div class="col-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        @if ($data)
                        <small class="form-text" class=""><em>Jika Ingin mengganti foto lama silahkan input photo baru, jika tidak biarkan isian gambar baru</em></small> <br>                            
                        @else
                        <small class="form-text" class=""><em>Gunakan gambar yang memiliki ukuran kurang lebih 100kb untuk loading cepat</em></small> <br>                            
                        @endif
                        <div id="uploads"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    {!! Form::text('name', 'Judul')->required()->autocomplete("off") !!}                            
                </div>
                <div class="col-lg-12">
                    {!! Form::textarea('description')->id('desc_id')->attrs(['class'=>'tiny'])->required() !!}                            
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
@include('backend.plugins.uploadHBR')
@push('scripts')
<script>
    $(document).ready(function(){

        function init_tiny(selector)
        {
            return tinymce.init({
                selector: selector,
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
        }
        init_tiny('.tiny');
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            e.target // newly activated tab
            e.relatedTarget // previous active tab
            init_tiny('.tiny');
        })

        uploadHBR.init({
            "target": "#uploads",
            "textNew": "Add Photo",
            // "textNew": "<i class='fa fa-plus'></i>",
            "max":6
        });
    })
</script>    
@endpush