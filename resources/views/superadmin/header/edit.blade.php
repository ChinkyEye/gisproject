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
    <form role="form" method="POST" action="{{route('superadmin.header.update', $headers->id)}}" enctype="multipart/form-data">
     @method('PATCH')
     @csrf
     <div class="modal-body" >
      <div class="form-group">
        <label for="name">Name<span class="text-danger">*</span></label>
        @error('name')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="text"  class="form-control max" id="name" placeholder="Enter name" name="name"  autocomplete="off" value="{{ $headers->name }}">
      </div>
      <div class="form-group">
        <label for="slogan">Slogan <span class="text-danger">*</span></label> 
        @error('slogan')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <textarea  type="text"  class="form-control max" id="slogan" placeholder="enter slogan" name="slogan"  autocomplete="off" value="{{ $headers->slogan }}" >{{ $headers->slogan }}</textarea>
      </div>
      <div class="form-group">
        <label for="logo">Choose Logo</label>
        <input type="hidden" value="{{$headers->document}}">
        <div class="input-group">
          <input type="file" class="form-control d-none" id="image" name="image"  value="{{$headers->image}}" >
          <img src="{{URL::to('/')}}/images/logo/{{$headers->document}}" id="profile-img-tag" width="200px" onclick="document.getElementById('image').click();" alt="your image" class="img-thumbnail img-fluid editback-gallery-img center-block"  />
        </div>
        @error('image')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="submit" class="btn btn-info text-capitalize">Update Header</button>
    </div>
  </form>
</div>
</section>
@endsection
@push('javascript')
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#profile-img-tag').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#image").change(function(){
    readURL(this);
  });
</script>
@endpush