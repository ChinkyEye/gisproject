@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <p class="text-danger m-0">Add new Dal</p>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <form role="form" method="POST" action="{{route('superadmin.dal.update', $datas->id)}}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="modal-body" >
        <div class="form-group">
          <label for="name">Name<span class="text-danger">*</span></label>
          <input  type="text"  class="form-control max" id="name" placeholder="Enter name" name="name" autocomplete="off" value="{{$datas->name}}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Edit Dal</button>
      </div>
    </form>
  </div>
</section>
@endsection