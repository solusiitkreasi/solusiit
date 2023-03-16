@extends('backend.layouts.app')
@section('title','Detail Role')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">            
                <div class="col-lg-12">
                    <strong>Name</strong>
                    <p class="text-gray pt-2">{{$data->name}}</p>
                </div>
                <div class="col-lg-12">
                    <strong>Description</strong>
                    <p class="text-gray pt-2">{{$data->description}}</p>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="d-block">Permission</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Permission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Auth\Permission::group() as $group)
                                <tr>
                                    <td>{{$group}}</td>
                                    <td>
                                        @foreach (App\Models\Auth\Permission::getGroup($group)->get() as $row)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="permission[]" type="checkbox" id="{{$row->name}}" value="{{$row->name}}" {{ $data ? ($data->hasPermission($row->name) ? 'checked' : ''):''}} disabled>
                                            <label class="form-check-label" for="{{$row->name}}" title="{{$row->description}}">{{str_replace($group,'',$row->display_name)}}</label>
                                        </div>   
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>      
                    
                </div>  
            </div>
        </div>
        <div class="card-footer">
            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.role.index') !!}
        </div>
    </div>
</div>
@endsection