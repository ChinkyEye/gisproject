@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 8, strpos(str_replace('manager.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h3 class="text-capitalize"><small> {{$menu_value->dropdown_name}}</small></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('superadmin.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">Menu Dropdown Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.menuhasdropdown.update',$menuhasdropdowns->id)}}">
      <div class="card-body">
        @csrf
        @method('PATCH')
        <input type="hidden" name="menu_id" id="menu_id" value="{{$menu_value->menu_id}}">
        <div class="form-group">
          <label for="dropdown_name">Name:<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="dropdown_name" placeholder="Enter Insurance Id" name="dropdown_name"  autocomplete="off" value="{{ $menuhasdropdowns->dropdown_name }}">
        </div>
      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Update</button>
      </div>
    </form>
  </div>
</section>
@endsection
