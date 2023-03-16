<div class="card">
    @if ($title)
    <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>
    </div>        
    @endif
    @if ($titleWithAction)
    <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>
        <a href="{{$route}}" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Tambah</a>
    </div>        
    @endif
    <div class="card-body">        
        {{$slot}}
    </div>
</div>