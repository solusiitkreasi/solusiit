@extends('backend.layouts.auth')
@section('title','Log In')
@section('content')
<div class="login-box">
    <div class="login-logo mb-5">
        <img src="{{asset($setting->logo)}}" alt="" width="100px">
        {{-- <br> --}}
        {{-- <a href="#"><b>Madinah</b> Iman Wisata</a> --}}
    </div>
    <div class="card">
        <div class="card-body login-card-body rounded">
            <p class="login-box-msg">Log in untuk masuk</p>
            @error('username')
            <p class="text-danger">
                <strong>Username atau Password Salah</strong>
            </p>
            @enderror
            @error('email')
            <p class="text-danger">
                <strong>Email atau Password Salah</strong>
            </p>
            @enderror
            {!! Form::open()->post()->route('login') !!} 
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::text('username', 'Username atau Email')->required()->disableValidation() !!}
                </div>
                <div class="col-lg-12">
                    {!! Form::text('password', 'Password')->required()->type('password')->disableValidation() !!}
                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Masuk') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection
