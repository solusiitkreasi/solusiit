<section id="about" class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <div class="about-text">
                    <div class="about-title text-blue">
                        {{config('app.locale') == 'en' ? $setting->about_title_en:$setting->about_title_id}}
                    </div>
                    <div class="about-sub-title">
                        {!! config('app.locale') == 'en' ? $setting->about_sub_title_en:$setting->about_sub_title_id !!}
                    </div>
                    <div class="about-content">
                        {!! config('app.locale') == 'en' ? $setting->about_description_en:$setting->about_description_id !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 mb-3 mb-md-0 align-self-center">
                <div class="about-image">
                    <img src="{{asset($setting->about_image)}}" alt="" class="img img-fluid d-block ml-auto mr-auto mr-md-0">
                </div>
            </div>
        </div>
    </div>
</section>