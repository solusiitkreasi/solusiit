<div class="block-content">
    <div class="masonry-box">
        <div class="title-section">
            <h1><span>Berita Populer</span></h1>
        </div>
        <div class="latest-articles iso-call">
            @foreach (App\Models\Backend\Post::popular()->limit(10)->get() as $row)
            <div class="news-post standard-post2 {{$loop->index == 0 ? 'default-size':''}}">
                <div class="post-gallery">
                    <img src="{{asset(imageFly($row->first_images,[370,260]))}}" alt="">
                </div>
                <div class="post-title">
                    <h2><a href="{{route('index.show',[$row->menu->slug,$row->slug])}}">{{Str::limit($row->name,50)}}</a></h2>
                    <ul class="post-tags">
                        <li><i class="fa fa-clock-o"></i>{{$row->post_date->format('d F Y')}}</li>
                        <li><i class="fa fa-user"></i><a href="#">Admin</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i><span>{{$row->view_count}}</span></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>