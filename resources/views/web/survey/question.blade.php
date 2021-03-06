@extends('web.layouts.app')
@push('tab_title')
 | 
@endpush
@section('content')
<nav class="breadcrumb-main">
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
			@if(Auth::check())
			{{-- <li class="ml-auto my-auto text-capitalize">
				{{Auth::user()->name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}}
			</li> --}}
			<li class="ml-auto my-auto text-capitalize dropdown">
				<a id="dropdownMenuButton" class="font-weight-normal dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }}
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item font-weight-normal" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</li>
			@endif
		</ol>
	</div>
</nav>
<section class="my-4">
	<div class="container">
		<div>
			<h4 >{{$survey_datas->title}}</h4>
			<p >{{$survey_datas->description}}</p>
		</div>
		<div class="row">
			<div class="col-12">
				<form role="form" method="POST" action="{{route('web.survey.index')}}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="survey_id" value="{{$survey_id}}">
					@foreach($datas as $key => $data)
					<div class="form-group">
						<label>{{$data->question}} <span>{{($data->is_required == '1') ? '*' : ""}}</span></label>

						@if($data->type == 'text' || $data->type == 'email' || $data->type == 'url' || $data->type == 'number')
						<input type="{{$data->type}}" class="form-control" {{($data->is_required == '1') ? 'required' : ""}} minlength="{{$data->min}}" maxlength="{{$data->max}}" name="answer[{{$data->id}}]">

						@elseif($data->type == 'textarea')
						<textarea class="form-control" {{($data->is_required == '1') ? 'required' : ""}} minlength="{{$data->min}}" maxlength="{{$data->max}}" name="answer[{{$data->id}}]"></textarea>

						@elseif($data->type == 'dropdown')
						<select class="form-control" {{($data->is_required == '1') ? 'required' : ""}} minlength="{{$data->min}}" maxlength="{{$data->max}}" name="answer[{{$data->id}}]">
							<option value="" disabled selected>-- Please select --</option>
							@foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choicedata)
							<option value="{{$choicedata->choice}}" >
								{{$choicedata->choice}}
							</option>
							@endforeach
						</select>

						@elseif($data->type == 'checkbox')

						<div class="row col-md-12">
							@foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choicecheck)
							<div class=" form-check-inline col-md">
								<input type="{{$data->type}}" name="checkbox[{{$data->id}}][]" class="form-check-inline" id="{{$choicecheck->choice}}" value="{{$choicecheck->choice}}">
								<label class="form-check-label" for="{{$choicecheck->choice}}">{{$choicecheck->choice}}</label>
							</div>
							@endforeach
						</div>

						@elseif($data->type == 'radio')
						<div class="row col-md-12">
							@foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choiceradio)
							<div class="form-check-inline col-md">
								<input type="{{$data->type}}" name="answer[{{$data->id}}]" class="form-check-inline" id="{{$choiceradio->choice}}" value="{{$choiceradio->choice}}" {{($data->is_required == '1') ? 'required' : ""}}>
								<label class="form-check-label" for="{{$choiceradio->choice}}" >{{$choiceradio->choice}}</label>
							</div>
							@endforeach
						</div>

						@elseif($data->type == 'file')
						<input type="{{$data->type}}" name="image[{{$data->id}}]" {{($data->is_required == '1') ? 'required' : ""}}>
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
