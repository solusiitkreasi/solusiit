@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Search For: ').$search_term}}
@endsection
@section('content')

    <section class="blog-content-area padding-120 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if(count($all_blogs) < 1)
                            <div class="col-lg-12">
                                <div class="alert alert-danger">
                                    {{__('Nothing found related to ').$search_term}}
                                </div>
                            </div>
                        @endif
                            @foreach($all_blogs as $data)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-latest-news-grid-item margin-bottom-30">
                                        <div class="thumb">
                                            @if(file_exists('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image))
                                                <img src="{{asset('assets/uploads/blog/blog-grid-'.$data->id.'.'.$data->image)}}" alt="{{$data->title}}">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <ul class="post-meta">
                                                <li>{{__('By')}} <a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}">{{$data->user->username}}</a></li>
                                                <li><a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}">{{$data->created_at->diffForHumans()}}</a></li>
                                            </ul>
                                            <a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}"><h4 class="title">{{$data->title}}</h4></a>
                                            <div class="post-description">
                                                <p>{{$data->excerpt}}</p>
                                            </div>
                                            <a href="{{route('frontend.blog.single',['id' => $data->id,'any' => Str::slug($data->title)])}}" class="readmore">{{__('Read more')}} <i class="flaticon-right-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    <div class="col-lg-12">
                        <nav class="pagination-wrapper" aria-label="Page navigation ">
                           {{$all_blogs->links()}}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                   @include('frontend.partials.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
