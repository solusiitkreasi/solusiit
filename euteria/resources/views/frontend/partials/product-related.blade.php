{{-- <section id="product-related" class="section-gap">
    <div class="container">
        <h5 class="mb-4">RELATED PRODUCT</h5>

        <div class="row half-gutters">
            @foreach ([
                'Morita Gel Hand Sanitizer Lime',
                'Morita Gel Hand Sanitizer Lime',
                'Morita Gel Hand Sanitizer Lime',
            ] as $key => $product)
                @php
                $product_url = route('index.show', ['product' => $key]);
                @endphp

                <div class="col col-12 col-md-4 mb-4">
                    <div class="product-list-box is-lg">
                        <div class="product-list-image">
                            <a href="{{ $product_url }}" class="d-block">
                                <img
                                    src="{{ asset('frontend/images/product-'.($key % 3 + 5).'.png') }}"
                                    alt=""
                                    class="img img-fluid d-block mx-auto"
                                />
                            </a>
                        </div>

                        <div class="product-list-title mt-2">
                            <a href="{{ $product_url }}" class="text-dark">
                                {{ $product }}
                                <br />
                                Alkohol 80% - 100ml
                            </a>
                        </div>

                        <div class="product-list-description">
                            SKU : 01GLEAOR0{{ $key }}-0.1
                        </div>

                        <div class="product-list-action mt-3 px-md-3">
                            <div class="product-action">
                                <button class="btn btn-primary btn-lg rounded-pill btn-block">
                                    <span class="product-list-actiontext">
                                        Beli Sekarang
                                    </span>
                                </button>

                                <div class="product-action-extra">
                                    <a href="{{ $product_url }}" class="btn btn-primary btn-lg rounded-pill btn-block">
                                        Beli di Lazada
                                    </a>

                                    <a href="{{ $product_url }}" class="btn btn-primary btn-lg rounded-pill btn-block mt-2">
                                        Beli di Shopee
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}