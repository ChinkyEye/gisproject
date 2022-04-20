@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize"><small>Survey User List</small></h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <div class="card-header">
      <h4 class="mb-0">{{$survey_datas->title}}</h4>
      <p class="mb-0">{{$survey_datas->description}}</p>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive table-sm">
        <table class="table m-0">
          <thead>
            <tr>
              <th width="20">SN</th>
              <th>IP</th>
              <th>Date</th>
              <th>Created_at</th>
              <th class="text-center">Status</th>
              <th>Response</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $key => $data)
            <tr>
              <td><a>{{$key + 1}}</a></td>
              <td>{{$data->ip}}</td>
              <td>{{$data->date_np}}</td>
              <td>{{$data->created_at->diffForHumans()}}</td>
              <td class="text-center">
                <a href="">
                  <i class="fa {{ $data->is_active == '1' ? 'fa-check check-css' : 'fa-times cross-css' }}"></i>
                </a>
              </td>
              <td>  
                <a href="{{ route('user.surveyform.surveyanswer',$data->id) }}" class="btn btn-xs btn-outline-info" title="Update"><i class="fas fa-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
