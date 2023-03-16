@extends('frontend.layouts.app')

@php
$brands = App\Models\Backend\PostBrand::get();
$categories = App\Models\Backend\PostCategory::sidebarProduct();

$brand_ids = request('brand');
$selected_brands = $brands->whereIn('id', explode(',', $brand_ids));

$category_ids = request('category');
$selected_categories = $categories->whereIn('id', explode(',', $category_ids));

$subcategory_ids = request('subcategory');
$selected_subcategories = collect([]);
@endphp

@section('content')
<section id="products" class="section-gap">
    <div class="container">
        <div class="row product-list-wrapper">
            <div class="col-auto product-col-filter">
                <div class="product-filter-toggle pb-3">
                    <a href="#" class="btn btn-block btn-lg product-filter-toggle-btn">
                        <i class="fa fa-filter mr-1"></i> Filter Produk
                    </a>
                </div>

                <div class="product-filter-card">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-3 font-weight-normal text-uppercase">
                                @lang('front.brand')
                            </h5>
                        </div>

                        <div class="col-auto d-block d-lg-none">
                            <a href="#" class="btn product-filter-toggle-btn">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <ul class="product-filters">
                        @foreach ($brands as $row)
                            <li class="product-filter-row">
                                <div class="product-filter d-flex">
                                    <input
                                        type="checkbox"
                                        name="brand[]"
                                        value="{{ $row->id }}"
                                        class="d-none"
                                        id="{{ "pfilter-brand-$row->id" }}"
                                        {!! in_array($row->id,explode(',',request()->get('brand'))) ? 'checked' : '' !!}
                                    />
    
                                    <label class="product-filter-label m-0" for="{{ "pfilter-brand-$row->id" }}">
                                        {{ $row->name }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <h5 class="mb-3 font-weight-normal mt-4 text-uppercase">
                        @lang('front.category')
                    </h5>

                    <ul class="product-filters">
                        @foreach ($categories as $row)
                            <li class="product-filter-row">
                                <div class="product-filter d-flex">
                                    <input
                                        type="checkbox"
                                        name="category[]"
                                        value="{{ $row->id }}"
                                        class="d-none"
                                        id="{{ "pfilter-cat-$row->id" }}"
                                        {!! in_array($row->id, explode(',',request()->get('category'))) ? 'checked' : '' !!}
                                    />
                                    <label class="product-filter-label m-0" for="{{ "pfilter-cat-$row->id" }}">
                                        {{ $row->name }}
                                    </label>
                                </div>
                                    
                                    @if (count($row->child))
                                    <ul class="product-filters">
                                        @foreach ($row->child as $child)
                                            @php
                                            if (in_array($child->id, explode(',', $subcategory_ids))) {
                                                $selected_subcategories->push($child);
                                            }
                                            @endphp
                                            <li class="product-filter-row">
                                                <div class="product-filter d-flex">
                                                    <input
                                                        type="checkbox"
                                                        name="subcategory[]"
                                                        value="{{ $child->id }}"
                                                        class="d-none"
                                                        id="{{ "pfilter-subcat-$child->id" }}"
                                                        {!! in_array($child->id, explode(',',request()->get('subcategory'))) ? 'checked' : '' !!}
                                                    />

                                                    <label class="product-filter-label m-0" for="{{ "pfilter-subcat-$child->id" }}">
                                                        {{ $child->name }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    {{-- @else --}}
                                    
                                        
                                    @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col ml-lg-4 product-col-list">
                <h4 class="mb-3 font-weight-normal">
                    @if ($selected_brands->count() === 1)
                        {{ $selected_brands->first()->name }}
                    @else
                        @lang('front.products')
                    @endif
                </h4>

                <div class="row">
                    @if ($selected_brands->count() > 1)
                        <div class="col-auto mb-1 d-flex align-items-center flex-wrap{{
                            $selected_categories->count() || $selected_subcategories->count() ? ' border-right' : ''
                        }}">
                            <strong class="mr-1">
                                @lang('front.brands')
                            </strong>

                            @foreach ($selected_brands as $brand)
                                <span class="badge badge-pill badge-primary my-1 mx-1">{{ $brand->name }}</span>
                            @endforeach
                        </div>
                    @endif

                    @if ($selected_categories->count())
                        <div class="col-auto mb-1 d-flex align-items-center flex-wrap{{
                            $selected_subcategories->count() ? ' border-right' : ''
                        }}">
                            <strong class="mr-1">
                                @lang('front.categories')
                            </strong>

                            @foreach ($selected_categories as $category)
                                <span class="badge badge-pill badge-info my-1 mx-1">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    @endif

                    @if ($selected_subcategories->count())
                        <div class="col-auto mb-1 d-flex align-items-center flex-wrap">
                            <strong class="mr-1">
                                @lang('front.subcategories')
                            </strong>

                            @foreach ($selected_subcategories as $category)
                                <span class="badge badge-pill badge-info my-1 mx-1">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="row half-gutters mt-3">
                    @foreach ($post as $row)

                        <div class="col col-12 col-md-4 mb-4">
                            <div class="product-list-box">
                                <div class="product-list-image">
                                    <a href="{{ route('index.show',[$row->menu->slug,$row->slug]) }}" class="d-block">
                                        <img
                                            src="{{ asset($row->first_images) }}"
                                            alt="{{$row->name}}"
                                            class="img img-fluid"
                                        />
                                    </a>
                                </div>

                                <div class="product-list-title mt-2">
                                    <a href="{{ route('index.show',[$row->menu->slug,$row->slug]) }}" class="text-dark">
                                        {{ $row->name }}
                                        
                                    </a>
                                </div>

                                <div class="product-list-description">
                                    SKU : {{$row->sku}}
                                </div>

                                @if (isset($row->marketplace_link))
                                <div class="product-list-action mt-auto pt-3 px-3">
                                    <div class="product-action">
                                        <button class="btn btn-primary rounded-pill btn-block">
                                            <span class="product-list-actiontext">
                                                @lang('front.buy_now')
                                            </span>
                                        </button>
                                        
                                        <div class="product-action-extra">
                                            @foreach (json_decode($row->marketplace_link) as $item)
                                            <a href="{{ $item->link }}" target="_blank" class="btn btn-primary rounded-pill btn-block">
                                                @lang('front.buy_on') {{$item->name}}
                                            </a>
                                                
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
        
                @if ($post)
                    <div class="pt-4">
                        {{$post->withQueryString()->links('components.pagination')}}                    
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@stop

@section('content.after', '')

@push('scripts')
<script type="text/javascript">
(function ($) {
    $(function() {
        $(window).on('resize', function() {
            $(window).width() > 992 && $('.product-filter-card').show();
        });

        $('.product-filter-toggle-btn').on('click', function(event) {
            event.preventDefault();

            $('.product-filter-card').slideToggle();
        });

        
        
        
        $(document).on('change','input:checkbox',function(e){
            let brand = $('input[name="brand[]"]:checked').map(function(){return $(this).val()}).get()
            let category = $('input[name="category[]"]:checked').map(function(){return $(this).val();}).get()
            let subcategory = $('input[name="subcategory[]"]:checked').map(function(){return $(this).val();}).get()

            let url = "{!! route('index.menu',[$menu->slug,'brand'=>'brand-list','category'=>'category-list','subcategory'=>'subcategory-list']) !!}";

            url = url.replace('brand-list',brand)
            url = url.replace('category-list',category)
            url = url.replace('subcategory-list',subcategory)
            
            window.location.href = url
        })

        var elmnt = document.querySelector(".product-list-wrapper");
        elmnt.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        }); 

    });
})(jQuery);
</script>
@endpush
