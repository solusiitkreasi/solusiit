<div class="carousel-box owl-wrapper">
    <div class="title-section">
        <h1><span>Galeri Kegiatan</span></h1>
    </div>
    <div class="owl-carousel" data-num="3">
        @foreach (App\Models\Backend\Post::latestPostByMenu('galeri-kegiatan',6) as $row)
        {{-- <div class="item news-post image-post3" style="background-image: url('{{asset($row->first_images)}}');background-size:cover; height:250px; background-repeat: no-repeat;background-position: top;"> --}}
        <div class="item news-post image-post3">
            <img src="{{asset(imageFly($row->first_images,[185,180]))}}" alt="">
            <div class="hover-box">
                <h2><a href="{{route('index.show',[$row->menu->slug,$row->slug])}}">{{Str::limit($row->name,30)}}</a></h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>{{$row->created_at->format('d F Y')}}</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>