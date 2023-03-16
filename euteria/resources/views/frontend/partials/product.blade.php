@php
$categories = App\Models\Backend\PostCategory::where('parent_id',NULL)->get();
@endphp
<section id="product" class="section-gap">
    <div class="container">
        <div class="product-title text-uppercase">
            @lang('front.best_choice')
        </div>
        <div class="product-category">
            <ul class="nav nav-pills" id="product-category-tabs" role="tablist">
                @foreach ($categories as $category)
                    <li class="nav-item" role="presentation">
                        <a
                            href="#product-category-nav-content-{{ $category->id }}"
                            class="nav-link{{ $loop->first ? ' active' : '' }} product-category-item"
                            id="product-category-nav-tab-{{ $loop->iteration }}"
                            data-toggle="tab"
                            role="tab"
                        >
                            <div class="product-category-image">
                                <img src="{{asset($category->image)}}" alt="" class="d-block mx-auto">
                            </div>
                            <div class="product-category-name">
                                {{$category->name}}
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content" id="product-category-tabContent">
            @foreach ($categories as $category)
                <div
                    class="tab-pane fade{{ $loop->first ? ' show active' : ''}}"
                    id="product-category-nav-content-{{ $category->id }}"
                    role="tabpanel"
                >
                    <div class="product-list thumb-slider use-arrows">
                        @forelse (App\Models\Backend\Post::whereHas('menu',function($query){
                            return $query->whereTranslation('slug','product');
                        })->where('post_category_id',$category->id)->limit(10)->orderBy('created_at','desc')->get() as $row)
                        <div class="thumb-slide-item">
                            <div class="product-list-box">
                                <div class="product-list-image mb-1">
                                    <a href="{{route('index.show',[$row->menu->slug,$row->slug])}}" class="d-block">
                                        <img src="{{asset($row->first_images)}}" alt="" class="img img-fluid">
                                    </a>
                                </div>
                                <div class="product-list-title">
                                    <a href="{{route('index.show',[$row->menu->slug,$row->slug])}}" class="text-dark text-md">
                                        {{$row->name}}
                                    </a>
                                </div>
                                <div class="product-list-description mt-1">
                                    SKU : {{$row->sku}}
                                </div>
                                            
                                @if (isset($row->marketplace_link))
                                <div class="product-action mt-2" style="display: none">
                                    <button class="btn btn-primary rounded-pill btn-block">
                                        <span class="product-list-actiontext">
                                            @lang('front.buy_now')
                                        </span>
                                    </button>
                                    <div class="product-action-extra">
                                        @foreach (json_decode($row->marketplace_link) as $item)
                                        <a href="{{$item->link}}" target="_blank" class="btn btn-primary rounded-pill btn-block">
                                            @lang('front.buy_on') {{$item->name}}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                    
                                @endif
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>   
</section>