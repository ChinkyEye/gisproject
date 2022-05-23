@extends('web.layouts.app')
@push('tab_title')
@endpush
@push('css')
<link rel="stylesheet" href="{{URL::to('/')}}/web/select2/css/select2.min.css">
<link rel="stylesheet" href="{{URL::to('/')}}/web/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link href="{{URL::to('/')}}/web/nepali.datepicker.v3.6/css/nepali.datepicker.v3.6.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
        	{{ $breadcum}}
        </a>
      </li>
    </ol>
  </div>
</nav>
{{-- <section class="breadcrumb-main my-4">
	<div class="container">
		<form method="GET" action="{{route('web.api.search',['type' => $search_val])}}">
			<div class="row">
				<div class="col-md">
					<div class="form-group">
						<select class="form-control select2bs4 w-100" name="year">
							<option value="">Choose Year</option>
							@foreach($years as $key=>$year)
							<option value="{{$year->value}}">{{$year->value}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md">
					<div class="form-group">
						<select class="form-control select2bs4 w-100" name="ministry">
							<option value="">Choose Mantralaya</option>
							@foreach($mantralayas as $mantralaya)
							<option value="{{$mantralaya->prefix}}">{{$mantralaya->getUserDetail->name}}/{{$mantralaya->prefix}}</option>
							@endforeach
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
		</form>
	</div>
</section> --}}

<section class="breadcrumb-main my-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped" id="example">
						<thead class="text-center thead-dark">
							<tr>
								<th width="5%">{{ __('language.SN')}}</th>
								<th width="20%">{{ __('language.karyalaya')}}</th>
								<th width="20%">{{ __('language.mantralaya')}}</th>
								<th class="text-left">{{ __('language.name')}}</th>
								<th>{{ __('language.address')}}</th>
								<th width="10%">{{ __('language.post')}}</th>
								<th width="10%">{{ __('language.contact')}}</th>
								<th width="10%">{{ __('language.created-at')}}</th>
								<th width="15%">{{ __('language.link')}}</th>
							</tr>
						</thead>
						<tbody class="text-center {{-- vertical-align-middle --}}">
							@foreach($datas as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$data->bibhag}}</td>
								<td>{{$data->ministry}}</td>
								<td class="text-left">{{$data->title}}</td>
								<td>{{$data->address}}</td>
								<td>{{$data->designation}}</td>
								<td>{{$data->contact}}</td>
								<td><span class="badge badge-info">{{$data->created_at->diffForHumans()}}</span></td>
								<td>
									<a href="{{$data->url}}" target="_blank" class="table-anchor">{{ __('language.view-detail')}}</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $datas->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>
</section>
@endsection
@push('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable( {
			dom: 'Bfrtip',
			buttons: [
			'excel', 'print'
			// 'copy', 'csv', 'excel', 'pdf', 'print'
			]
		} );
	} );
</script>
<script src="{{URL::to('/')}}/web/select2/js/select2.full.min.js"></script>
{{-- <script src="{{ url('/') }}/web/nepali.datepicker.v3.6/js/nepali.datepicker.v3.6.min.js" type="text/javascript"></script> --}}
{{-- <script type="text/javascript">
	$(function () {
	  $('.select2bs4').select2({
	    theme: 'bootstrap4'
	  });

	   var currentDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD");
        $('#date_np_start').val(currentDate);
        $('#date_np_end').val(currentDate);

		$('#date_np_start').nepaliDatePicker({
			ndpYear: true,
			ndpMonth: true,
			dateFormat: "YYYY-MM-DD"
		});

		$('#date_np_end').nepaliDatePicker({
			ndpYear: true,
			ndpMonth: true,
			dateFormat: "YYYY-MM-DD"
		});
	});
</script> --}}
@endpush