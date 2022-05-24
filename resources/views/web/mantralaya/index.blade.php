@extends('web.layouts.app')
@push('tab_title')
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"> --}}
 {{-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

@endpush
@section('content')
<section class="my-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped display nowrap" id="example" style="width:100%">
						<thead class="text-center thead-dark">
							<tr>
								<th width="5%">{{ __('language.SN')}}</th>
								<th class="text-left">{{ __('language.mantralaya')}}</th>
								<th width="10%">{{ __('language.address')}}</th>
								<th width="10%">{{ __('language.image')}}</th>
								<th width="10%">{{ __('language.website')}}</th>
								<th width="10%">{{ __('language.view-detail')}}</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($datas as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td class="text-left">{{$data->getUserDetail->name}}</td>
								<td class="text-left">{{$data->getUserDetail->address}}</td>
								<td>
									<img src="{{$data->document == null ? asset('images/no-image-user.png') : asset('images/mantralaya') . '/' . $data->document  }}" alt="" class="responsive" width="50" height="50"class="img-fluid float-left main-img-detail w-25 mr-3">
								</td>
								<td> <a href="{{$data->link}}" target="_blank" style="font-size: 80%">{{$data->link}}</a> </td>
								<td><a href="{{route('web.mantralaya.detail', $data->id)}}">View</a>
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
@push('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script> --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable( {
			dom: 'Bfrtip',
			buttons: [
			'excel', 'pdf', 'print'
			// 'copy', 'csv', 'excel', 'pdf', 'print'
			]
		} );
	} );
</script>
@endpush
