@extends('web.layouts.app')
@php
$page_name = ucfirst(strtolower(str_replace(' ', '-', last(request()->segments()))));
@endphp
@push('tab_title')
{!! $page_name !!} |
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
					<!-- {{ __('language.karyalaya-pramukh')}} -->
					{{ __('language.eservice')}}
				</a>
			</li>
		</ol>
	</div>
</nav>
<section class="my-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="text-center thead-dark">
							<tr>
								<th width="5%">{{ __('language.sn')}}</th>
								<th class="text-left">{{ __('language.title')}}</th>
								<th width="10%">{{ __('language.date')}}</th>
								<th width="15%">{{ __('language.created-at')}}</th>
								<th width="10%">{{ __('language.file')}}</th>
								<th width="10%">{{ __('language.read-more')}}</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($datas as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td class="text-left">{{$data->title}}</td>
								<td>{{$data->date_np}}</td>
								<td><span class="badge badge-info">{{$data->created_at->diffForHumans()}}</span></td>
								<td>
									<a href="{{URL::to('/')}}/{{$data->path}}{{$data->document}}" target="_blank" class="text-danger text-center">
										<i class="fa fa-file-pdf-o fa-2x"></i>
									</a>
								</td>
								<td>
									<a class="effect1" href="">
										{{ __('language.read-more')}}
										<span class="bg"></span>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
