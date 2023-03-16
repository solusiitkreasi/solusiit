@extends('frontend.layouts.app')
@section('title','Kontak Kami')
@section('content')
<div class="grid-box">
    <div class="title-section">
        <h1><span class="home">@yield('title')</span></h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            @if ($setting->gmaps_embed)
                <div class="shadow d-block">
                    {!! $setting->gmaps_embed !!}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            @foreach (App\Models\Backend\Setting::activeGeneral() as $row)
                @if (in_array($row->name,['address','phone_number','email']))
                <div class="single-contact-box">
                    <div class="text-danger">
                        <h5>{{$row->display_name}}</h5>
                        <p>{{$row->value}}</p>
                    </div>
                </div>
                @endif
            @endforeach
            @foreach (App\Models\Backend\Setting::activeSocmed() as $row)
                @if (in_array($row->name,['facebook','instagram','youtube']))
                <div class="single-contact-box">
                    <div class="text-danger">
                        <h5>{{$row->display_name}}</h5>
                        <p>
                            <a href="{{$row->value}}" target="_blank">
                                <i class="fa fa-link"></i>
                                Lihat
                            </a>
                        </p>
                    </div>
                </div>
                @endif
            @endforeach
            
        </div>
    </div>
</div>

{{-- <section class="section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                @if ($setting->gmaps_embed)
                    <div class="shadow d-block">
                        {!! $setting->gmaps_embed !!}
                    </div>
                @endif
            </div>            
            <div class="col-lg-6">
                <div class="contact-box-main m-top-30">
                    <div class="contact-title">
                        <h2>Kontak kami</h2>
                    </div>
                    @foreach (App\Models\Backend\Setting::activeGeneral() as $row)
                        @if (in_array($row->name,['address','phone_number','whatsapp_number','email']))
                        <div class="single-contact-box">
                            <div class="c-icon"><i class="{{$row->icon}}"></i></div>
                            <div class="c-text">
                                <h4>{{$row->display_name}}</h4>
                                <p>{{$row->value}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>            
        </div>
    </div>
</section> --}}
@endsection