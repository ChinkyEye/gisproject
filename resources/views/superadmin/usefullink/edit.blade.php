@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Edit</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('superadmin.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">{{ $page }} Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <form role="form" method="POST" action="{{route('superadmin.usefullink.update', $links->id)}}" enctype="multipart/form-data">
       @method('PATCH')
       @csrf
      <div class="card-body" >
        <div class="form-group">
          <label for="name">Name<span class="text-danger">*</span></label>
          <input type="name"  class="form-control max" id="name" placeholder="Enter name" name="name" autocomplete="off" autofocus value="{{ $links->name }}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="website_link">Website Link<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="website_link" placeholder="Enter the website_link" name="website_link" autocomplete="off" autofocus value="{{ $links->website_link }}">
          @error('website_link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Update</button>
      </div>
    </form>
  </div>
</section>
@endsection
