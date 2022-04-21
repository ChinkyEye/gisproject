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
			<div class="col-md-4">
				<div class="card main-card p-3 shadow-sm">
					<div class="d-flex align-items-center">
						<div class="image"> 
							<img src="{{ url($data->path.'/'.$data->document) }}" class="rounded" width="155"> 
						</div>
						<div class="ml-3 w-100">
							<h4 class="mb-0 mt-0">{{$data->title}}</h4> 
							{{-- <span>{{$data['getDal']->name}}</span> --}}
							<div class="p-2 mt-2 bg-primary rounded text-white main-stats">
								<ul class="list-unstyled">
									<li>
										{{-- <b>Desription : </b> --}}
										<span>{{$data->description}}</span>
									</li>
									{{-- <li>
										<b>Gender : </b>
										<span>{{$data->gender}}</span>
									</li>
									<li>
										<b>District : </b>
										<span>{{$data->district}}</span>
									</li>
									<li>
										<b>Nirvachit kshetra no : </b>
										<span>{{$data->nirvachit_kshetra_no}}</span>
									</li> --}}
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