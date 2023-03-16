<section class="heading-news">
    <div class="iso-call heading-news-box">
        @foreach (App\Models\Backend\Post::whereHas('menu',function($query){
            $query->where('slug','berita');
        })->whereHas('category',function($c){
            $c->where('slug','!=','kunjungan-tamu');
        })->orderBy('post_date','DESC')->limit(11)->get() as $key=>$row)
            @if ($loop->index == 1))
            <div class="image-slider snd-size">
                {{-- <span class="top-stories">Berita Terbaru</span> --}}
                <ul class="bxslider">
                    @foreach (App\Models\Backend\Post::whereHas('menu',function($query){
                        $query->where('slug','berita');
                    })->whereHas('category',function($c){
                        $c->where('slug','!=','kunjungan-tamu');
                    })->orderBy('post_date','DESC')->limit(5)->get() as $slider_key=>$slider)
                    @if (in_array($slider_key,[1,2,3]))
                    <li>
                        <div class="news-post image-post">
                        {{-- <div class="news-post image-post" style="background-image: url('{{asset($slider->first_images)}}');background-size:cover; height:428.283px; background-repeat: no-repeat;background-position: center; "> --}}
                            <img src="{{asset(imageFly($slider->first_images,[586,490]))}}" alt="">
                            <div class="hover-box">
                                <div class="inner-hover">
                                    <a class="category-post world" href="world.html">{{$slider->category->name}}</a>
                                    <h2><a href="{{route('index.show',[$slider->menu->slug,$slider->slug])}}">{{Str::limit($slider->name,20)}}</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{$slider->post_date->format('d F Y')}}</li>
                                        <li><i class="fa fa-user"></i><a href="#">Admin</a></li>
                                        {{-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> --}}
                                        <li><i class="fa fa-eye"></i>{{$slider->view_count}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @else
                @if (!in_array($loop->index,[1,2,3]))
                {{-- <div class="news-post image-post {{$loop->index == 0 ? 'default-size':''}}" style="background-image: url('{{asset($row->first_images)}}');background-size:cover; height:214.233px; background-repeat: no-repeat;background-position: center; "> --}}
                <div class="news-post image-post {{$loop->index == 0 ? 'default-size':''}}">
                    <img src="{{asset(imageFly($row->first_images,[293,245]))}}" alt="">
                    <div class="hover-box">
                        <div class="inner-hover">
                            <a class="category-post travel" href="#">{{$row->category->name}}</a>
                            <h2><a href="{{route('index.show',[$row->menu->slug,$row->slug])}}">{{Str::limit($row->name,30)}}</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i><span>{{$row->post_date->format('d F Y')}}</span></li>
                                {{-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> --}}
                            </ul>
                            <p>{{Str::limit(strip_tags($row->description),20)}}</p>
                        </div>
                    </div>
                </div>
                @endif
            @endif
        @endforeach
    </div>
</section>