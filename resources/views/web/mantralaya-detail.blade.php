{{-- @extends('web.layouts.app')
@php
$page_name = ucfirst(strtolower(str_replace(' ', '-', last(request()->segments()))));
@endphp
@push('tab_title')
{!! $page_name !!} | 
@endpush
@push('css')
@endpush
@section('content')
<nav class="breadcrumb-main mt-4">
	<div class="container">
		<ol class="breadcrumb bg-light align-content-center">
			<li class="breadcrumb-item my-auto">
				<a href="{{ route('web.home') }}">
					<i class="fa fa-home fa-2x"></i>
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			@foreach($datas as $data)
			<div class="col-md-4">
				<div class="card main-card p-3 shadow-sm">
					<div class="d-flex align-items-center">
						<div class="image"> 
							<img src="{{ url($data->path.'/'.$data->document) }}" class="rounded" width="155"> 
						</div>
						<div class="ml-3 w-100">
							<h4 class="mb-0 mt-0">{{$data->getUserDetail->name}}</h4> 
							<span></span>
							<div class="p-2 mt-2 bg-primary rounded text-white main-stats">
								<ul class="list-unstyled">
									<li>
										<b>Phone : </b>
										<span>{{$data->getUserDetail->phone}}</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
@push('js')
@endpush --}}

@extends('web.layouts.app')
@push('tab_title')
@endpush
@push('css')
<script language=javascript src='http://maps.google.com/maps/api/js?sensor=false'></script>
@endpush
@section('content')
<nav class="breadcrumb-main mt-4">
	<div class="container">
		<ol class="breadcrumb bg-light align-content-center">
			<li class="breadcrumb-item my-auto">
				<a href="{{ route('web.home') }}">
					<i class="fa fa-home fa-2x"></i>
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<small>{{ Date('j F, Y',strtotime($datas->date)) }}</small>
				<h2>{{$datas->getUserDetail->name}}</h2>
				<div class="line"></div>
				
			</div>
			<div class="col-md-6 " id="map" style="width: 600px; height: 400px;">

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
    var locations = <?php echo $datas ?>;
    let provided_longitude = <?php echo $datas->longitude; ?>;
    let provided_latitude = <?php echo $datas->latitude; ?>;

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
