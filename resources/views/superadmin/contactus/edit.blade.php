@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Edit Contact</h1>
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
    <form role="form" method="POST" action="{{route('superadmin.contactus.update', $datas->id)}}" enctype="multipart/form-data">
     @method('PATCH')
     @csrf
     <div class="modal-body" >
      <div class="form-group">
        <label for="iframe">Iframe</label>
        <textarea  type="text"  class="form-control max" id="iframe" placeholder="Enter iframe" name="iframe" autocomplete="off" rows="4">{{$datas->iframe}}</textarea>
        @error('iframe')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text"  class="form-control max" id="address" placeholder="Enter address" name="address" autocomplete="off" autofocus value="{{ $datas->address }}">
        @error('address')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="phone">Phone No:</label>
        <input type="text"  class="form-control max" id="phone" placeholder="Enter phone no" name="phone" autocomplete="off" autofocus value="{{ $datas->phone }}">
        <span class="error mt-2" style="color: red; display: none">* Input digits (0 - 9)</span>
        @error('phone')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email"  class="form-control max" id="email" placeholder="Enter email" name="email" autocomplete="off" autofocus value="{{ $datas->email }}">
        @error('email')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="facebook">Facebook Link</label>
        <input type="facebook"  class="form-control max" id="facebook" placeholder="Enter facebook Link" name="facebook" autocomplete="off" autofocus value="{{ $datas->facebook }}">
        @error('facebook')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div> 
      <div class="form-group">
        <label for="youtube">Youtube Link</label>
        <input type="youtube"  class="form-control max" id="youtube" placeholder="Enter youtube Link" name="youtube" autocomplete="off" autofocus value="{{ $datas->youtube }}">
        @error('youtube')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>  
      <div class="form-group">
        <label for="twitter">Twitter Link</label>
        <input type="twitter"  class="form-control max" id="twitter" placeholder="Enter twitter Link" name="twitter" autocomplete="off" autofocus value="{{ $datas->twitter }}">
        @error('twitter')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

    </div>
    <div class="modal-footer justify-content-between">
      <button type="submit" class="btn btn-info text-capitalize">Update Contact</button>
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