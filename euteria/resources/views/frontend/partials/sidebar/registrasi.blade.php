<div class="advertisement">
    <div class="desktop-advert">
        {{-- <span>Registrasi</span> --}}
        <a href="{{route('index.menu','registrasi')}}">
            <img src="{{ $setting->banner_tengah ? asset($setting->banner_tengah) : asset('frontend/upload/addsense/350x250.jpg') }}" alt="">
        </a>
    </div>
    <div class="tablet-advert">
        {{-- <span>Registrasi</span> --}}
        <a href="{{route('index.menu','registrasi')}}">
            <img src="{{ $setting->banner_tengah ? asset($setting->banner_tengah) : asset('frontend/upload/addsense/350x250.jpg') }}" alt="">
        </a>
    </div>
    <div class="mobile-advert">
        <a href="{{route('index.menu','registrasi')}}">
            <img src="{{ $setting->banner_tengah ? asset($setting->banner_tengah) : asset('frontend/upload/addsense/350x250.jpg') }}" alt="">
        </a>
        {{-- <span>Registrasi</span> --}}
    </div>
</div>