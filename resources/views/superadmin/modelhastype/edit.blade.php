@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Edit {{ $page }}</h1>
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
    <form role="form" method="POST" action="{{route('superadmin.modelhastype.update', $datas->id)}}" enctype="multipart/form-data">
     {{-- @method('PATCH') --}}
     @csrf
     <div class="modal-body" >
      <input type="hidden" name="model" id="model" value="{{$datas->model}}"> 
      <div class="form-group">
        <label for="type">Type:<span class="text-danger">*</span></label>
        <input type="text"  class="form-control max" id="type" placeholder="Enter contact no" name="type" autocomplete="off" autofocus value="{{ $datas->type}}">
        @error('type')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
</div>
<div class="modal-footer justify-content-between">
  <button type="submit" class="btn btn-info text-capitalize">Update Agency</button>
</div>
</form>
</div>
</section>
@endsection
