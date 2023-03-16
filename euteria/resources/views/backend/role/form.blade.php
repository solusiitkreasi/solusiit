@extends('backend.layouts.app')
@section('title',$data ? 'Edit Role':'Tambah Role')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.role.store') !!}            
            @else
            {!! Form::open()->put()->route('admin.role.update',[$data->id])->fill($data) !!}            
            @endif
            <div class="row">            
                <div class="col-lg-12">                    
                    {!! Form::text('display_name', 'Name')->attrs(['autofocus'=>''])->required() !!}
                </div>
                <div class="col-lg-12">                    
                    {!! Form::textarea('description', 'Description') !!}
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="d-block">Permission</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Permission</th>
                                    <th width="10%" class="text-center">
                                        <input class="check-all-permission" type="checkbox">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Auth\Permission::group() as $group)
                                <tr>
                                    <td>{{$group}}</td>
                                    <td class="permission_checkbox">
                                        @foreach (App\Models\Auth\Permission::getGroup($group)->get() as $row)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="permission[]" type="checkbox" id="{{$row->name}}" value="{{$row->name}}" {{ $data ? ($data->hasPermission($row->name) ? 'checked' : ''):''}}>
                                            <label class="form-check-label" for="{{$row->name}}" title="{{$row->description}}">{{str_replace($group,'',$row->display_name)}}</label>
                                        </div>   
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <input class="check-all" type="checkbox">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>      
                    
                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Simpan')->primary() !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.role.index') !!}                    
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function(e){
    
    check_all_side();

    function check_all_side()
    {
        $.each($('.check-all'),function(index,value){
            let permission_wrapper = $(this).parent().prev('td');    
            let permission = permission_wrapper.find('input:checkbox');
            let permission_state = [];
            $.each(permission,function(i,v){
                let state = $(this).prop('checked')
                permission_state.push(state)
            })
    
            let state = permission_state.includes(false) ? false:true;
            
            $(this).prop('checked',state)  
        })
    
        
    }
    
    check_all()

    function check_all()
    {
        let check_all_button = $('.check-all-permission');
        let check_all_state =[];
        $.each($('.check-all'),function(e){
            let permission_wrapper = $(this).parent().prev('td');
            let permission = permission_wrapper.find('input:checkbox');
            let state = $(this).prop('checked')    

            check_all_state.push(state)
            permission.prop('checked',state)
        })
        // console.log(check_all_state)
        let all_state = check_all_state.includes(false) ? false:true;
        $('.check-all-permission').prop('checked',all_state);        
    }

    $(document).on('click','.check-all',function(e){
        check_all()
    })

    $(document).on('click','.check-all-permission',function(e){
        let state = $(this).prop('checked')
        let permission = $('.check-all');
        permission.prop('checked',state)
        check_all()
    })

    $(document).on('click','input[name="permission[]"]',function(e){
        check_all_side();
    })
});
</script>    
@endpush