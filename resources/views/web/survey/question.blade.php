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
				<a href="#" class="">Surevey</a>
			</li>
		</ol>
	</div>
</nav>
<section class="my-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form role="form" method="POST" action="{{route('web.survey.index')}}" enctype="multipart/form-data">
					@csrf
					@foreach($datas as $key => $data)
					<div class="form-group">
						<input type="hidden" name="question[]" value="{{$data->id}}">
						<label>{{$data->question}} <span>{{($data->is_required == '1') ? '*' : ""}}</span></label>

						@if($data->type == 'text')
						<input type="{{$data->type}}" class="form-control" {{($data->is_required == '1') ? 'required' : ""}} minlength="{{$data->min}}" maxlength="{{$data->max}}" name="answer[]">

						@elseif($data->type == 'textarea')
						<textarea class="form-control" {{($data->is_required == '1') ? 'required' : ""}} minlength="{{$data->min}}" maxlength="{{$data->max}}" name="answer[]"></textarea>

						@elseif($data->type == 'dropdown')
						<select class="form-control" {{($data->is_required == '1') ? 'required' : ""}} minlength="{{$data->min}}" maxlength="{{$data->max}}" name="answer[]">
							<option>-- Please select --</option>
							@foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choicedata)
							<option value="{{$choicedata->choice}}">{{$choicedata->choice}}</option>
							@endforeach
						</select>

						@elseif($data->type == 'checkbox')
						@foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choicecheck)
						<input type="{{$data->type}}" name="answer[check][]" class="form-control" id="{{$choicecheck->choice}}" value="{{$choicecheck->choice}}">
						<label for="{{$choicecheck->choice}}">{{$choicecheck->choice}}</label>
						@endforeach

						@elseif($data->type == 'radio')
						@foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choiceradio)
						<input type="{{$data->type}}" name="answer[]" class="form-control" id="{{$choiceradio->choice}}" value="{{$choiceradio->choice}}">
						<label for="{{$choiceradio->choice}}" >{{$choiceradio->choice}}</label>
						@endforeach

						@elseif($data->type == 'file')
						<input type="{{$data->type}}" name="answer[]">
						@endif
					</div>
					@endforeach
					<div>
						<input type="submit" class="btn btn-info text-capitalize" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
