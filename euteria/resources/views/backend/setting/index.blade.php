@extends('backend.layouts.app')
@section('title','Setting')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Setting
            </h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column" role="tablist">
                <li class="nav-item"><a href="#general" class="nav-link setting-tab active" data-toggle="tab" data-title="General Setting" role="tab">General Setting</a></li>
                <li class="nav-item"><a href="#homepage" class="nav-link setting-tab" data-toggle="tab" data-title="Home Page - History, Vision & Mision" role="tab">Home page - History, Vision & Mision</a></li>                
                <li class="nav-item"><a href="#homepage-about" class="nav-link setting-tab" data-toggle="tab" data-title="Home Page - About" role="tab">Home page - About</a></li>                
                <li class="nav-item"><a href="#homepage-service" class="nav-link setting-tab" data-toggle="tab" data-title="Home Page - Service" role="tab">Home page - Service</a></li>                
                <li class="nav-item"><a href="#aboutpage" class="nav-link setting-tab" data-toggle="tab" data-title="About Page" role="tab">About page</a></li>                
                <li class="nav-item"><a href="#socmed" class="nav-link setting-tab" data-toggle="tab" data-title="Sosial Media" role="tab">Sosial Media</a></li>                
                <li class="nav-item"><a href="#seo" class="nav-link setting-tab" data-toggle="tab" data-title="SEO" role="tab">SEO</a></li>                
            </ul>
        </div>
    </div>
</div>    
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title dynamic-title">General Setting</h3>
        </div>
        <div class="card-body">
            <div class="tab-content">
                @include('backend.setting._general')
                @include('backend.setting._homepage')
                @include('backend.setting._homepage-about')
                @include('backend.setting._homepage-service')
                @include('backend.setting._aboutpage')
                @include('backend.setting._socmed')                
                @include('backend.setting._seo')
            </div>
        </div>
    </div>
</div>
@endsection
@include('backend.plugins.tinymce')
@include('backend.plugins.toast')
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

    $('.setting-tab').on('shown.bs.tab', function (e) {
        let data = e.target;
        let title = data.text;
        $('h3.dynamic-title').text(title);
    })

    $(document).on('submit','#setting',function(e){
        e.preventDefault();
        let url= $(this).attr('action');
        let form = $(this);
        let this_card = $(this).parent().parent().parent().parent();
        let loader = `<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i></div>`;

        let formData = new FormData(this);

        let mime_type = ['image/gif','image/jpeg','image/png'];

        $.ajax({
            url: url,
            method: 'POST',
            // data: $(this).serialize(),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(data){
                this_card.append(loader);
            },
            complete: function(data){
                $('.overlay').remove();
            },
            success: function(data){                
                toastr.success('Success', 'Setting tersimpan');
                get_setting()
            },
            error: function(data){
                toastr.error('Error', 'Maaf System Error, Data tidak tersimpan');                
                get_setting()
                
            }
        })

    });

    function get_setting()
    {
        $('.form-group > img').remove()
        $.ajax({
            url: `{{route('admin.setting.get_setting')}}`,
            method: 'GET',
            success: function(data){
                $.each(data.data,function(index,val){
                    if(val.form == 'file')
                    {
                        let image = `<img src="{{asset('${val.value}')}}" width="50px">`;
                        $(`input[name="file_${val.name}"]`).after(image)
                    }
                })
            }
        })
    }
    get_setting();
})
</script>    
@endpush