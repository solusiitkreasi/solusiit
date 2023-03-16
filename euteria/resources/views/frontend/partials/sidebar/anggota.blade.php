<div class="widget features-slide-widget">
    <div class="title-section">
        <h1><span>Daftar Anggota DPRD</span></h1>
    </div>
    <div class="image-post-slider">
        <ul class="bxslider">
            @foreach (App\Models\Backend\Simanja::pimpinan() as $row)
            <li>
                <div class="news-post image-post2">
                    <div class="post-gallery" style="background-image: url('{{App\Models\Backend\Simanja::BASE_URL.$row->file_name}}');background-size:cover;width:100%;height:350px; background-repeat: no-repeat;background-position: top; ">
                        {{-- <img src="{{App\Models\Backend\Simanja::BASE_URL.$row->file_name}}" alt=""> --}}
                        <div class="hover-box">
                            <div class="inner-hover">
                                <h2><a href="#">{{$row->nama}}</a></h2>
                                {{-- <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                    <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                    <li><i class="fa fa-eye"></i>872</li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="black-foreground"></div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>