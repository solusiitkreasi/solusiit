@extends('frontend.layouts.app')
@section('title',ucwords($menu->name))
@section('content')
<div class="forum-box">
    <div class="title-section">
        <h1><span>@yield('title')</span></h1>
    </div>
    
    <div class="forum-table">
        <div class="table-head">
            <div class="first-col"><a href="#">Nama</a></div>
            <div class="second-col"><span>Tahun / Tanggal</span></div>
            <div class="third-col"><span>Download</span></div>
        </div>
        @forelse ($post as $row)
        <div class="table-row">
            <div class="first-col">
                <h2><a href="{{route('index.show',[$row->menu->slug,$row->slug])}}">{{Str::limit(strip_tags($row->name),100)}}</a></h2>
                <p>{{Str::limit(strip_tags($row->description),100)}}</p>
            </div>
            <div class="second-col">
                <p><span>{{$row->year}}</span> </p>
                <p><span>{{$row->post_date->format('d F Y')}}</span></p>
            </div>
            <div class="third-col">
                {{-- <img src="upload/users/avatar7.jpg" alt=""> --}}
                <div class="post-autor-date">
                    <p><a href="{{asset($row->first_file)}}" class="download-button" data-url="{{route('index.show',[$row->menu->slug,$row->slug])}}" target="_blank">
                        <i class="fa fa-download fa-fw"></i>
                        Download
                    </a></p>
                    <p>
                        Telah di download: {{$row->view_count}}x
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-12">
            <div class="first-col">
                <h2>Belum ada data</h2>
            </div>
            <div class="second-col"></div>
            <div class="third-col"></div>
        </div>
        @endforelse
    </div>
    @if ($post)
    <div class="mt-5">
        {{$post->links()}}                    
    </div>
    @endif
</div>
@endsection
@push('scripts')
<script>
    $(document).on('click','.download-button',function(e){
        e.preventDefault();
        let file_url = $(this).attr('href');
        $.get($(this).data('url'),function(index,value){
            
            window.location.href = file_url;
        })
    })
</script>
@endpush