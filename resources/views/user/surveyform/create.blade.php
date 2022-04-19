@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 5, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Survey</h1>
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
    <form role="form" method="POST" action="{{route('user.surveyform.store')}}" class="signup" id="signup" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label for="title">Title<span class="text-danger">*</span></label>
          <input  type="text"  class="form-control max" id="title" placeholder="Enter title" name="title" autocomplete="off" autofocus value="{{ old('title') }}">
          @error('title')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea  type="text"  class="form-control max" id="description" placeholder="Enter description" name="description" rows="4" autocomplete="off" autofocus value="{{ old('description') }}"></textarea>
          @error('description')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Save</button>
      </div>
    </form>
  </div>
</section>
@endsection
