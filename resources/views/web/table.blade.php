@extends('web.layouts.app')
@push('tab_title')
{{$name}} | 
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
			@if($level == '1')
			<li class="breadcrumb-item my-auto">
				<a href="#" class="">{{$link}}</a>
			</li>
			@elseif($level == '2')
			<li class="breadcrumb-item my-auto">
				<a href="#" class="">{{$link}}</a>
			</li>
			<li class="breadcrumb-item my-auto active">
				<a href="javascript:void(0);" class="font-weight-normal">
					{{$link2}}
				</a>
			</li>
			@endif
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
									<a href="{{URL::to('/')}}/{{$data->path}}/{{$data->document}}" target="_blank" class="text-danger text-center">
				                          <i class="fa fa-file-pdf-o fa-2x"></i>
				                          {{-- <i class="fa fa-file fa-2x"></i> --}}
				                    </a>
								</td>
								<td>
									@if($level == '1')
									<a class="effect1" href="{{ route('web.home.detail', [$link, $data->id ]) }}">
                              {{ __('language.read_more')}}
                              <span class="bg"></span>
                            </a>
                            @elseif($level == '2')
                            <a class="effect1" href="{{ route('web.home.more', [$link,$link2, $data->id ]) }}">
                              {{ __('language.read_more')}}
                              <span class="bg"></span>
                            </a>
                            @else
                            <a class="effect1" href="{{ route('web.home.more', [$link, $data->id ]) }}">
                              {{ __('language.read_more')}}
                              <span class="bg"></span>
                            </a>
                            @endif
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
