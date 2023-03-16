<section class="features-today">
    <div class="container">

        <div class="title-section">
            <h1><span>Pimpinan</span></h1>
        </div>

        <div class="features-today-box owl-wrapper">
            <div class="owl-carousel" data-num="4">
                @foreach (App\Models\Backend\Simanja::pimpinan() as $row)
                <div class="item news-post standard-post">
                    <div class="post-gallery" style="background-image: url('{{App\Models\Backend\Simanja::BASE_URL.$row->file_name}}');background-size:cover;width:100%;height:300px; background-repeat: no-repeat;background-position: top; ">
                        {{-- <img src="{{App\Models\Backend\Simanja::BASE_URL.$row->file_name}}" alt=""> --}}
                        <a class="category-post world" href="world.html">{{$row->jabatan}}</a>
                    </div>
                    <div class="post-content">
                        <h2><a href="#">{{$row->nama}}</a></h2>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>