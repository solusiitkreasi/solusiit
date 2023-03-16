@extends('frontend.layouts.app')

@section('content.slider')
    {{-- @include('frontend.partials.slider-reseller') --}}
    @include('frontend.partials.slider')
@stop

@section('content')
<section id="reseller" class="section-gap">
    <div class="map">

    </div>
    <div class="container">
        <h4 class="mb-5 text-primary text-uppercase">
            @lang('front.find_a_local_distribution')
        </h4>

        <form action="{{route('index.menu',$menu->slug)}}" method="GET">
            <div class="row reseller-action half-gutters align-items-center">
                <div class="col-auto reseller-col-city">
                    <select
                        class="form-control form-control-lg select-city"
                        name="kota"
                        data-placeholder="{{ ucwords(__('front.enter_city'))}}"
                        data-selection-css-class="form-control form-control-lg text-center"
                        data-width="100%"
                        
                        required
                    >
                        <option></option>
                        @foreach (App\Models\Utility\Kota::list()->orderBy('ms_provinsi_id','ASC')->get() as $row)
                        <option value="{{$row->ms_kota_id}}" {{request()->get('kota') == $row->ms_kota_id ? 'selected':''}}>{{$row->nama_kota}}</option>
                        @endforeach

                        
                    </select>
                </div>
                
                <div class="col reseller-col-submit">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 text-capitalize">
                        <p class="m-0 py-lg-1">
                            @lang('front.find_reseller')
                        </p>
                    </button>
                </div>

                <div class="col-auto reseller-col-join">
                    <a href="https://resellermorita.com" target="_blank" class="btn btn-primary btn-lg rounded-pill px-5 text-capitalize">
                        <p class="m-0 py-lg-1">
                            @lang('front.join_reseller')
                        </p>
                    </a>
                </div>
            </div>
        </form>

        <div class="reseller-map mt-5">
            {{-- {!! $setting->gmaps_embed !!} --}}
        </div>

        <div id="map"></div>

        <div class="reseller-list mt-5">
            <div class="row">
                @foreach ($post as $row)
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="reseller-item">
                            <div class="reseller-item-thumb">
                                <img src="{{ asset($row->first_images) }}" alt="Locate {{ $row->coordinate }}" class="d-block" draggable="false" />

                                <a href="https://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination={{$row->coordinate}}" target="_blank" class="btn btn-sm btn-primary text-capitalize">
                                    @lang('front.direction')
                                </a>
                            </div>

                            <div class="reseller-item-content">
                                <div class="primary-content">
                                    <h4>{{ $row->name }}</h4>

                                    <p>
                                        {{$row->address}}
                                    </p>
                                </div>

                                <div class="row no-gutters mt-3">
                                    <i class="fa fa-phone"></i>

                                    <p class="m-0 pl-2">
                                        <a href="tel:{{ "021-123465789" }}" class="text-dark">
                                            {{ $row->phone_number }}
                                        </a>
                                    </p>
                                </div>

                                <div class="row no-gutters mt-2">
                                    <i class="fa fa-envelope"></i>

                                    <p class="m-0 pl-2">
                                        <a href="mailto:{{ $row->email }}" class="text-dark">
                                            {{ $row->email }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if ($post)
            <div class="pt-4">
                {{$post->links('components.pagination')}}                    
            </div>
        @endif
    </div>
</section>
@stop

@section('content.after', '')

@push('css-plugins')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush



@push('styles')
<style>
   #map {
  height: 400px;
}
 
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script async src="https://maps.googleapis.com/maps/api/js?key={{env('GMAPS_API_KEY')}}&callback=initMap"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI9sbN4n4F7Brw-taq5wRX-1tzGIs1qAk&callback=initMap" async defer></script>
<!--Start of Tawk.to Script-->
<script>

function initMap()
{

    let map;
    let marker;
    var reseller_marker = [];
    let kota = $('select[name="kota"]').val();
    let url_data;
    
    if(kota != '')
    {
        
        let url_data = "{!! route('index.utility.menu',[$menu->slug,'kota'=>':kota']) !!}";
        url_data.replace(':kota',kota);        
    }else{
        url_data = "{!! route('index.utility.menu',$menu->slug) !!}";
    }
    $.ajax({
        url: url_data,
        method: 'GET',
        async: false,
        success: function(data){
            if(typeof data.data != 'undefined' )
            {
                reseller_marker = data.data.data
            }
        }
    })
    


    let map_wrapper = document.getElementById('map');

    let default_location = new google.maps.LatLng(-6.3583333, 107.1428193)
    let bounds = new google.maps.LatLngBounds(); 
    map = new google.maps.Map(map_wrapper, {
        center: default_location,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    if(reseller_marker.length)
    {
        $.each(reseller_marker, function(index, val){
            let coordinate = val.coordinate;
            console.log(val.coordinate)
            coordinate = coordinate.split(',');
            
            pos = new google.maps.LatLng(coordinate[0],coordinate[1]);
            bounds.extend(pos); 
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: val.name
            })
        
        })

        map.fitBounds(bounds);
    }else{
        marker = new google.maps.Marker({
            position: default_location,
            map: map,
            title: 'Default Marker',
        });

    }

}



$('.select-city').select2();


</script>
@endpush
