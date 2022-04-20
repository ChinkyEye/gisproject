@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize"><small>Response List</small></h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <div class="card-header">
      <h4 class="mb-0">{{$survey_users->getSurveyName->title}}</h4>
      <p class="mb-0">{{$survey_users->getSurveyName->description}}<p>
    </div>
    <div class="p-0 card">
      <div class="card-header d-flex">
        <span>IP: <small>{{$survey_users->ip}}</small></span> 
        <span class="ml-2">Date: <small>{{$survey_users->date_np}}</small></span>
      </div>
      <div class="card-body bg-light card-comments">
        @foreach($datas as $key => $data)
        <div class="card-comment">
          <div class="comment-text ml-0">
            <span class="username">
            {{$key+1}}.
              {{$data->getSurveyQuestions->question}}
            </span>
            @if($data->type == 'file')
            <img src="{{asset('/images/answer').'/'.$data->result}}" style="width: 20%;height: 20%;">
            {{-- @elseif($data->type == 'checkbox') --}}
            @else
            <i>Ans:</i> 
              {{$data->result}}
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</section>


@endsection
