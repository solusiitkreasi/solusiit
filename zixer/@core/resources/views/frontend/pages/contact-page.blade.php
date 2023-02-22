@extends('frontend.frontend-page-master')
@section('site-title')
    {{__('Contact')}}
@endsection
@section('page-title')
    {{__('Contact')}}
@endsection
@section('content')
    <div class="contact-page-conent-aera">
        <div class="container">
            <div class="row reorder-xs">
                <div class="col-lg-8">
                    <div class="contact-form-inner">
                        <h2 class="title">{{get_static_option('contact_page_'.get_user_lang().'_form_section_title')}}</h2>
                        @include('backend.partials.message')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li>{{$message}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('frontend.contact.message')}}" method="post" id="contact_form_submit" class="contact-form">
                            @csrf
                            <input type="hidden" name="captcha_token" id="gcaptcha_token">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="{{__('Enter Your Name')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="{{__('Enter Your Email')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="{{__('Enter Your Subject')}}">
                                    </div>
                                    <div class="form-group textarea">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="{{__('Enter Your Message')}}"></textarea>
                                    </div>
                                    <button class="submit-btn" type="submit">{{__('Send Message')}}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contac-info-wrapper">
                        <h2 class="title">{{get_static_option('contact_page_'.get_user_lang().'_contact_info_title')}}</h2>
                        <ul class="contact-info-list">
                            @foreach($all_contact_info as $data)
                            <li>
                                <div class="single-contact-info">
                                    <div class="icon">
                                        <i class="{{$data->icon}}"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{$data->title}}</h4>
                                        @php $desc = explode(';',$data->description) @endphp
                                        @foreach($desc as $item)
                                        <span class="details">{{$item}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-area">
        <div id="map" data-latitude="{{get_static_option('contact_page_map_section_latitude')}}" data-longitude="{{get_static_option('contact_page_map_section_longitude')}}"></div>
    </div>
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{get_static_option('site_google_map_api')}}&callback=initMap" async defer></script>
    <script src="{{asset('assets/frontend/js/goolge-map-activate.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{get_static_option('site_google_captcha_v3_site_key')}}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("{{get_static_option('site_google_captcha_v3_site_key')}}", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
@endsection