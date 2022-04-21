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
			<div class="col-md-12 {{-- text-justify --}}">
				{{--  w-25 -> for 25% area , w-100 : for 100% area --}}
				<img src="{{ url('/web') }}/img/bg-img/1.jpg" class="img-fluid float-left main-img-detail w-25 mr-3">
			</div>
			<div class="col-12 mt-4">
				<a href="{{$data->link}}" class="btn bg-main-blue" target="_blank"><i class="fa fa-download"></i> Link</a>
			</div>
		</div>
	</div>
</section>
@endsection
