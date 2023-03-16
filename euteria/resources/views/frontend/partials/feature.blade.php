<section id="feature" class="bg-white section-gap">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-4 px-1 mb-3">
                <div class="feature-box bg-blue">
                    <div class="feature-title">
                        @lang('front.history')
                    </div>
                    <div class="feature-content">
                        {!! config('app.locale') == 'en' ? $setting->history_en:$setting->history_id !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 px-1 mb-3">
                <div class="feature-box bg-yellow">
                    <div class="feature-title">
                        @lang('front.vision')
                    </div>
                    <div class="feature-content">
                        {!! config('app.locale') == 'en' ? $setting->vision_en:$setting->vision_id !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 px-1 mb-3">
                <div class="feature-box bg-green">
                    <div class="feature-title">
                        @lang('front.mision')
                    </div>
                    <div class="feature-content">
                        {!! config('app.locale') == 'en' ? $setting->mision_en:$setting->mision_id !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>