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
    <form role="form" method="POST" action="{{route('superadmin.agency.update', $agencies->id)}}" enctype="multipart/form-data">
     @method('PATCH')
     @csrf
     <div class="modal-body" >
      <div class="form-group">
        <label for="contact_no">Contact No:<span class="text-danger">*</span></label>
        <input type="text"  class="form-control max" id="contact_no" placeholder="Enter contact no" name="contact_no" autocomplete="off" autofocus value="{{ $agencies->contact_no}}">
        @error('contact_no')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
       <label for="website_link">Website Link</label>
       <textarea  type="text"  class="form-control max" id="website_link" placeholder="Enter website_link" name="website_link" autocomplete="off">{{$agencies->website_link}}</textarea>
       @error('website_link')
       <span class="text-danger font-italic" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="imgInp">Image</label>
      <div class="input-group">
        <img id="blah" src="{{URL::to('/')}}/images/agency/{{$agencies->image}}" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
        <div class="input-group my-3">
         <input type='file' class="d-none" id="imgInp" name="image" />
       </div>
     </div>
     @error('image')
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
@push('javascript')
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });
</script>
@endpush