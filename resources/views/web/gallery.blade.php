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
				<a href="#" class="">{{ __('language.gallary')}}</a>
			</li>
			<li class="breadcrumb-item my-auto active">
				<a href="javascript:void(0);" class="font-weight-normal">
					{{ __('language.'.$pages)}}
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			@foreach($galleryhasimages as $key => $gallery)
			<div class="col-md-6 col-lg-3 mb-4 wow fadeInUp" data-wow-delay="100ms">
			  <a href="{{URL::to('/')}}/{{$gallery->path}}{{$gallery->document}}" data-fancybox="gallery">
			  	<img src="{{URL::to('/')}}/{{$gallery->path}}{{$gallery->document}}" class="img-fluid">
			  </a>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
@push('js')
<script src="{{ url('/') }}/web/js/jquery.fancybox.min.js"></script>
@endpush