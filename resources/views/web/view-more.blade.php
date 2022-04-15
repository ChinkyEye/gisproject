@extends('web.layouts.app')
@push('tab_title')
{{$name}} | 
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
			<li class="breadcrumb-item my-auto active">
				<a href="#" class="">{{$name}}</a>
			</li>
			{{-- <li class="breadcrumb-item my-auto active">
				<a href="javascript:void(0);" class="font-weight-normal">
					Data
				</a>
			</li> --}}
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="section-heading ">
			<small>{{ Date('j F, Y',strtotime($datas->date)) }}</small>
		    <h2>{{$datas->title}}</h2>
		    <div class="line"></div>
		</div>
		<div class="row">
			<div class="col-md-12 {{-- text-justify --}}">
				@if ($datas->images)
				{{--  w-25 -> for 25% area , w-100 : for 100% area --}}
				<img src="{{ url('/web') }}/img/bg-img/1.jpg" class="img-fluid float-left main-img-detail w-25 mr-3">
				@endif
				{!! $datas->description !!}
			</div>
			@if ($datas->path)
			<div class="col-12 mt-4">
				<a href="{{URL::to('/')}}/{{$datas->path}}/{{$datas->document}}" class="btn bg-main-blue"><i class="fa fa-download"></i> Download</a>
			</div>
			@endif
		</div>
	</div>
</section>
@endsection
