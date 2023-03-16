@extends('frontend.layouts.app')

@section('title','Halaman Tidak Ditemukan')

@section('content.slider', '')

@section('content')
<section id="error-404" class="py-5 flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="primary-content text-center">
            <img src="{{ asset('frontend/images/error-404.png') }}" alt="Not found" width="300" height="300" class="img-fluid mb-4" />

            <h1>Error <span>404</span></h1>
            <p>Halaman yang Anda cari tidak ditemukan</p>
        </div>
        {{-- <div class="search-box">
            <form role="search" class="search-form">
                <input type="text" id="search2" name="search" placeholder="Search here">
                <button type="submit" id="search-submit2"><i class="fa fa-search"></i></button>
            </form>
        </div> --}}
    </div>
</section>
@endsection

@section('content.after', '')
