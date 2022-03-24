@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header"></section>
<section class="content">
  <a href="{{route('superadmin.header.create')}}" class="btn btn-sm btn-info text-capitalize rounded-0">Add {{ $page }} </a>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-bordered table-hover m-0 w-100 table-sm">
        <thead class="bg-dark">
          <tr class="text-center">
            <th width="10">SN</th>
            <th width="10">Name</th>
            <th width="10">Image</th>
            <th width="150">Slogan</th>
            <th width="100">Status</th>
          </tr>
        </thead> 
        <tbody>
          @foreach($headers as  $key => $header)
          <tr class="text-center">
            <td>{{$key + 1}}</td>
            <td class="text-left">{{$header->name}}</td>
            <td><img src="{{ asset('images/logo') . '/' . $header->image }}" alt="" class="responsive" width="50" height="50"></td>
            <td>{{$header->slogan}}</td>
            <td>

            </td>
          </tr>
          @endforeach
        </tbody>             
      </table>
    </div>
    
    <div class="card-footer">


    </div>
  </section>
  @endsection
