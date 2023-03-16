<div class="widget tab-posts-widget">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active">
            <a href="#option1" data-toggle="tab">Kirim Aspirasi</a>
        </li>
        <li>
            <a href="#option2" data-toggle="tab">Aspirasi</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="option1">
            <div style="padding: 0 1rem 1rem 1rem;">
                <div id="aspirasi-wrapper">
                    <form action="{{route('index.aspirasi.store')}}" method="POST" enctype="multipart/form-data" id="aspirasi-form">
                        @csrf
                        {!! Form::text('nama', 'Nama') !!}
                        {!! Form::text('nik', 'NIK') !!}
                        {!! Form::select('ms_kecamatan_id','Kecamatan')->options(App\Models\Utility\Kecamatan::get()->pluck('nama_kecamatan','ms_kecamatan_id')) !!}
                        {!! Form::textarea('alamat', 'Alamat') !!}
                        {!! Form::textarea('keterangan', 'Isi Aspirasi') !!}
                        <div class="g-recaptcha" data-sitekey="6LeMuCMbAAAAAEo0lY2emRDOJdZiTrpnxBpDbgAB"></div>
                        <br>
                        {!! Form::submit('Kirim') !!}
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="option2">
            <ul class="list-posts">
                @foreach (App\Models\DPRD\Aspirasi::latestAspirasi(5)->get() as $aspirasi)
                <li>
                    {{-- <img src="upload/news-posts/listw3.jpg" alt=""> --}}
                    <div class="post-content">
                        <h2><a href="#">{{$aspirasi->nama}}</a></h2>
                        <p>{{$aspirasi->keterangan}}</p>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>{{$aspirasi->nik}}</li>
                            {{-- <li><i class="fa fa-clock-o"></i>{{$aspirasi->nik}}</li> --}}
                        </ul>
                    </div>
                </li>  
                @endforeach
            </ul>										
        </div>
    </div>
</div>