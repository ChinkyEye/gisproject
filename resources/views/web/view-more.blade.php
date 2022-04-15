@extends('web.layouts.app')
@push('tab_title')
About | 
@endpush
@section('content')
<nav class="bg-light breadcrumb-main">
	<div class="container">
		<ol class="breadcrumb bg-light align-content-center">
			<li class="breadcrumb-item my-auto">
				<a href="{{ route('web.home') }}">
					<i class="fa fa-home fa-2x"></i>
				</a>
			</li>
			<li class="breadcrumb-item my-auto">
				<a href="#" class="">{{$name}}</a>
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
		<div class="section-heading ">
		    <h2>{{$datas->title}}</h2>
		    <div class="line"></div>
		</div>
		<div class="row">
			<div class="col-md-12{{--  text-justify --}}">
				<p>{!! $datas->description !!}</p>
			</div>
			<small class="col-12">{{ Date('j F, Y',strtotime($datas->date)) }}</small>
			<div class="col-12">
				<a href="{{URL::to('/')}}/{{$datas->path}}/{{$datas->document}}" class="btn bg-main-blue"><i class="fa fa-download"></i> Download</a>
			</div>
		</div>
	</div>
</section>
@endsection
