<section id="service" class="section-gap">
    <div class="container-fluid mx-0 mx-xl-5 w-auto">
        <div class="service-box">
            <div class="container px-0">
                <div class="service-box-title">
                    @lang('front.what_we_do')
                </div>
                <div class="service-box-sub-title">
                    {!! config('app.locale') == 'en' ? $setting->description_1_en:$setting->description_1_id !!}
                </div>
                <div class="service-box-sub-title font-weight-bolder">
                    {!! config('app.locale') == 'en' ? $setting->description_2_en:$setting->description_2_id !!}
                </div>
                <div class="service-box-content">
                    @php
                        $services = [
                            ['title'=>__('front.factory'),'content'=>config('app.locale') == 'en' ? $setting->factory_en:$setting->factory_id,'image'=>$setting->factory_image],
                            ['title'=>__('front.reseller'),'content'=>config('app.locale') == 'en' ? $setting->reseller_en:$setting->reseller_id,'image'=>$setting->reseller_image],
                            ['title'=>__('front.armada'),'content'=>config('app.locale') == 'en' ? $setting->armada_en:$setting->armada_id,'image'=>$setting->armada_image],
                            ['title'=>__('front.consumer'),'content'=>config('app.locale') == 'en' ? $setting->consumer_en:$setting->consumer_id,'image'=>$setting->consumer_image],
                        ];
                    @endphp
                    <div class="row">
                        @foreach ($services as $key=>$row)
                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <div class="service-icon">
                                <img src="{{asset($row['image'])}}" alt="" class="d-block mx-auto img img-fluid">
                            </div>
                            <div class="service-text">
                                <div class="service-title">
                                    {{$row['title']}}
                                </div>
                                <div class="service-content">
                                    {!! $row['content'] !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>