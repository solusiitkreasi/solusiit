<section id="brand" class="section-gap">
    <div class="container">
        <div class="brand-title">
            @lang('front.our-brand')
        </div>
        <div class="brand-box">
            <div class="brand-box-list thumb-slider use-arrows">
                @forelse(App\Models\Backend\PostBrand::get() as $row)
                    <div class="thumb-slide-item">
                        <a href="{{ route('index.menu', ['product','brand' => $row->id]) }}" class="brand-box-item">
                            <img src="{{asset($row->image)}}" alt="" class="img img-fluid d-block mx-auto my-auto">
                        </a>

                        <h5 class="mb-0 mt-3 text-center text-uppercase">{{ $row->name }}</h5>
                    </div>
                @empty
                <div class="thumb-slide-item">
                    <div class="text-center">
                        No Brand Yet

                    </div>
                </div>
                @endforelse
                
            </div>
        </div>
    </div>
</section>