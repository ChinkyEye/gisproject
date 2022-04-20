@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize"><small>Survey User List</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">{{ $page }} Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <div class="card-body">

      <div class="card-footer card-comments">
        @foreach($datas as $key => $data)
        <div class="card-comment">
          <div class="comment-text">
            <span class="username">
            {{$key+1}}.
              {{$data->getSurveyQuestions->question}}
            </span>
            {{$data->result}}
          </div>
        </div>
        @endforeach

        {{-- <div class="card-comment">
          <div class="comment-text">
            <span class="username">
              Luna Stark
            </span>
            It is a long established fact that a reader will be distracted
            by the readable content of a page when looking at its layout.
          </div>
        </div> --}}

      </div>
    </div>

  </div>
</section>


@endsection
