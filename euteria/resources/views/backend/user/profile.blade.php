@extends('backend.layouts.app')
@section('title','User Profile')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <div class="card-title">@yield('title')</div>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column" role="tablist">
                <li class="nav-item"><a href="#general" class="nav-link active" data-toggle="tab" data-title="General Profile" role="tab">General Profile</a></li>
                <li class="nav-item"><a href="#change-password" class="nav-link" data-toggle="tab" data-title="Ubah password" role="tab">Ubah Password</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title dynamic-title">
                General Pofile
            </h3>
        </div>
        <div class="card-body">
            <div class="tab-content">
                @include('backend.user.profile-general')
                @include('backend.user.profile-change-password')                
            </div>
        </div>
    </div>
</div>
@endsection
@include('backend.plugins.toast')
@push('scripts')
<script>
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        let data = e.target;
        let title = data.text;
        $('h3.dynamic-title').text(title);
    });

    $(document).on('submit','#change_password',function(e){
        e.preventDefault();
        let url = $(this).attr('action');
        let form = $(this);
        let this_card = $(this).parent().parent().parent().parent();
        let loader = `<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i></div>`;
        $.ajax({
            method: 'PUT',
            url: url,
            data: $(this).serialize(),
            beforeSend: function(data){
                this_card.append(loader);
            },
            complete: function(data){
                $('.overlay').remove();
            },
            success: function(data){
                form.trigger('reset');
                toastr.success('Success', 'Password berhasil dirubah');
            },
            error: function(data){
                form.trigger('reset');
                toastr.error('Error', data.responseJSON.message); 
            }
        });
    })

})
</script>    
@endpush