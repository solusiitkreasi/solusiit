<div class="widget tags-widget">
    <div class="title-section">
        <h1><span>Kategori Berita</span></h1>
    </div>
    <ul class="tag-list">
        @foreach (App\Models\Backend\Category::get() as $row)
        <li><a href="#">{{$row->name}}</a></li>
        @endforeach
    </ul>
</div>
<div class="widget tags-widget">
    <div class="title-section">
        <h1><span>Twitter Kami</span></h1>
    </div>
    <a class="twitter-timeline" data-width="100%" data-height="400" data-theme="dark" href="https://twitter.com/dprdmedan1?ref_src=twsrc%5Etfw">Tweets by dprdmedan1</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
</div>