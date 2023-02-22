@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Order For'.': '. $order_details->title)}}
@endsection
@section('content')
    <section class="order-service-page-content-area padding-100">
        <div class="container">
            <div class="row reorder-xs justify-content-between ">
                <div class="col-lg-6">
                    <div class="order-content-area padding-top-70">
                        <h3 class="order-title">{{get_static_option('order_page_'.get_user_lang().'_form_title')}}</h3>
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
                        <form action="{{route('frontend.order.message')}}" method="post" enctype="multipart/form-data" class="contact-form order-form">
                            @csrf
                            <input type="hidden" name="package" value="{{$order_details->id}}">
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
                                    <div class="form-group textarea">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="{{__('Enter Your Message')}}"></textarea>
                                    </div>
                                    <button class="submit-btn" type="submit">{{__('Order Package')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content-area">
                        <div class="single-price-plan-01">
                            <div class="price-header">
                                <div class="icon">
                                    <i class="{{$order_details->icon}}"></i>
                                </div>
                                <h4 class="name">{{$order_details->title}}</h4>
                                <div class="price"> {{$order_details->price}}</div>
                            </div>
                            <div class="price-body">
                                <ul>
                                    @php
                                        $features = explode(';',$order_details->features);
                                    @endphp
                                    @foreach($features as $feat)
                                        <li>{{$feat}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="price-footer">
                            </div>
                        </div>
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