@extends('frontend.layouts.app')

@section('content')
<div class="about-banner">
    <img src="{{ asset($setting->about_main_image) }}" alt="About Us" />
</div>

<div class="bg-primary-100">
    <div class="container py-5">
        <div class="row half-gutters">
            <div class="col">
                <div class="about-logo">
                    <img src="{{ asset($setting->about_1_image) }}" alt="Company" />
                </div>

                <div class="primary-content pb-4">
                    @if (config('app.locale') == 'id')
                    {!! $setting->about_1_id !!}
                    
                    @else
                    {!! $setting->about_1_en !!}
                        
                    @endif
                </div>
            </div>

            <div class="col-auto px-0 mx-3 border-left about-content-border"></div>

            <div class="col">
                <div class="about-logo">
                    <img src="{{ asset($setting->about_2_image) }}" alt="Brand" />
                </div>

                <div class="primary-content pb-4">
                    @if (config('app.locale') == 'id')
                    {!! $setting->about_2_id !!}
                    
                    @else
                    {!! $setting->about_2_en !!}
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop
