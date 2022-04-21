@extends('web.layouts.app')
@push('tab_title')
About | {{$name}}
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
			@if($level == '1')
			<li class="breadcrumb-item my-auto">
				<a href="#" class="">{{$link}}</a>
			</li>
			@elseif($level == '2')
			<li class="breadcrumb-item my-auto">
				<a href="#" class="">{{$link}}</a>
			</li>
			<li class="breadcrumb-item my-auto active">
				<a href="javascript:void(0);" class="font-weight-normal">
					{{$link2}}
				</a>
			</li>
			@endif
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		@foreach($datas as $data)
		<div class="section-heading ">
			<small>{{ Date('j F, Y',strtotime($data->date)) }}</small>
		    <h2>{{$data->title}}</h2>
		    <div class="line"></div>
		</div>
		<div class="row">
			<div class="col-md-12 {{-- text-justify --}}">
				@if($data->document)
				{{--  w-25 -> for 25% area , w-100 : for 100% area --}}
				<img src="{{URL::to('/')}}/{{$data->path}}/{{$data->document}}" class="img-fluid float-left main-img-detail w-25 mr-3">
				@endif
				{!! $data->description !!}
			</div>
			{{-- @if ($data->path)
			<div class="col-12 mt-4">
				<a href="{{URL::to('/')}}/{{$data->path}}/{{$data->document}}" class="btn bg-main-blue"><i class="fa fa-download"></i> Download</a>
			</div>
			@endif --}}
		</div>
		@endforeach
	</div>
</section>
@endsection
