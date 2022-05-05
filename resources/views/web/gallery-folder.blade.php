@extends('web.layouts.app')
@push('tab_title')
Gallery | 
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/web/css/gallery.main.css">
@endpush
@section('content')
<nav class="breadcrumb-main mt-4">
	<div class="container">
		<ol class="breadcrumb bg-light align-content-center">
			<li class="breadcrumb-item my-auto">
				<a href="{{ route('web.home') }}">
					<i class="fa fa-home fa-2x">
						
					</i>
				</a>
			</li>
			<li class="breadcrumb-item my-auto active">
				<a href="#" class="">{{ __('language.gallary_folder')}}</a>
			</li>
			<!-- <li class="breadcrumb-item my-auto active">
				<a href="javascript:void(0);" class="font-weight-normal">
					Data
				</a>
			</li> -->
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			@foreach($datas as $key => $data)
			<div class="col-md-3">
				<a href="{{ route('web.gallerySlug',$data->slug) }}">
				  <div class='thumb album-thumb'>
				    <div class='thumb-container'>
				      <div class='images-container'>
				        <img class='thumb-image' src='https://images.unsplash.com/photo-1505388763672-ee96ba65bac8?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=aa2b17198c95694b3f90d9e8681d66bc&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80'>
				        <img class='thumb-image' src='https://images.unsplash.com/photo-1505388763672-ee96ba65bac8?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=aa2b17198c95694b3f90d9e8681d66bc&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80'>
				        <img class='thumb-image' src='https://images.unsplash.com/photo-1505388763672-ee96ba65bac8?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=aa2b17198c95694b3f90d9e8681d66bc&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80'>
				      </div>
				      <div class='photo-count'>
				        <div class='content'>
				          <div class='number'>{{$data->imagecount->count()}}</div>
				          <div class='label'>PHOTOS</div>
				        </div>
				      </div>
				    </div>
				    <div class='title'>
				      {{$data->title}}
				    </div>
				  </div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
