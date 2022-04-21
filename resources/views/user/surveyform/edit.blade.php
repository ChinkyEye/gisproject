@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Editd {{ $page }}</h1>
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
  <div class="card">
    <form role="form" method="POST" action="{{route('user.surveyform.update', $datas->id)}}">
      @method('PATCH')
      @csrf
      <div class="modal-body" >
        <div class="form-group">
          <label for="title">Title<span class="text-danger">*</span></label>
          <input  type="text"  class="form-control max" rows="4" id="title" placeholder="Enter title" name="title" value="{{$datas->title}}">
          @error('title')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea  type="text"  class="form-control max" rows="4" id="description" placeholder="Enter description" name="description" autocomplete="off">{{$datas->description}}</textarea>
          @error('description')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Update Survey</button>
      </div>
    </form>
  </div>
</section>
@endsection
