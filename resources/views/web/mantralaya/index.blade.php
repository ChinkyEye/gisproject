@extends('web.layouts.app')
@push('tab_title')
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
								<th class="text-left">Mantralaya</th>
								<th width="10%">Address</th>
								<th width="10%">Image</th>
								<th width="10%">Website</th>
								<th width="10%">View detail</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($datas as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td class="text-left">{{$data->getUserDetail->name}}</td>
								<td class="text-left">{{$data->getUserDetail->address}}</td>
								<td>
									<img src="{{$data->getUserDetail->document == null ? asset('images/no-image-user.png') : asset('images/mantralaya') . '/' . $data->getUserDetail->document  }}" alt="" class="responsive" width="50" height="50"class="img-fluid float-left main-img-detail w-25 mr-3">
								</td>
								<td> <a href="{{$data->link}}" target="_blank">Link</a> </td>
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
