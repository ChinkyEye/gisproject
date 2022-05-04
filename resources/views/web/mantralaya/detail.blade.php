@extends('web.layouts.app')
@push('tab_title')
| 
@endpush
@section('content')
<nav class="breadcrumb-main mt-4">
	<div class="container">
		<ol class="breadcrumb bg-light align-content-center">
			<li class="breadcrumb-item my-auto">
				<a href="{{ route('web.home') }}">
					<i class="fa fa-home fa-2x"></i>
					{{$data->getUserDetail->name}}
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="section-heading ">
			<small>{{$data->getUserDetail->address}}</small>
		    <h2>{{$data->getUserDetail->name}}</h2>
		    <div class="line"></div>
		</div>
		<div class="row">
			<div class="col-md-6 text-justify">
				{{--  w-25 -> for 25% area , w-100 : for 100% area --}}
				<img src="{{ url($data->path.'/'.$data->document) }}" class="img-fluid main-img-detail w-25 mr-3"><br>
				<div class="col-12 mt-4">
					<a href="{{$data->link}}" class="btn bg-main-blue" target="_blank"><i class="fa fa-download"></i> Link</a>
				</div>

			</div>
			<div class="col-md-6 flex-column" id="map" style="width: 600px; height: 400px;">

				{{-- @if ($datas->document)
				<img src="{{ asset($datas->path) . '/' . $datas->document}}" class="img-fluid float-left main-img-detail">
				@endif --}}

			</div>
			
		</div>
	</div>
</section>
@endsection
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1dKX5bl_Y-oEyO07qya3paa3RpdOVzb0"></script>
{{-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> --}}
<script type="text/javascript">
    var locations = <?php echo $data ?>;
    let provided_longitude = <?php echo $data->longitude; ?>;
    let provided_latitude = <?php echo $data->latitude; ?>;

    // console.log(locations,provided_longitude, provided_latitude);

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(provided_latitude, provided_longitude),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // var infowindow = new google.maps.InfoWindow();

    var marker, i;

    // for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(provided_latitude, provided_longitude),
            map: map
        });
    // }
</script>
@endpush
