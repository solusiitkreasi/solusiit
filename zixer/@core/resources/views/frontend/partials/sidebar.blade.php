<div class="widget-area">
    <div class="widget  widget_search">
        <form action="{{route('frontend.blog.search')}}" method="get" class="search-form">
            <div class="search-form-warpper">
                <input type="search" class="search-field" name="search"  placeholder="{{__('Search')}}">
                <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="widget widget_categories">
        <h2 class="widget-title">{{get_static_option('blog_page_'.get_user_lang().'_category_widget_title')}}</h2>
        <ul>
            @foreach($all_categories as $data)
                <li><a href="{{route('frontend.blog.category',['id' => $data->id,'any'=> Str::slug($data->name,'-')])}}">{{ucfirst($data->name)}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget widget_recent_post"><!-- widget categories -->
        <h2 class="widget-title">{{get_static_option('blog_page_'.get_user_lang().'_recent_post_widget_title')}}</h2>
        <ul>
            @foreach($all_recent_blogs as $data)
                <li>
                    <div class="single-recent-post">
                        <div class="thumb">
                            @if(file_exists('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image))
                                <img src="{{asset('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)}}" alt="{{$data->title}}">
                            @endif
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{route('frontend.blog.single',['id' => $data->id, 'any' => Str::slug($data->title,'-')])}}">{{$data->title}}</a></h4>
                            <span class="time">{{$data->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
