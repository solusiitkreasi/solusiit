<section id="recent-post" class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach (App\Models\Backend\Post::latestPostByMenu('news-event',2) as $row)
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="recent-post-box">
                            <div class="recent-post-image">
                                <a href="{{route('index.show',[$row->menu->slug,$row->slug])}}">
                                    <img src="{{asset($row->first_images)}}" alt="" class="img img-fluid">
                                </a>
                            </div>
                            <div class="recent-post-title mb-2 mb-lg-4">
                                <a href="{{route('index.show',[$row->menu->slug,$row->slug])}}" class="text-dark">
                                    {{$row->name }}
                                </a>
                            </div>
                            <div class="recent-post-description">
                                {!! Str::limit(strip_tags($row->description),200,'...') !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row pt-3 pt-lg-0">
                    <div class="col-lg-12">
                        <div class="recent-post-box-title">
                            @lang('front.recent-post')
                        </div>
                        <div class="recent-post-box-list">
                            <ul class="list-group list-group-flush">
                                @foreach (App\Models\Backend\Post::latestPostByMenu('news-event',5) as $row)
                                <li class="list-group-item">
                                    <a href="{{route('index.show',[$row->menu->slug,$row->slug])}}">
                                        {{ $row->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>