<div class="row no-gutters">
    <div class="col-auto product-menu-col-1">
        <div class="product-menu-box h-100 d-flex flex-column" style="width: 250px">
            <div class="product-menu-header">
                <h5 class="mb-0 text-white text-capitalize">
                    @lang('front.product_category')
                </h5>
            </div>

            <div class="product-menu-content is-border flex-grow-1 py-4 pl-3">
                <div class="h-100">
                    
                    @forelse (App\Models\Backend\PostCategory::whereNull('parent_id')->get() as $key => $row)
                        <p class="mb-1">
                            <a
                                class="text-dark text-md"
                                href="{{ route('index.menu', ['product','category' => $row->id]) }}"
                            >{{ $row->name }}</a>
                        </p>
                    @empty
                        <p class="mb-1">
                            No Category Yet
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="col product-menu-col-2">
        <div class="product-menu-box">
            <div class="product-menu-header px-lg-4">
                <h5 class="mb-0 text-white px-lg-2 text-capitalize">
                    @lang('front.brand')
                </h5>
            </div>

            <div class="product-menu-content h-100 py-4 px-2 px-lg-4">
                <div class="row no-gutters">
                    @forelse (App\Models\Backend\PostBrand::get() as $key => $row)
                        <div class="col-6 col-sm-4 px-1 px-md-2 mb-3">
                            <div class="d-flex h-100 align-items-center justify-content-center">
                                <a
                                    class="product-menu-image"
                                    href="{{ route('index.menu', ['product','brand' => $row->id]) }}"
                                >
                                    <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" />
                                </a>
                            </div>
                        </div>
                    @empty
                    <div class="col-6 px-2 mb-3">
                        No Brand Yet
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>