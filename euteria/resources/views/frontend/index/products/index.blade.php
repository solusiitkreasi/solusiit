@extends('frontend.layouts.app')

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
                            <h5 class="mb-3 font-weight-normal">MEREK</h5>
                        </div>

                        <div class="col-auto d-block d-lg-none">
                            <a href="#" class="btn product-filter-toggle-btn">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <ul class="product-filters">
                        @foreach ([
                            1 => "MORITA",
                            2 => "MorClean",
                            3 => "WeCareU",
                            // 4 => "Reseller Morita",
                            5 => "Samaru",
                            6 => "St.Morita Tape",
                        ] as $key => $brand)
                            <li class="product-filter-row">
                                <div class="product-filter d-flex">
                                    <input
                                        type="checkbox"
                                        name="brand[]"
                                        value="{{ $key }}"
                                        class="d-none"
                                        id="{{ "pfilter-brand-$key" }}"
                                        {!! $brand_id == $key ? 'checked' : '' !!}
                                    />
    
                                    <label class="product-filter-label m-0" for="{{ "pfilter-brand-$key" }}">
                                        {{ $brand }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <h5 class="mb-3 font-weight-normal mt-4">KATEGORI</h5>

                    <ul class="product-filters">
                        @foreach ([
                            1 => [
                                "name" => "Hand Sanitizer",
                                "child" => [ "Gel Hand Sanitizer", "Liquid Hand Sanitizer" ],
                            ],
                            2 => [
                                "name" => "Hand Soap",
                                "child" => [ "Gel Hand Soap", "Liquid Hand Soap" ],
                            ],
                            3 => [
                                "name" => "Dishwashing Liquid",
                                "child" => [ "Gel Dishwashing Liquid", "Liquid Dishwashing Liquid" ],
                            ],
                            4 => [ "name" => "Floor Cleaner" ],
                            5 => [ "name" => "Tape" ],
                        ] as $key => $category)
                            <li class="product-filter-row">
                                <div class="product-filter d-flex">
                                    <input
                                        type="checkbox"
                                        name="category[]"
                                        value="{{ $key }}"
                                        class="d-none"
                                        id="{{ "pfilter-cat-$key" }}"
                                        {!! $category_id == $key ? 'checked' : '' !!}
                                    />
    
                                    <label class="product-filter-label m-0" for="{{ "pfilter-cat-$key" }}">
                                        {{ $category['name'] }}
                                    </label>
                                </div>

                                @if (!empty($category['child']))
                                    <ul class="product-filters">
                                        @foreach ($category['child'] as $child_id => $child)
                                            <li class="product-filter-row">
                                                <div class="product-filter d-flex">
                                                    <input
                                                        type="checkbox"
                                                        name="category[]"
                                                        value="{{ $child_id }}"
                                                        class="d-none"
                                                        id="{{ "pfilter-brand-$key-$child_id" }}"
                                                        {!! $category_id == $child_id ? 'checked' : '' !!}
                                                    />

                                                    <label class="product-filter-label m-0" for="{{ "pfilter-brand-$key-$child_id" }}">
                                                        {{ $child }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col ml-lg-4 product-col-list">
                <h4 class="mb-4 font-weight-normal">MORITA</h4>

                <div class="row half-gutters">
                    @foreach ([
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                        ['Morita Gel Hand Sanitizer', 'Lime Alkohol 80% - 100ml'],
                    ] as $key => $product)
                        @php
                        $product_url = route('index.product.show', ['id' => $key]);
                        @endphp

                        <div class="col col-12 col-md-4 mb-4">
                            <div class="product-list-box">
                                <div class="product-list-image">
                                    <a href="{{ $product_url }}" class="d-block">
                                        <img
                                            src="{{ asset('frontend/images/product-'.($key % 3 + 1).'.png') }}"
                                            alt=""
                                            class="img img-fluid"
                                        />
                                    </a>
                                </div>

                                <div class="product-list-title mt-2">
                                    <a href="{{ $product_url }}" class="text-dark">
                                        {{ $product[0] }}<br />
                                        {{ $product[1] }}
                                    </a>
                                </div>

                                <div class="product-list-description">
                                    SKU : 01GLEAOR0{{ $key }}-0.1
                                </div>

                                <div class="product-list-action mt-auto pt-3 px-3">
                                    <div class="product-action">
                                        <button class="btn btn-primary rounded-pill btn-block">
                                            <span class="product-list-actiontext">
                                                Beli Sekarang
                                            </span>
                                        </button>

                                        <div class="product-action-extra">
                                            <a href="{{ $product_url }}" class="btn btn-primary rounded-pill btn-block">
                                                Beli di Lazada
                                            </a>

                                            <a href="{{ $product_url }}" class="btn btn-primary rounded-pill btn-block mt-2">
                                                Beli di Shopee
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        
                @if (false)
                    <div class="pt-4">
                        {{ $models->links('components.pagination') }}                    
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
    });
})(jQuery);
</script>
@endpush
