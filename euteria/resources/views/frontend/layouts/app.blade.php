<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#000000"/>
    <meta name="msapplication-navbutton-color" content="#000000"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @if ($setting->google_meta_verification != strip_tags($setting->google_meta_verification))
    {!! $setting->google_meta_verification !!}    
    @endif
    {!! SEO::generate() !!}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($setting->logo)}}">
    @include('frontend.partials._css')
</head>
<body>
    @include('frontend.partials.header')

    @section('content.slider')
        @include('frontend.partials.slider')
    @show

    @section('content')
        @include('frontend.partials.feature')
        @include('frontend.partials.about')
        @include('frontend.partials.service')
        @include('frontend.partials.brand')
        @include('frontend.partials.product')
    @show

    @section('content.after')
        @include('frontend.partials.testimony')
        @include('frontend.partials.recent-post')
    @show

    @include('frontend.partials.footer')

    @include('frontend.partials.feedback')
	
    @include('frontend.partials._js')
</body>
</html>