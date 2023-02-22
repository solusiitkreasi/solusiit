@extends('frontend.frontend-page-master')
@section('site-title')
    {{__('Works')}}
@endsection
@section('page-title')
    {{__('Works')}}
@endsection
@section('content')
    <section class="recent-works-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-nav-area">
                        <ul>
                            <li class="active" data-filter="*">{{__('All work')}}</li>
                            @foreach($all_work_category as $data)
                                <li data-filter=".{{Str::slug($data->name)}}">{{$data->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-masonry" >
                        @foreach($all_work as $data)
                            <div class="single-recent-wrok-item col-lg-4  col-md-6 {{get_work_category_by_id($data->id,'slug')}}">
                                <div class="thumb">
                                    @php $img_url = '';@endphp
                                    @if(file_exists('assets/uploads/works/work-grid-'.$data->id.'.'.$data->image))
                                        <img src="{{asset('assets/uploads/works/work-grid-'.$data->id.'.'.$data->image)}}" alt="{{$data->title}}">
                                        @php $img_url = asset('assets/uploads/works/work-large-'.$data->id.'.'.$data->image);@endphp
                                    @endif
                                    <div class="hover">
                                        <ul>
                                            <li><a href="{{$img_url}}" class="image-popup"> <i class="flaticon-image"></i> </a></li>
                                            <li><a href="{{route('frontend.work.single',['id' => $data->id,'any' => Str::slug($data->title)])}}"> <i class="flaticon-link-symbol"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination-wrapper">
                        {{$all_work->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
