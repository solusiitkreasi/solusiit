@extends('frontend.layouts.app')
@section('title',ucwords($menu->name))
@section('content')
<section id="feature" class="bg-white section-gap">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                {!! $post->description !!}
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $('img').addClass('img-fluid');
</script>    
@endpush