@extends('frontend.layouts.app')

@section('content')
<section id="contact-us" class="section-gap">
    <div class="container">
        <h4 class="mb-4 text-primary text-uppercase">
            @lang('front.contact-us')
        </h4>

        <div class="maps-wide">
            {!! $setting->gmaps_embed !!}
        </div>

        <h4 class="mt-4 text-primary text-uppercase">PT. Morita Mitra Bersama</h4>

        <div class="contact-us-row row half-gutters align-items-center mt-4 mt-sm-3">
            <div class="col-auto align-self-start">
                <img src="{{ asset('frontend/images/icons/home.svg') }}" alt="Address" class="img-icon is-lg" />
            </div>

            <h5 class="col pl-sm-3 m-0 font-weight-normal">
                {!! $setting->address !!}
            </h5>
        </div>

        <div class="contact-us-row row half-gutters align-items-center mt-4 mt-sm-3">
            <div class="col-auto">
                <img src="{{ asset('frontend/images/icons/phone.svg') }}" alt="Address" class="img-icon is-lg" />
            </div>

            <h5 class="col pl-sm-3 m-0 font-weight-normal">
                Phone/Fax : <a href="tel:{!! $setting->phone_number !!}" class="text-dark">{!! $setting->phone_number !!}</a>
            </h5>
        </div>

        <div class="contact-us-row row half-gutters align-items-center mt-4 mt-sm-3">
            <div class="col-auto">
                <img src="{{ asset('frontend/images/icons/mail.svg') }}" alt="Address" class="img-icon is-lg" />
            </div>

            <h5 class="col pl-sm-3 m-0 font-weight-normal">
                <a href="mailto:{!! $setting->email !!}" class="text-dark">{!! $setting->email !!}</a>
            </h5>
        </div>

        <div class="contact-us-row row half-gutters align-items-center mt-4 mt-sm-3">
            <div class="col-auto">
                <img src="{{ asset('frontend/images/icons/whatsapp.svg') }}" alt="Address" class="img-icon is-lg" />
            </div>

            <h5 class="col pl-sm-3 m-0 font-weight-normal">
                <a href="tel:{!! $setting->whatsapp_number !!}" class="text-dark">{!! $setting->whatsapp_number !!}</a>
            </h5>
        </div>
    </div>
</section>
@stop

@section('content.after', '')
