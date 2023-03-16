@extends('backend.layouts.app')
@section('title',$data ? 'Edit User':'Tambah User')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">
            @if (!$data)
            {!! Form::open()->post()->route('admin.user.store') !!}            
            @else
            {!! Form::open()->put()->route('admin.user.update',[$data->id])->fill($data) !!}            
            @endif
            <div class="row">            
                <div class="col-lg-3">                    
                    {!! Form::text('name', 'Nama')->attrs(['autofocus'=>'']) !!}
                </div>
                <div class="col-lg-3">                    
                    {!! Form::text('username', 'Username') !!}
                </div>
                <div class="col-lg-3">                    
                    {!! Form::text('email', 'E-Mail') !!}
                </div>
                @if (!$data)
                <div class="col-lg-3">                    
                    {!! Form::text('password', 'Password')->type('text') !!}
                </div>
                @endif
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="d-block">Role</label>
                        
                        @foreach (App\Models\Auth\Role::get() as $row)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="role" type="radio" id="{{$row->name}}" value="{{$row->id}}" {{ $data ? ($data->hasRole($row->name) ? 'checked' : ''):''}}>
                            <label class="form-check-label" for="{{$row->name}}">{{$row->display_name}}</label>
                        </div>
                        @endforeach            
                    </div>      
                    
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
                                    <td>
                                        @foreach (App\Models\Auth\Permission::getGroup($group)->get() as $row)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="permission[]" type="checkbox" id="{{$row->name}}" value="{{$row->name}}" {{ $data ? ($data->isAbleTo($row->name) ? 'checked' : ''):''}}>
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
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.user.index') !!}                    
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
    $(document).on('click','input[name="role"]',function(e){
        
        let role_id = $(this).val();
        console.log(role_id)
        $.ajax({
            url: `{!! url('/admin/role/permission/${role_id}') !!}`,
            method: 'GET',
            success: function(data){
                $(`input[name="permission[]"]`).prop('checked',false);
                $.each(data, function(index,value){
                    
                    $(`input[value="${value.name}"]`).prop('checked',true)
                })
            }
        })
    })

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