@extends('backend.layouts.app')
@section('title','403 Forbidden')
@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 403</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Akses Terlarang.</h3>
        <p>
            Anda tidak mempunyai akses pada halaman ini
        </p>
    </div>
</div>    
@endsection