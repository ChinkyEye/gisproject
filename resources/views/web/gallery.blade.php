@extends('web.layouts.app')
@push('tab_title')
{{ $pages }} | 
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/web/css/jquery.fancybox.min.css">
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
			<li class="breadcrumb-item my-auto">
				<a href="#" class="">Gallery</a>
			</li>
			<li class="breadcrumb-item my-auto active">
				<a href="javascript:void(0);" class="font-weight-normal">
					{{ $pages }}
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3 mb-4 wow fadeInUp" data-wow-delay="100ms">
			  <a href="{{ url('/') }}/web/img/mantri.jpg" data-fancybox="gallery">
			  	<img src="{{ url('/') }}/web/img/mantri.jpg" class="img-fluid">
			  </a>
			</div>
		</div>
	</div>
</section>
@endsection
@push('js')
<script src="{{ url('/') }}/web/js/jquery.fancybox.min.js"></script>
@endpush