@extends('web.layouts.app')
@php
$page_name = ucfirst(strtolower(str_replace(' ', '-', last(request()->segments()))));
@endphp
@push('tab_title')
{!! $page_name !!} | 
@endpush
@push('css')
@endpush
@section('content')
<!-- <nav class="breadcrumb-main mt-4">
	<div class="container">
		<ol class="breadcrumb bg-light align-content-center">
			<li class="breadcrumb-item my-auto">
				<a href="{{ route('web.home') }}">
					<i class="fa fa-home fa-2x"></i>
				</a>
			</li>
		</ol>
	</div>
</nav> -->
<nav class="breadcrumb-main mt-4">
	<div class="container">
		<ol class="breadcrumb bg-light align-content-center">
			<li class="breadcrumb-item my-auto">
				<a href="{{ route('web.home') }}">
					<i class="fa fa-home fa-2x"></i>
				</a>
			</li>
			<li class="breadcrumb-item my-auto">
				<a href="#">
					{{ __('language.'.$page_name)}}
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			@foreach($datas as $data)
			<div class="col-md-4 mb-3">
				<div class="card main-card p-1 shadow-sm">
					<div class="d-flex">
						<div class="image"> 
							<img src="{{ url($data->path.'/'.$data->document) }}" class="rounded mt-2" width="155"> 
						</div>
						<div class="ml-2 w-100">
							<p class="font-weight-bold text-dark mb-0 mt-0">{{$data->name}}</p> 
							<div class="p-2 bg-primary rounded text-white main-stats">
								<ul class="list-unstyled">
									<li>
										<p class="text-redish m-0">{{$data['getDal']->name}}</p>
										<b>{{ __('language.phone')}} : </b>
										<span>{{$data->phone}}</span>
									</li>
									<li>
										<b>{{ __('language.gender')}} : </b>
										<span>{{$data->gender}}</span>
									</li>
									<li>
										<b>{{ __('language.district')}} : </b>
										<span>{{$data->district}}</span>
									</li>
									<li>
										<b> {{ __('language.nirvachit-no')}}</b>
										<span>{{$data->nirvachit_kshetra_no}}</span>
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
@endpush