<a href="{{route('admin.menu.order',['up',$data->id])}}" class="btn btn-info btn-sm order-menu {{$data->order == 1 ? 'disabled':''}}">
    <i class="fa fa-arrow-up" data-toggle="tooltip" data-title="Urutkan Naik"></i>
</a>
<a href="{{route('admin.menu.order',['down',$data->id])}}" class="btn btn-info btn-sm order-menu {{ $data->order == $query->get()->count() ? 'disabled':''}}">
    <i class="fa fa-arrow-down" data-toggle="tooltip" data-title="Urutkan Turun"></i>
</a>