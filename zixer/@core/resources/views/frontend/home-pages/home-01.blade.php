@include('frontend.partials.navbar')
<header class="header-area-wrapper header-carousel-two">
    @foreach($all_header_slider as $data)
    <div class="header-area header-bg"
        @if(file_exists('assets/uploads/header-sliders/header-slider-image-'.$data->id.'.'.$data->image))
        style="background-image: url({{ asset('assets/uploads/header-sliders/header-slider-image-'.$data->id.'.'.$data->image)}})"
        @endif

    >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="header-inner">
                        <h1 class="title">
                            @php
                                $title = str_replace('{color}','<span class="base-color">',$data->title);
                                $title = str_replace('{/color}','</span>',$title);
                            @endphp
                            {!! $title !!}
                        </h1>
                        <p>{{$data->description}}</p>
                        <div class="btn-wrapper">
                            @if(!empty($data->btn_01_status))
                            <a href="{{$data->btn_01_url}}" class="boxed-btn btn-rounded">{{$data->btn_01_text}}</a>
                            @endif
                            @if(!empty($data->btn_02_status))
                            <a href="{{$data->btn_02_url}}" class="boxed-btn btn-rounded blank">{{$data->btn_02_text}}</a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</header>
@if(!empty(get_static_option('home_page_key_feature_section_status')))
<div class="header-bottom-area ">
    <div class="container">
        <div class="row">
            @foreach($all_key_features as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-header-bottom-item">
                    <div class="icon">
                        <i class="{{$data->icon}}"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">{{$data->title}}</h4>
                        <p>{{$data->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('home_page_build_dream_section_status')))
<section class="build-your-dream-area gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content-area">
                    <h3 class="title">{{get_static_option('home_page_01_'.get_user_lang().'_build_dream_title')}}</h3>
                    <p>{{get_static_option('home_page_01_'.get_user_lang().'_build_dream_description')}}</p>
                    @if(!empty(get_static_option('build_dream_'.get_user_lang().'_section_button_status')))
                    <div class="btn-wrapper">
                        <a href="{{get_static_option('home_page_01_'.get_user_lang().'_build_dream_btn_url')}}" class="btn-boxed">{{get_static_option('home_page_01_'.get_user_lang().'_build_dream_btn_title')}}</a>
                    </div>
                   @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content-area">
                    @if(file_exists('assets/uploads/'.get_static_option('home_page_01_'.get_user_lang().'_build_dream_right_image')))
                        <img src="{{asset('assets/uploads/'.get_static_option('home_page_01_'.get_user_lang().'_build_dream_right_image'))}}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_service_section_status')))
<section class="service-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2 class="title">{{get_static_option('home_page_01_'.get_user_lang().'_service_area_title')}}</h2>
                    <div class="separator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_service as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-service-item">
                    <div class="icon">
                        <i class="{{$data->icon}}"></i>
                    </div>
                    <div class="content">
                        <a href="{{route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])}}"><h4 class="title">{{$data->title}}</h4></a>
                        <div class="post-description">
                            <p> {{$data->excerpt}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_counterup_section_status')))
<section class="counterup-area counterup-bg"
@if(file_exists('assets/uploads/'.get_static_option('home_01_counterup_bg_image')))
    style="background-image: url({{asset('assets/uploads/'.get_static_option('home_01_counterup_bg_image'))}})"
@endif
>
    <div class="container">
        <div class="row">
            @foreach($all_counterup as $data)
            <div class="col-lg-3 col-md-6">
                <div class="single-counterup-item">
                    <div class="icon">
                        <i class="{{$data->icon}}"></i>
                    </div>
                    <div class="content">
                        <div class="count-num">{{$data->number}}</div>
                        <h5 class="name">{{$data->title}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_recent_work_section_status')))
<section class="recent-works-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2 class="title">{{get_static_option('home_page_01_'.get_user_lang().'_recent_work_title')}}</h2>
                    <div class="separator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recent-work-nav-area">
                    <ul>
                        <li class="active" data-filter="*">{{__('All work')}}</li>
                        @foreach($all_work_category as $data)
                        <li data-filter=".{{Str::slug($data->name)}}">{{$data->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recent-work-masonry" >
                    @foreach($all_work as $data)
                    <div class="single-recent-wrok-item col-lg-4  col-md-6 {{get_work_category_by_id($data->id,'slug')}}">
                        <div class="thumb">
                            @php $img_url = '';@endphp
                            @if(file_exists('assets/uploads/works/work-grid-'.$data->id.'.'.$data->image))
                                <img src="{{asset('assets/uploads/works/work-grid-'.$data->id.'.'.$data->image)}}" alt="{{$data->title}}">
                                @php $img_url = asset('assets/uploads/works/work-large-'.$data->id.'.'.$data->image);@endphp
                            @endif
                            <div class="hover">
                                <ul>
                                    <li><a href="{{$img_url}}" class="image-popup"> <i class="flaticon-image"></i> </a></li>
                                    <li><a href="{{route('frontend.work.single',['id' => $data->id,'any' => Str::slug($data->title)])}}"> <i class="flaticon-link-symbol"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_testimonial_section_status')))
<section class="testimonial-area gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2 class="title">{{get_static_option('home_page_01_'.get_user_lang().'_testimonial_title')}}</h2>
                    <div class="separator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <div class="testimonial-carousel">
                    @foreach($all_testimonial as $data)
                    <div class="single-tesitmoial-item">
                        <div class="thumb">
                            @if(file_exists('assets/uploads/testimonial/testimonial-grid-'.$data->id.'.'.$data->image))
                                <img src="{{asset('assets/uploads/testimonial/testimonial-grid-'.$data->id.'.'.$data->image)}}" alt="{{__($data->name)}}">
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5">
                <div class="right-content-area">
                    @foreach($all_testimonial as $key => $data)
                    <div class="single-testimonial-quote @if($key == 0) active @endif" data-owl-item="{{$key}}">
                        <p>{{$data->description}}</p>
                        <h4 class="title">{{$data->name}}</h4>
                        <span class="post">{{$data->designation}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_latest_news_section_status')))
<section class="latest-news-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2 class="title">{{get_static_option('home_page_01_'.get_user_lang().'_latest_news_title')}}</h2>
                    <div class="separator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_blog as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news-grid-item">
                    <div class="thumb">
                        @if(file_exists('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image))
                            <img src="{{asset('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)}}" alt="{{$data->title}}">
                        @endif
                    </div>
                    <div class="content">
                        <ul class="post-meta">
                            <li>{{__('By')}} <a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}">{{$data->user->username}}</a></li>
                            <li><a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}">{{$data->created_at->diffForHumans()}}</a></li>
                        </ul>
                        <a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}"><h4 class="title">{{$data->title}}</h4></a>
                        <div class="post-description">
                            <p>{{$data->excerpt}}</p>
                        </div>
                        <a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}" class="readmore">{{__('Read more')}} <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_brand_logo_section_status')))
<div class="brand-carousel-area gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-carousel">
                    @foreach($all_brand_logo as $data)
                    <div class="single-brand-item">
                        @if(file_exists('assets/uploads/brands/brand-image-'.$data->id.'.'.$data->image))
                            <img src="{{asset('assets/uploads/brands/brand-image-'.$data->id.'.'.$data->image)}}" alt="{{$data->title}}">
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@include('frontend.partials.newsletter')