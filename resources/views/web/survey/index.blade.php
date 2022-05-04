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
			<li class="breadcrumb-item my-auto">
				<a href="#" class="">{{ __('language.survey')}}</a>
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
								{{-- <th width="5%">SN</th>
								<th class="text-left">Title</th>
								<th width="10%">Date</th>
								<th width="10%">Created At</th>
								<th width="10%">Action</th> --}}

								<th width="5%">{{ __('language.SN')}}</th>
								<th class="text-left">{{ __('language.title')}}</th>
								<th width="10%">{{ __('language.date')}}</th>
								<th width="10%">{{ __('language.created-at')}}</th>
								<th width="10%">{{ __('language.action')}}</th>
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
									<a href="{{route('web.survey.question',$data->slug)}}">{{ __('language.go-to')}}</a>
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
