@if ($setting->google_analytics != strip_tags($setting->google_analytics))
    {!! $setting ? $setting->google_analytics??'':'' !!}
@endif
@if ($setting->facebook_pixel != strip_tags($setting->facebook_pixel))
    {!! $setting ? $setting->facebook_pixel??'':'' !!}
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="{{asset('backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@stack('js-plugins')
<script>
    $('.selectpicker').selectpicker();
    $('.slider').slick({
        dots: true,
        speed: 300,
        infinite: false, 
        autoplay: true,
        autoplaySpeed: 2000
    });


    $('#testimony.section-gap').each(function() {
        $('.main-slider').slick({
            infinite: false,
            dots: false,
        });
    });

    $('#product.section-gap').each(function() {
        $('.product-list.thumb-slider').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: { slidesToShow: 3 },
                },
                {
                    breakpoint: 770,
                    settings: { slidesToShow: 2 },
                },
                {
                    breakpoint: 578,
                    settings: { slidesToShow: 1 }
                }
            ]
        });

        $('#product-category-tabs a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('.product-list.thumb-slider').slick('setPosition');
        });
    });

    $('#product.section-gap').each(function() {
        $('.brand-box-list.thumb-slider').slick({
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: { slidesToShow: 4 },
                },
                {
                    breakpoint: 992,
                    settings: { slidesToShow: 3 },
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 2 },
                },
                {
                    breakpoint: 578,
                    settings: { slidesToShow: 1 }
                }
            ]
        });
    });

    $(document).on('change','#lang-switch',function(e){
        e.preventDefault();
        let url = $(this).val();
        // console.log($(this).attr)
        window.location.href = url;
    })

    $(document).on('submit','#feedback-form',function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(data){
                Swal.fire(
                    '200',
                    '{{__("front.feedback_sent")}}',
                    'success'
                ).then(result=>{
                    $('input[name="name"]').val('');
                    $('input[name="email"]').val('');
                    $('input[name="company"]').val('');
                    $('#feedbackModal').modal('hide')
                })
            },
            error: function(data){
                let status = data.status
                let status_text = status = 400 ? '400':'500';
                let message = status == 400 ? '{{__("front.feedback_email_exist")}}':'{{__("front.feedback_failed")}}'
                Swal.fire(
                    status_text,
                    message,
                    'error'
                )
            }
        })
    })

    $(document).on('keypress','#search-box',function(e){
        // e.preventDefault();
        if(e.which == 13) {
            let keyword = $(this).val()
            let url = "{!! route('index.menu',['product','search'=>'keyword']) !!}"
            url = url.replace('keyword',encodeURI(keyword))
            
            window.location.href = url
        }
    })
</script>
@stack('scripts')