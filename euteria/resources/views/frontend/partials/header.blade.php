<section id="header">
    <div id="top-bar">
        <div class="container-fluid align-items-center">
            <div class="row justify-content-end"> 
                <div class="col-auto align-items-center d-flex">
                    <div class="search-box">
                        <div class="has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" id="search-box" name="search" placeholder="Search">
                        </div>
                    </div>
                    <div class="language-box">
                        <select class="selectpicker" id="lang-switch" data-width="fit">
                            <option value="{{route('lang.switch','id')}}" data-content='<span class="flag-icon flag-icon-id"></span> INDONESIA' {{ config('app.locale') == 'id' ? 'selected':''}}>Indonesia</option>
                            <option value="{{route('lang.switch','en')}}" data-content='<span class="flag-icon flag-icon-us"></span> ENGLISH' {{ config('app.locale') == 'en' ? 'selected':''}}>English</option>
                            
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="menu-bar">
        <div class="container-fluid px-0 px-lg-3">
            <nav class="navbar py-3 navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset($setting->logo)}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="row no-gutters d-lg-none menu-bar-header">
                        <div class="col">
                            <h4 class="text-primary mb-0">Menu</h4>
                        </div>

                        <div class="col-auto">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="fa fa-times my-1"></span>
                            </button>
                        </div>
                    </div>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">
                                @lang('front.home')
                            </a>
                        </li>
                        @foreach (App\Models\Backend\Menu::headerMenu() as $row)
                            @if ($row->name == 'product' || $row->name == 'produk')
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    {{$row->name}}
                                </a>
                                <div class="dropdown-menu product-menu" aria-labelledby="navbarDropdown">
                                    @include('frontend.partials.header-product')
                                </div>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.menu',$row->slug) }}">
                                    {{$row->name}}
                                </a>
                            </li>
                            @endif
                            
                        @endforeach
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                @lang('front.product')
                            </a>
                            <div class="dropdown-menu product-menu" aria-labelledby="navbarDropdown">
                                @include('frontend.partials.header-product')
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
