@extends('web.layouts.app')
@push('tab_title')
About | 
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="">
@endpush
@section('content')
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav>
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item"><a href="#">Page</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Sub Page</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
</section>

<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="text-center thead-dark">
							<tr>
								<th width="5%">SN</th>
								<th class="text-left">Name</th>
								<th width="10%">Date</th>
								<th width="10%">Created At</th>
								<th width="5%">Mantralaya</th>
								<th width="8%">Link</th>
							</tr>
						</thead>
						<tbody class="text-center {{-- vertical-align-middle --}}">
							@foreach($datas as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td class="text-left">{{$data->title}}</td>
								<td>{{$data->created_at_np}}</td>
								<td><span class="badge badge-info">{{$data->created_at->diffForHumans()}}</span></td>
								<td>{{$data->server}}</td>
								<td><a href="{{$data->url}}" target="_blank">View Detail</a></td>
								<!-- <td>
									<a href="" target="_blank" class="text-danger">
										<i class="fa fa-file-pdf-o fa-2x"></i>
									</a>
								</td> -->
								<!-- <td>
									<img src="{{ url('web/img/mantri.jpg') }}" class="img-fluid">
								</td> -->
							</tr>
							@endforeach
							<!-- <tr>
								<td>2</td>
								<td class="text-left">Sumit Pradhan</td>
								<td>2020-02-02</td>
								<td>
									<a href="" target="_blank" class="text-danger">
										<i class="fa fa-file-pdf-o fa-2x"></i>
									</a>
								</td>
								<td>
									<img src="{{ url('web/img/mantri.jpg') }}" class="img-fluid">
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td class="text-left">Sumit Pradhan</td>
								<td>2020-02-02</td>
								<td>
									<a href="" target="_blank" class="text-danger">
										<i class="fa fa-file-pdf-o fa-2x"></i>
									</a>
								</td>
								<td>
									<img src="{{ url('web/img/mantri.jpg') }}" class="img-fluid">
								</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('js')
<script type="text/javascript"></script>
@endpush