@extends('web.layouts.app')
@push('tab_title')
About | 
@endpush
@push('css')
<link rel="stylesheet" href="{{URL::to('/')}}/web/select2/css/select2.min.css">
<link rel="stylesheet" href="{{URL::to('/')}}/web/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link href="{{URL::to('/')}}/web/nepali.datepicker.v3.6/css/nepali.datepicker.v3.6.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			<div class="col-md">
				{{-- select --}}
				<div class="form-group">
					<select class="form-control select2bs4 w-100">
						<option value="">Choose</option>
						<option>Alaska</option>
						<option>California</option>
						<option>Delaware</option>
						<option>Tennessee</option>
						<option>Texas</option>
						<option>Washington</option>
					</select>
				</div>
			</div>
			<div class="col-md">
				<div class="form-group">
					<select class="form-control select2bs4 w-100">
						<option value="">Choose</option>
						<option>Alaska</option>
						<option>California</option>
						<option>Delaware</option>
						<option>Tennessee</option>
						<option>Texas</option>
						<option>Washington</option>
					</select>
				</div>
			</div>
			<div class="col-md">
				<div class="form-group">
				  <input type="text" class="form-control form-control-border date-picker1" id="date_np_start" name="date_np_start" placeholder="Choose Start Date" value="{{ old('date_np') }}" autocomplete="date_np_start">
				</div>
			</div>
			<div class="col-md">
				<div class="form-group">
				  <input type="text" class="form-control form-control-border date-picker2" id="date_np_end" name="date_np_end" placeholder="Choose End Date" value="{{ old('date_np') }}" autocomplete="date_np_end">
				</div>
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-primary btn-block">Search</button>
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
								<th width="10%">Link</th>
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
								<td>
									<a href="{{$data->url}}" target="_blank" class="table-anchor">View Detail</a>
								</td>
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
<script src="{{URL::to('/')}}/web/select2/js/select2.full.min.js"></script>
<script src="{{ url('/') }}/web/nepali.datepicker.v3.6/js/nepali.datepicker.v3.6.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
	  $('.select2bs4').select2({
	    theme: 'bootstrap4'
	  });

		$('#date_np_start').nepaliDatePicker({
			ndpYear: true,
			ndpMonth: true,
		});
		$('#date_np_end').nepaliDatePicker({
			ndpYear: true,
			ndpMonth: true,
		});
	});
</script>
@endpush