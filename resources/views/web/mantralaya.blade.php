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
					Mantralaya
					<!-- <i class="fa fa-home fa-2x"></i> -->
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			@foreach($datas as $data)
			<div class="col-md-6">
				<div class="card main-card p-3 shadow-sm">
					<div class="d-flex align-items-center">
						<div class="image"> 
							<img src="{{ url($data->path.'/'.$data->document) }}" class="rounded" width="155"> 
						</div>
						<div class="ml-3 w-100">
							<h4 class="mb-0 mt-0">{{$data->getUserDetail->name}}</h4> 
							<div class="p-2 mt-2 bg-primary rounded text-white main-stats">
								<ul class="list-unstyled">
									<li>
										<b>Phone : </b>
										<span>{{$data->getUserDetail->phone}}</span>
									</li>
									<li>
										<b>Email : </b>
										<span>{{$data->getUserDetail->email}}</span>
									</li>
									<li>
										<b>Link : </b>
										<span><a href="{{$data->link}}" target="_blank">Click Here</a></span>
									</li>
									<!-- <li>
										<b>Nirvachit kshetra no : </b>
										<span>{{$data->nirvachit_kshetra_no}}</span>
									</li> -->
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