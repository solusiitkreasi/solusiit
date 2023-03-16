@extends('frontend.layouts.app')
@section('title',$post->name)
@section('content')
<div class="single-post-box">

    <div class="title-post">
        <h1>@yield('title')</h1>
        <ul class="post-tags">
            <li><i class="fa fa-clock-o"></i>{{$post->post_date->format('d F Y')}}</li>
            <li><i class="fa fa-user"></i><a href="#">Admin</a></li>
            {{-- <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li> --}}
            <li><i class="fa fa-eye"></i>{{$post->view_count}}</li>
        </ul>
    </div>

    <div class="post-gallery">
        @if (count($post->post_images) > 1)
        <ul class="bxslider">
            @foreach ($post->post_images as $image)
            <li><img src="{{asset($image->file_name)}}" alt=""></li>
            @endforeach
        </ul>
        @else
        <img src="{{asset($post->first_images)}}" alt="">
        @endif
        {{-- <span class="image-caption">Cras eget sem nec dui volutpat ultrices.</span> --}}
    </div>

    <div class="post-content">

        {!! $post->description !!}
    </div>

    {{-- <div class="post-tags-box">
        <ul class="tags-box">
            <li><i class="fa fa-tags"></i><span>Tags:</span></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Fashion</a></li>
            <li><a href="#">Politics</a></li>
            <li><a href="#">Sport</a></li>
        </ul>
    </div> --}}

    <div class="share-post-box">
        <div class="addthis_inline_share_toolbox"></div>
        {{-- <ul class="share-box">
            <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Share on Facebook</a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i>Share on Twitter</a></li>
            <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i><span></span></a></li>
        </ul> --}}
    </div>

    {{-- <div class="prev-next-posts">
        <div class="prev-post">
            <img src="upload/news-posts/listw4.jpg" alt="">
            <div class="post-content">
                <h2><a href="single-post.html" title="prev post">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                    <li><a href="#"><i class="fa fa-comments-o"></i><span>11</span></a></li>
                </ul>
            </div>
        </div>
        <div class="next-post">
            <img src="upload/news-posts/listw5.jpg" alt="">
            <div class="post-content">
                <h2><a href="single-post.html" title="next post">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                    <li><a href="#"><i class="fa fa-comments-o"></i><span>8</span></a></li>
                </ul>
            </div>
        </div>
    </div> --}}

    {{-- <div class="about-more-autor">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#about-autor" data-toggle="tab">About The Autor</a>
            </li>
            <li>
                <a href="#more-autor" data-toggle="tab">More From Autor</a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="about-autor">
                <div class="autor-box">
                    <img src="upload/users/avatar1.jpg" alt="">
                    <div class="autor-content">
                        <div class="autor-title">
                            <h1><span>Jane Smith</span><a href="autor-details.html">18 Posts</a></h1>
                            <ul class="autor-social">
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <p>
                            Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada. 
                        </p>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="more-autor">
                <div class="more-autor-posts">

                    <div class="news-post image-post3">
                        <img src="upload/news-posts/gal1.jpg" alt="">
                        <div class="hover-box">
                            <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>

                    <div class="news-post image-post3">
                        <img src="upload/news-posts/gal2.jpg" alt="">
                        <div class="hover-box">
                            <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>

                    <div class="news-post image-post3">
                        <img src="upload/news-posts/gal3.jpg" alt="">
                        <div class="hover-box">
                            <h2><a href="single-post.html">Suspendisse urna nibh.</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>

                    <div class="news-post image-post3">
                        <img src="upload/news-posts/gal4.jpg" alt="">
                        <div class="hover-box">
                            <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. Aliquam </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div> --}}

    <!-- carousel box -->
    <div class="carousel-box owl-wrapper">
        <div class="title-section">
            <h1><span>{{$post->menu->name}} Terkait</span></h1>
        </div>
        <div class="owl-carousel" data-num="3">
            @foreach(App\Models\Backend\Post::sameCategory($post->category_id)->where('id','!=',$post->id)->get() as $row)
            <div class="item news-post image-post3">
                <img src="{{asset($row->first_images)}}" alt="">
                <div class="hover-box">
                    <h2><a href="{{route('index.show',[$row->menu->slug,$row->slug])}}">{{Str::limit($row->name,30)}}.</a></h2>
                    <ul class="post-tags">
                        <li><i class="fa fa-clock-o"></i>{{$row->post_date->format('d F Y')}}</li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- End carousel box -->

    <!-- contact form box -->
    {{-- <div class="contact-form-box">
        <div class="title-section">
            <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
        </div>
        <form id="comment-form">
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Name*</label>
                    <input id="name" name="name" type="text">
                </div>
                <div class="col-md-4">
                    <label for="mail">E-mail*</label>
                    <input id="mail" name="mail" type="text">
                </div>
                <div class="col-md-4">
                    <label for="website">Website</label>
                    <input id="website" name="website" type="text">
                </div>
            </div>
            <label for="comment">Comment*</label>
            <textarea id="comment" name="comment"></textarea>
            <button type="submit" id="submit-contact">
                <i class="fa fa-comment"></i> Post Comment
            </button>
        </form>
    </div> --}}
    <!-- End contact form box -->

</div>
@endsection
@include('frontend.plugins.addthis')
{{-- <div class="addthis_inline_share_toolbox"></div> --}}
@push('scripts')
<script>
    $('img').addClass('img-fluid');
</script>
    
@endpush