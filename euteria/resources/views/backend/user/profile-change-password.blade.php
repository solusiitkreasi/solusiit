<div class="tab-pane" id="change-password" role="tabpanel">
    {!! Form::open()->put()->route('admin.user.changePassword')->id('change_password') !!}
    <div class="row">
        <div class="col-lg-12">
            {!! Form::text('old_password', 'Password lama')->type('password')->required()->autocomplete('off') !!}
        </div>
        <div class="col-lg-12">
            {!! Form::text('new_password', 'Password Baru')->type('password')->required()->autocomplete('off') !!}
        </div>
        <div class="col-lg-12">
            {!! Form::text('new_password_confirmation', 'Konfirmasi Password Baru')->type('password')->required()->autocomplete('off') !!}
        </div>
        <div class="col-lg-12">
            {!! Form::submit('Simpan') !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>