<a href="{{route('admin.post.show',[$menu->slug,$data->id])}}" class="btn btn-info btn-sm">
    <i class="fa fa-search" data-toggle="tooltip" data-title="Detail"></i>
</a>
<a href="{{route('admin.post.edit',[$menu->slug,$data->id])}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('admin.post.destroy',[$menu->slug,$data->id])}}" class="btn btn-danger btn-sm delete-data" data-toggle="tooltip" data-title="Hapus">
    <i class="fa fa-trash"></i>
</a>