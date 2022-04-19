@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 5, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Detail</h1>
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
    <form role="form" method="POST" action="{{route('user.userhasdetail.store')}}" class="signup" id="signup" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{$datas->id}}">
        <div class="form-group">
         <label for="website_link">Website Link<span class="text-danger">*</span></label>
         <textarea  type="text"  class="form-control max" id="website_link" placeholder="Enter website_link" name="website_link" autocomplete="off" autofocus value="{{ old('website_link') }}"></textarea>
          @error('website_link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
            <label for="imgInp">Image</label>
            <div class="input-group">
              <img id="blah" src="{{URL::to('/')}}/images/80x80.png" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
              <div class="input-group my-3">
               <input type='file' class="d-none" id="imgInp" name="image" />
              </div>
            </div>
          </div>

        
      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Save</button>
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