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
                    <label>{{ucwords(__('backend.name'))}}</label>
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

                <div class="col-lg-6">
                    {!! Form::text('email', ucwords(__('backend.email')))->required()->autocomplete('off') !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::text('phone_number', ucwords(__('backend.phone_number')))->required()->autocomplete('off') !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::select('ms_provinsi_id', 'Provinsi')->required()->id('provinsi') !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::select('ms_kota_id', 'Kota')->required()->id('kota')->attrs(['disabled']) !!}
                </div>
                <div class="col-lg-12">
                    {!! Form::text('coordinate', ucwords(__('backend.coordinate')))->required()->autocomplete('off') !!}
                </div>

                <div class="col-lg-12">
                    <label>{{ucwords(__('backend.address'))}}</label>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach (config('translatable.locales') as $key=>$locale)
                            <a class="nav-link {{$key==0 ?'active':''}}" data-toggle="tab" href="#nav-address-{{$locale}}">
                                <i class="flag-icon flag-icon-{{config('translatable.locale_flag.'.$locale)}}"></i>
                            </a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @foreach (config('translatable.locales') as $key=>$locale)
                        <div class="tab-pane fade {{$key==0 ?'show active':''}}" id="nav-address-{{$locale}}" role="tabpanel" aria-labelledby="nav-address-{{$locale}}-tab">
                            <div class="form-group pt-2">
                                <textarea
                                    rows="7"
                                    class="form-control @if($errors->has($locale.'.address')) is-invalid @endif"
                                    id="{{$locale.'[address]'}}"
                                    name="{{$locale.'[address]'}}">{{$data ? $data->translate($locale)->address:old($locale.'.address', '')}}</textarea>
                                @if($errors->has($locale.'.address'))
                                <div class="invalid-feedback">{{$errors->first($locale.'.address')}}</div>
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
@include('backend.plugins.tinymce')
@include('backend.plugins.uploadHBR')
@include('backend.plugins.select2')
@push('scripts')
<script>
$(document).ready(function(){
    let ms_provinsi_id,ms_kota_id;

        @if($data)
            ms_provinsi_id = "{{$data->ms_provinsi_id}}"
            ms_kota_id = "{{$data->ms_kota_id}}"

            load_kota(ms_provinsi_id)
        @endif

    


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

    load_provinsi();

    $('#provinsi').select2({
        placeholder: '-- Pilih Provinsi --',
        theme: 'bootstrap4'
    });
    $('#kota').select2({
        placeholder: '-- Pilih Kota --',
        theme: 'bootstrap4'
    });

    $(document).on('change','#provinsi',function(){
        load_kota($(this).val())
    });

    uploadHBR.init({
        "target": "#uploads",
        "textNew": "Add Photo",
        // "textNew": "<i class='fa fa-plus'></i>",
        "max":1
    });

        function load_provinsi()
        {
            $('#provinsi').empty();
            $.ajax({
                url: "{{url('provinsi')}}",
                method: 'GET',
                beforeSend: function(data){
                    $('#provinsi').prop('disabled',true);
                },
                complete: function(data){
                    $('#provinsi').prop('disabled',false);
                },
                success: function(data){
                    $('#provinsi').append(`<option></option>`)
                    $.each(data.data,function(index,value){
                        let selected;
                        if(ms_provinsi_id != undefined)
                        {
                             selected = value.ms_provinsi_id == ms_provinsi_id ? 'selected':'';
                        }
                        let content = `<option value="${value.ms_provinsi_id}" ${selected}>${value.nama_provinsi}</option>`;
                        $('#provinsi').append(content)
                    })
                },
                error: function(data){
                    alert('Load Provinsi error, Silahkan hubungi customer service');
                }
            })
        }

        function load_kota(ms_provinsi_id){
            $('#kota').empty();
            $.ajax({
                url: `{{url('provinsi?ms_provinsi_id=${ms_provinsi_id}')}}`,
                method: 'GET',
                beforeSend: function(data){
                    $('#kota').prop('disabled',true);
                },
                complete: function(data){
                    $('#kota').prop('disabled',false);

                },
                success: function(data){
                    $('#kota').append(`<option></option>`)
                    $.each(data.data.kota,function(index,value){
                        let selected;
                        if(ms_kota_id != undefined)
                        {
                             selected = value.ms_kota_id == ms_kota_id ? 'selected':'';
                        }
                        let content = `<option value="${value.ms_kota_id}" ${selected}>${value.nama_kota}</option>`;
                        $('#kota').append(content)
                    })

                },
                error: function(data){
                    alert('Load Kota error, Silahkan hubungi customer service');
                }
            })
        }
})
</script>    
@endpush