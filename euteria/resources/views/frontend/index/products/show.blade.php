@extends('frontend.layouts.app')

@section('content.slider', '')

@section('content')
<section id="products" class="section-gap flex-grow-1">
    <div class="container">
        <div class="row">
            <div class="col-auto product-col-carousel">
                <div class="main-carousel product-carousel">
                    <div class="main-slider product-slider">
                        @for ($i = 0; $i < 12; $i++)
                            <div class="main-slide-item product-slide-item">
                                <img src="{{ asset('frontend/images/product-'.($i % 4 + 5).'.png') }}" alt="Image {{ $i }}" draggable="false" />
                            </div>
                        @endfor
                    </div>

                    <div class="thumb-slider product-thumb-slider">
                        @for ($i = 0; $i < 12; $i++)
                            <div class="thumb-slide-item product-thumb-slide-item">
                                <img src="{{ asset('frontend/images/product-'.($i % 4 + 5).'.png') }}" alt="Image {{ $i }}" draggable="false" />
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col d-flex flex-column product-col-content">
                <h4 class="mb-4">
                    Morita Gel Hand Sanitizer Lime<br />
                    Alkohol 80% - 50 ml<br/>
                    SKU : 01GLEAOR03-0.05
                </h4>

                <div class="primary-content flex-grow-1">
                    <p>
                        Morita Hand Sanitizer berbasis alkohol 80% yang efektif membunuh jamur, bakteri/kuman dan virus. Alkohol (Etanol) 80% efektif melawan 21 jenis virus dengan membran (telapisi membran), seperti ebola, zika, hepatitis, corona, seperti SARS-CoV dan MERS-CoV, hepatitisB serta virus yang menyelimuti lainnya dalam waktu 30 detik Menggunakan bahan aktif etanol yang aman digunakan dan tidak berbahaya bagi tubuh, hasil metabolisme tubuh terhadap senyawa etanol ini aman dan tidak berbahaya, dapat diproses kembali di proses metabolisme. <br />
                        Mengandung gliserol yang akan melembabkan kulit dan tidak meninggalkan rasa lengket di tangan. Memiliki pH 6 yang tidak akan menyebabkan iritasi Dengan aroma Lime yang menyegarkan
                    </p>
                </div>

                <div class="row mt-4 product-list-action" style="max-width: 354px">
                    <div class="col-12">
                        <a href="#" class="btn btn-primary btn-lg rounded-pill btn-block">
                            Download Pdf
                        </a>
                    </div>

                    <div class="col-12 mt-3">
                        <a href="#" class="btn btn-primary btn-lg rounded-pill btn-block">
                            Download Certificate
                        </a>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="product-action">
                            <button class="btn btn-primary btn-lg rounded-pill btn-block">
                                <span class="product-list-actiontext">
                                    Beli Sekarang
                                </span>
                            </button>

                            <div class="product-action-extra">
                                <a href="#" class="btn btn-primary btn-lg rounded-pill btn-block">
                                    Beli di Lazada
                                </a>

                                <a href="#" class="btn btn-primary btn-lg rounded-pill btn-block mt-3">
                                    Beli di Shopee
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('content.after')
    @include('frontend.partials.product-related')
@stop

@push('scripts')
<script>
(function($) {
    $(function() {
        $('.main-slider').slick({
            asNavFor: '.thumb-slider',
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            nextArrow: false,
            prevArrow: false,
            fade: true,
        });

        $('.thumb-slider').slick({
            asNavFor: '.main-slider',
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            nextArrow: false,
            prevArrow: false,
            focusOnSelect: true
        });
    });
})(jQuery);
</script>
@endpush
