<section class="ticker-news">
    <div class="container">
        <div class="ticker-news-box">
            <span class="breaking-news">Agenda Kegiatan</span>
            {{-- <span class="new-news">New</span> --}}
            <ul id="js-news">
                @if (App\Models\Backend\Simanja::kegiatan())
                @foreach (App\Models\Backend\Simanja::kegiatan() as $row)
                <li class="news-item">
                    <span class="time-news">{{$row->tanggal_mulai_asli}}</span>  
                    {{$row->judul}} - {{Str::limit(strip_tags($row->isi_undangan),100)}}

                </li>
                @endforeach
                @else
                <li class="news-item">
                    <span class="time-news">
                        Tidak Ada Kegiatan
                    </span>
                </li>
                @endif
            </ul>
        </div>
    </div>
</section>