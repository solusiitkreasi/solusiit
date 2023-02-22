@extends('backend.admin-master')
@section('site-title')
    {{__('Build Dream Area')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Build Dream Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.build.dream')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach(get_all_language() as $key => $lang)
                                <li class="nav-item">
                                    <a class="nav-link @if($key == 0) active @endif" data-toggle="tab" href="#tab_{{$key}}" role="tab"  aria-selected="true">{{$lang->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tab-content margin-top-30" id="myTabContent">
                                @foreach(get_all_language() as $key => $lang)
                                <div class="tab-pane fade @if($key == 0) show active @endif" id="tab_{{$key}}" role="tabpanel" >
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_title">{{__('Title')}}</label>
                                        <input type="text" name="home_page_01_{{$lang->slug}}_build_dream_title" class="form-control" value="{{get_static_option('home_page_01_'.$lang->slug.'_build_dream_title')}}" id="home_page_01_build_dream_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_description">{{__('Description')}}</label>
                                        <textarea name="home_page_01_{{$lang->slug}}_build_dream_description" class="form-control" rows="10" id="home_page_01_build_dream_description">{{get_static_option('home_page_01_'.$lang->slug.'_build_dream_description')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="build_dream_section_button_status"><strong>{{__('Button Show/Hide')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="build_dream_{{$lang->slug}}_section_button_status"  @if(!empty(get_static_option('build_dream_'.$lang->slug.'_section_button_status'))) checked @endif id="build_dream_section_button_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_btn_title">{{__('Button Title')}}</label>
                                        <input type="text" name="home_page_01_{{$lang->slug}}_build_dream_btn_title" class="form-control" value="{{get_static_option('home_page_01_'.$lang->slug.'_build_dream_btn_title')}}" id="home_page_01_build_dream_btn_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_btn_url">{{__('Button URL')}}</label>
                                        <input type="text" name="home_page_01_{{$lang->slug}}_build_dream_btn_url" class="form-control" value="{{get_static_option('home_page_01_'.$lang->slug.'_build_dream_btn_url')}}" id="home_page_01_build_dream_btn_url">
                                    </div>
                                    @if(get_static_option('home_page_variant') != '01')
                                        <div class="form-group">
                                            <label for="home_page_01_build_dream_video_url">{{__('Video URL')}}</label>
                                            <input type="text" name="home_page_01_{{$lang->slug}}_build_dream_video_url" class="form-control" value="{{get_static_option('home_page_01_'.$lang->slug.'_build_dream_video_url')}}" id="home_page_01_build_dream_video_url">
                                        </div>
                                    @endif
                                    <div class="img-wrapper">
                                        @if(file_exists('assets/uploads/'.get_static_option('home_page_01_'.$lang->slug.'_build_dream_right_image')))
                                            <img  style="max-width: 200px; margin-top:20px;" src="{{asset('assets/uploads/'.get_static_option('home_page_01_'.$lang->slug.'_build_dream_right_image'))}}" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_right_image">{{__('Right Side Image')}}</label>
                                        <input type="file" class="form-control"  id="home_page_01_build_dream_right_image" name="home_page_01_{{$lang->slug}}_build_dream_right_image">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

