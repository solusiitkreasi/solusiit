<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{env('APP_NAME','-')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($setting->logo)}}">
    @include('backend.partials._css')
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
    
<div class="wrapper">
    @include('backend.partials.header')
    @include('backend.partials.sidebar')
    <div class="content-wrapper pt-4">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('backend.partials.success')
                        @include('backend.partials.error')
                    </div>
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.footer')
</div>
@include('backend.partials._js')
</body>
</html>
