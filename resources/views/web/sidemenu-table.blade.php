@extends('web.layouts.app')
@php
$page_name = ucfirst(strtolower(str_replace(' ', '-', last(request()->segments()))));
@endphp
@push('tab_title')
{!! $page_name !!} |
@endpush
@section('content')
<section class="my-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="text-center thead-dark">
							<tr>
								<th width="5%">SN</th>
								<th class="text-left">Title</th>
								<th width="10%">Date</th>
								<th width="10%">Created At</th>
								<th width="10%">File</th>
								<th width="10%">Read More</th>
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
										{{ __('language.read_more')}}
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
