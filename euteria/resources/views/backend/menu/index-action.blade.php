@if ($id > 5)


<a href="{{route('admin.menu.show',$id)}}" class="btn btn-info btn-sm">
    <i class="fa fa-search" data-toggle="tooltip" data-title="Detail"></i>
</a>
<a href="{{route('admin.menu.edit',$id)}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('admin.menu.destroy',$id)}}" class="btn btn-danger btn-sm delete-data" data-toggle="tooltip" data-title="Hapus">
    <i class="fa fa-trash"></i>
</a>
@else
@endif