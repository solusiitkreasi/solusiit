<div class="advertisement">
    <div class="desktop-advert">
        {{-- <span>Ucapan</span> --}}
        <img src="{{ $setting->banner_bawah ? asset($setting->banner_bawah) : asset('frontend/upload/addsense/350x250.jpg') }}" alt="">
        
    </div>
    <div class="tablet-advert">
        {{-- <span>Ucapan</span> --}}
        
        <img src="{{ $setting->banner_bawah ? asset($setting->banner_bawah) : asset('frontend/upload/addsense/350x250.jpg') }}" alt="">
        
    </div>
    <div class="mobile-advert">
        {{-- <img src="" alt=""> --}}
        <img src="{{ $setting->banner_tengah ? asset($setting->banner_tengah) : asset('frontend/upload/addsense/350x250.jpg') }}" alt="">
        {{-- <img src="{{ $setting->banner_tengah ? asset(imageFly($setting->banner_tengah,[300,250])) : asset(imageFly('frontend/upload/addsense/350x250.jpg',[300,250])) }}" alt=""> --}}
        
        {{-- <span>Ucapan</span> --}}
    </div>
</div>