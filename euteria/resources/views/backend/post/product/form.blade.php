@extends('backend.layouts.app')
@section('title',$data ? 'Edit '.$menu->name:'Tambah '.$menu->name)
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-capitalize">@yield('title')</h3>            
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
                        <div id="old-images"></div>
                    </div>
                </div>                    
                @endif
                <div class="col-12">
                    <div class="form-group" id="gambar">
                        <label>Gambar</label>
                        <small class="form-text" class=""><em>File gambar maksimal < 1 MB dengan ukuran 640 pixel x 480 pixel Untuk tampilan yang bagus</em></small> <br>
                        <div id="uploads"></div>
                    </div>
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
                    {!! Form::text('sku', 'SKU')->required()->autocomplete("off") !!}                            
                </div>
                {{-- <div class="col-lg-6">
                    <label>Price</label>
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
                                    class="form-control @if($errors->has($locale.'.price')) is-invalid @endif "
                                    id="{{$locale.'[price]'}}"
                                    name="{{$locale.'[price]'}}"
                                    value="{{$data ? $data->translate($locale)->price:old($locale.'.price', '')}}"
                                />
                                @if($errors->has($locale.'.price'))
                                <div class="invalid-feedback">{{$errors->first($locale.'.price')}}</div>
                                @endif
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div> --}}
                <div class="col-lg-6">
                    {!! Form::file('file_brochure', 'Brochure') !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::file('file_certificate', 'Certificate') !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::select('post_category_id', 'Category')->required()->id('category')->attrs(['disabled']) !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::select('post_subcategory_id', 'Sub Category')->id('subcategory')->attrs(['disabled']) !!}
                </div>
                <div class="col-lg-12">
                    {!! Form::select('post_brand_id', 'Brand')->options(App\Models\Backend\PostBrand::get())->id('brand_id') !!}
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>
                            Marketplace Link 
                            <a href="#" id="new-marketplace-form" class="btn btn-sm btn-primary ml-2">
                                <i class="fa fa-plus"></i>
                            </a>
                        </label>
                        <div id="marketplace-form-wrapper">
                            @if (isset($data->marketplace_link))
                                @if (count(json_decode($data->marketplace_link)))
                                    @foreach (json_decode($data->marketplace_link) as $row)
                                        
                                    <div class="row mb-3 marketplace-line">
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="marketplace[{{$loop->iteration}}][name]" placeholder="Marketplace Name" value="{{$row->name}}">
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="marketplace[{{$loop->iteration}}][link]" placeholder="Marketplace Link" value="{{$row->link}}">
                                        </div>
                                        <div class="col-lg-1">
            
                                        </div>
                                    </div>
                                    @endforeach 
                                @else
                                <div class="row mb-3 marketplace-line">
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="marketplace[0][name]" placeholder="Marketplace Name">
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="marketplace[0][link]" placeholder="Marketplace Link">
                                    </div>
                                    <div class="col-lg-1">
        
                                    </div>
                                </div>
                                @endif
                                
                            @else
                            <div class="row mb-3 marketplace-line">
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" name="marketplace[0][name]" placeholder="Marketplace Name">
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="marketplace[0][link]" placeholder="Marketplace Link">
                                </div>
                                <div class="col-lg-1">
    
                                </div>
                            </div>
                                
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label>Description</label>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach (config('translatable.locales') as $key=>$locale)
                            <a class="nav-link {{$key==0 ?'active':''}}" data-toggle="tab" href="#nav-description-{{$locale}}">
                                <i class="flag-icon flag-icon-{{config('translatable.locale_flag.'.$locale)}}"></i>
                            </a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @foreach (config('translatable.locales') as $key=>$locale)
                        <div class="tab-pane fade {{$key==0 ?'show active':''}}" id="nav-description-{{$locale}}" role="tabpanel" aria-labelledby="nav-description-{{$locale}}-tab">
                            <div class="form-group pt-2">
                                <textarea
                                    rows="7"
                                    class="form-control @if($errors->has($locale.'.description')) is-invalid @endif tiny"
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
                    {!! Form::submit('Simpan') !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@include('backend.plugins.select2')
@include('backend.plugins.sweet-alert')
@include('backend.plugins.tinymce')
@include('backend.plugins.uploadHBR')
@push('scripts')
<script>
    $(document).ready(function(){
        let post_category_id,post_subcategory_id;
        load_category();
        
        @if($data)  
            post_category_id = "{{$data->post_category_id}}"
            post_subcategory_id = "{{$data->post_subcategory_id}}"
            load_subcategory(post_category_id)

            function load_old_images()
            {
                let url = "{{ route('admin.post-image.post',':id') }}";
                url = url.replace(':id',"{{ $data->id }}");                    
                let target = $('#old-images');
                $.ajax({
                    url: url,
                    method: 'GET',
                    beforeSend: function(data){                
                        target.empty();      
                    },
                    complete: function(data){                        
                    },
                    success: function(data){                        
                                                
                        $.each(data.data,function(index,val){
                            let image_url = '{{asset(":image_url")}}';
                            image_url = image_url.replace(':image_url',val.file_name);
                            let image = `<div class="box-drag column">                            
                                <div class="col-md-12 no-padding uploadArea">
                                    <span class="image-preview">
                                        <div class="remove old-image" data-post-image-id="${val.id}">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <img src="${image_url}" class="img-fluid">
                                    </span>
                                </div>
                            </div>`;
                            target.prepend(image);
                        });                            
                    },
                    error: function(data){
    
                    }            
                });
            }
            load_old_images();

            $(document).on('click','.remove.old-image',function(e){
                let url = "{{ route('admin.post-image.destroy',':id') }}";                
                url = url.replace(':id',$(this).data('post-image-id'));
                let target = $(this);
                let hilang = target.parent().parent().parent();                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    beforeSend: function(data){
                        // $('.uploads').empty();
                    },
                    complete: function(data){
    
                    },
                    success: function(data){
                        hilang.remove();
                        Swal.fire(
                            '200',
                            'Data berhasil dihapus',
                            'success'
                        )                        
                    },
                    error: function(data){
                        Swal.fire(
                            '500',
                            'Maaf Terjadi Kesalahan Sistem, Coba Beberapa saat lagi',
                            'error'
                        ).then(result=> load_old_images())
                    }
                })
            });        
        @endif 
        console.log(post_category_id,post_subcategory_id)
  
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

        let marketplace_line = (key)=>`<div class="row mb-3 marketplace-line">
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="marketplace[${key}][name]" placeholder="Marketplace Name">
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="marketplace[${key}][link]" placeholder="Marketplace Link">
                                    </div>
                                    <div class="col-lg-1">
                                        <a href="#" class="btn btn-sm btn-danger delete-marketplace-line">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>`;

        $(document).on('click','#new-marketplace-form',function (e){
            e.preventDefault();
            let key = $('.marketplace-line').length;
            
            $('#marketplace-form-wrapper').append(marketplace_line(key));
            console.log(key)
        })

        $(document).on('click','.delete-marketplace-line',function (e){
            e.preventDefault();
            let line = $(this).parent().parent();
            line.remove();
        })
        

        $('#category').select2({
            allowClear: true,
            placeholder: '-- Pilih Kategori --',
            theme: 'bootstrap4'
        });
        $('#subcategory').select2({
            allowClear: true,
            placeholder: '-- Pilih SubKategori --',
            theme: 'bootstrap4'
        });

        $('#brand_id').select2({
            allowClear: true,
            placeholder: '-- Pilih Brand --',
            theme: 'bootstrap4'
        });

        $(document).on('change','#category',function(){
            load_subcategory($(this).val())
        });

        function load_category()
        {
            $('#category').empty();
            $.ajax({
                url: "{{url('admin/post-category')}}",
                method: 'GET',
                beforeSend: function(data){
                    $('#category').prop('disabled',true);
                },
                complete: function(data){
                    $('#category').prop('disabled',false);
                },
                success: function(data){
                    $('#category').append(`<option></option>`)
                    $.each(data.data,function(index,value){
                        let selected;
                        if(post_category_id != undefined)
                        {
                             selected = value.id == post_category_id ? 'selected':'';
                        }
                        let content = `<option value="${value.id}" ${selected}>${value.name}</option>`;
                        $('#category').append(content)
                    })

                },
                error: function(data){
                    alert('Load Category error, Silahkan hubungi customer service');
                }
            })
        }

        function load_subcategory(post_category_id){
            $('#subcategory').empty();
            $.ajax({
                url: `{{url('admin/post-category?id=${post_category_id}')}}`,
                method: 'GET',
                beforeSend: function(data){
                    $('#subcategory').prop('disabled',true);
                },
                complete: function(data){
                    $('#subcategory').prop('disabled',false);
                },
                success: function(data){
                    $('#subcategory').append(`<option></option>`)
                    $.each(data.data,function(index,value){
                        let selected;
                        if(post_subcategory_id != undefined)
                        {
                             selected = value.id == post_subcategory_id ? 'selected':'';
                        }
                        let content = `<option value="${value.id}" ${selected}>${value.name}</option>`;
                        $('#subcategory').append(content)
                    })

                },
                error: function(data){
                    alert('Load Subcategory error, Silahkan hubungi customer service');
                }
            })
        }

        uploadHBR.init({
            "target": '#uploads',
            "textNew": "Add Photo",
            "max": 6
        });

        
              
        
    });
</script>    
@endpush