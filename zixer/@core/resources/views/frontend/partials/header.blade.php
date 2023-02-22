<!DOCTYPE html>
<html lang="{{get_default_language()}}">
<head>
    @if(!empty(get_static_option('site_google_analytics')))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{get_static_option('site_google_analytics')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "{{get_static_option('site_google_analytics')}}");
    </script>
    @endif
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{get_static_option('site_meta_description')}}">
    <meta name="tags" content="{{get_static_option('site_meta_tags')}}">
    <link rel="icon" href="{{asset('assets/uploads/'.get_static_option('site_favicon'))}}" type="image/png">
    <!-- load fonts dynamically -->
    {!! load_google_fonts() !!}
    <!-- all stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/dynamic-style.css')}}">
    <style>
        :root {
            --main-color-one: {{get_static_option('site_color')}};
            --secondary-color: {{get_static_option('site_main_color_two')}};
            @php $heading_font_family = !empty(get_static_option('heading_font')) ? get_static_option('heading_font_family') :  get_static_option('body_font_family') @endphp
            --heading-font: "{{$heading_font_family}}",sans-serif;
            --body-font:"{{get_static_option('body_font_family')}}",sans-serif;
        }
    </style>
    @yield('style')
    @if(request()->is('blog/*') || request()->is('work/*') || request()->is('service/*'))
    @yield('og-meta')
    <title>@yield('site-title')</title>
    @elseif(request()->is('about') || request()->is('service') || request()->is('work') || request()->is('team') || request()->is('faq') || request()->is('blog') || request()->is('contact') || request()->is('p/*'))
    <title>@yield('site-title') - {{get_static_option('site_title')}} </title>
    @else
    <title>{{get_static_option('site_title')}} - {{get_static_option('site_tag_line')}}</title>
    @endif
</head>
<body>
@if(!empty(get_static_option('home_page_support_bar_section_status')))
@include('frontend.partials.support')
@endif

