@extends('backend.layouts.app')
@section('title',ucwords($menu->name))
@section('content')
<div class="col-lg-12">
    <div class="card" style="height: auto">
        <div class="card-header">
            <h3 class="card-title text-capitalize">@yield('title')</h3>            
        </div>
        <div class="card-body">
            
            <iframe src="{{route('index.menu',$menu->slug)}}" width="100%" height="400px" frameborder="0"></iframe>
            {{-- @if (!$data)
            {!! Form::open()->route('admin.post.store',[$menu->slug])->post()->multipart() !!}                
            @else
            {!! Form::open()->route('admin.post.update',[$menu->slug,$data->id])->put()->fill($data)->multipart() !!}                                
            @endif
            <div class="row">                
                <div class="col-lg-12">                    
                    {!! Form::hidden('name', $menu->name) !!}
                    {!! Form::text('name', 'Link',$data->slug) !!}
                </div>
                <div class="col-lg-12">
                    {!! Form::submit(ucwords(__('backend.save'))) !!}
                    {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>'.ucwords(__('backend.back')))->danger()->outline()->route('admin.post.index',[$menu->slug]) !!}
                </div>
            </div>
            {!! Form::close() !!} --}}
        </div>
    </div>
</div>
@endsection