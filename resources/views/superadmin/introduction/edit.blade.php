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
    <form role="form" method="POST" action="{{route('superadmin.introduction.update', $datas->id)}}" enctype="multipart/form-data">
       @method('PATCH')
       @csrf
      <div class="card-body" >
        <div class="form-group">
          <label for="title">Tttle<span class="text-danger">*</span></label>
          <input type="title"  class="form-control max" id="title" placeholder="Enter title" name="title" autocomplete="off" autofocus value="{{ $datas->title }}">
          @error('title')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="detail">Description<span class="text-danger">*</span></label>
          <textarea  type="text"  class="form-control max" id="detail" placeholder="Enter description" name="detail" autocomplete="off" autofocus>{{ $datas->detail }}</textarea>
          @error('detail')
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
