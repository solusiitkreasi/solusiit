@extends('backend.layouts.app')
@section('title','Detail Feedback')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.feedback.index')->sm()->attrs(['class'=>'float-right']) !!}
        </div>
        <div class="card-body">            
            <div class="row">    
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Name</strong>
                            <p class="pt-2 text-gray">{{$data->name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Email</strong>
                            <p class="pt-2 text-gray">{{$data->email}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Company Name</strong>
                            <p class="pt-2 text-gray">{{$data->company}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Rate</strong>
                            <p class="pt-2">{!! App\Models\Utility\Feedback::rate($data->rate) !!}</p>
                        </div>
                        {{-- <div class="col-lg-12">
                            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.feedback.index') !!}
                        </div> --}}
                    </div>
                </div>        
                <div class="col-lg-6">
                    @php
                        $opinion = json_decode($data->opinion,true);
                        
                    @endphp
                    <div class="card card-body">
                        <h6 class="card-title">@lang('front.products')</h6>
                        <div class="card-text">
                            <p style="margin-bottom: 0;">1. @lang('front.products_rating.1')</p>
                            <div class="container">
                                <div class="row py-2">
                                <x-rating-star name="opinion[product][1]" checked="{{$opinion['product']['1']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">2. @lang('front.products_rating.2')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[product][2]" checked="{{$opinion['product']['2']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">3. @lang('front.products_rating.3')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[product][3]" checked="{{$opinion['product']['3']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">4. @lang('front.products_rating.4')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[product][4]" checked="{{$opinion['product']['4']}}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <h6 class="card-title">@lang('front.delivery')</h6>
                        <div class="card-text">
                            <p style="margin-bottom: 0;">1. @lang('front.delivery_rating.1')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[delivery][1]" checked="{{$opinion['delivery']['1']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">2. @lang('front.delivery_rating.2')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[delivery][2]" checked="{{$opinion['delivery']['2']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">3. @lang('front.delivery_rating.3')
                            </p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[delivery][3]" checked="{{$opinion['delivery']['3']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">4. @lang('front.delivery_rating.4')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[delivery][4]" checked="{{$opinion['delivery']['4']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">5. @lang('front.delivery_rating.5')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[delivery][]" checked="{{$opinion['delivery']['5']}}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <h6 class="card-title">@lang('front.service')</h6>
                        <div class="card-text">
                            <p style="margin-bottom: 0;">1. @lang('front.service_rating.1')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][1]" checked="{{$opinion['service']['1']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">2. @lang('front.service_rating.2')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][2]" checked="{{$opinion['service']['2']}}" />
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">3. @lang('front.service_rating.3')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][3]" checked="{{$opinion['service']['3']}}"/>
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">4. @lang('front.service_rating.4')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][4]" checked="{{$opinion['service']['4']}}"/>
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">5. @lang('front.service_rating.5')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][5]" checked="{{$opinion['service']['5']}}"/>
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">6. @lang('front.service_rating.6')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][6]" checked="{{$opinion['service']['6']}}"/>
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">7. @lang('front.service_rating.7')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][7]" checked="{{$opinion['service']['7']}}"/>
                                </div>
                            </div>
                            <p style="margin-bottom: 0;">8. @lang('front.service_rating.8')</p>
                            <div class="container">
                                <div class="row py-2">
                                    <x-rating-star name="opinion[service][8]" checked="{{$opinion['service']['8']}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection