@extends('frontend.frontend-page-master')
@section('page-title')
    {{get_static_option('quote_page_'.get_user_lang().'_page_title')}}
@endsection
@section('content')
    <section class="order-service-page-content-area padding-100">
        <div class="container">
            <div class="row">
                @foreach($all_contact_info as $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info-02">
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
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="quote-content-area padding-top-70">
                        <h3 class="quote-title">{{get_static_option('quote_page_'.get_user_lang().'_form_title')}}</h3>
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
                        <form action="{{route('frontend.quote.message')}}" method="post" enctype="multipart/form-data" class="contact-form quote-form">
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
                                    <div class="btn-wrapper text-center">
                                        <button class="submit-btn" type="submit">{{__('Send Quote')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{get_static_option('site_google_captcha_v3_site_key')}}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("{{get_static_option('site_google_captcha_v3_site_key')}}", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
@endsection