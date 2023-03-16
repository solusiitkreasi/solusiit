<section id="testimony" class="section-gap">
    <div class="container">
        <div class="main-slider use-arrows">
            @foreach (App\Models\Utility\Testimony::where('status','1')->orderBy('created_at','desc')->get() as $row)
                <div class="main-slide-item is-auto px-lg-5">
                    <div class="row align-items-center justify-content-center px-lg-4">
                        <div class="col-xl-4">
                            <div class="testimony-title d-block d-xl-none">
                                @lang('front.testimony')
                            </div>
                            <div class="testimony-image text-center mb-3 mb-xl-0">
                                <img src="{{asset($row->image)}}" alt="" class="rounded-circle"  width="304" height="290">
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="testimony-title d-none d-xl-block">
                                @lang('front.testimony')
                            </div>
                            <div class="testimony-description">
                                <div class="testimony-text mb-3">
                                    {{$row->description}}
                                </div>
                                <div class="testimony-user font-weight-bold">
                                    {{$row->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>