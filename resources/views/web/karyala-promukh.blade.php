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

<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			@foreach($datas as $data)
			<div class="col-md-6">
				<a href="{{$data->url}}" target="_blank">
				<div class="card main-card p-3 shadow-sm">
					<div class="d-flex align-items-center">
						<div class="image"> 
							<img src="{{ $data->image }}" class="rounded" width="155"> 
						</div>
						<div class="ml-3 w-100">
							<h4 class="mb-0 mt-0">{{$data->name}}</h4> 
							<div class="p-2 mt-2 bg-primary rounded text-white main-stats">
								<ul class="list-unstyled">
									<li>
										<b>Post : </b>
										<span>{{$data->post}}</span>
									</li>
									<li>
										<b>Ministry : </b>
										<span>{{$data->ministry}}</span>
									</li>
									@if($data->phone != Null)
									<li>
										<b>Phone : </b>
										<span>{{$data->phone}}</span>
									</li>
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
							</a>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
@push('js')
@endpush