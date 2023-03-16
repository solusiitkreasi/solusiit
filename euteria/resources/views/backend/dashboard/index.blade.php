@extends('backend.layouts.app')
@section('title','Dashboard')
@section('content')
{{-- <div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Feedback</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>    
</div> --}}

<div class="col-lg-12">
    <div class="mt-5">
        <img src="{{asset('backend/img/user.png')}}" class="d-block img-circle img-fluid mx-auto" width="100px">
        <h3 class="text-center mt-3">Selamat Datang, <span class="text-secondary">{{Auth::user()->name}}</span></h3>
        <p class="text-center text-primary">Silahkan pilih menu di sidebar samping kiri</p>
    </div>
</div>
@endsection