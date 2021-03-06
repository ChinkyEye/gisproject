@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add {{ $page }}</h1>
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
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.eservice.store')}}" class="signup" id="signup" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="row">
          <div class="form-group col-md">
            <label for="name">Name<span class="text-danger">*</span></label>
            <input type="text"  class="form-control max" id="name" placeholder="Enter name" name="name" autocomplete="off" autofocus value="{{ old('name') }}">
            @error('name')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md">
            <label for="karyalaya">Karyalaya<span class="text-danger">*</span></label>
            <input type="text"  class="form-control max" id="karyalaya" placeholder="Enter Karyalaya" name="karyalaya" autocomplete="off" autofocus value="{{ old('karyalaya') }}">
            @error('karyalaya')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> 
        </div>
        <div class="form-group">
          <label for="contact_no">Contact No:</label>
          <input type="text"  class="form-control max" id="contact" placeholder="Enter contact no" name="contact" autocomplete="off" autofocus value="{{ old('contact') }}"  onkeypress="myFunction(event)" >
          <span class="error mt-2" style="color: red; display: none">* Input digits (0 - 9)</span>
          @error('contact')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
         <label for="website_link">Website Link</label>
         <textarea  type="text"  class="form-control max" id="website_link" placeholder="Enter the link" name="website_link" autofocus value="{{ old('website_link') }}"></textarea>
         @error('website_link')
         <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="row">
        <div class="form-group col-md">
          <label for="imgInp">Thumbnail</label>
          <div class="input-group">
            <img id="blahDoc" src="{{URL::to('/')}}/images/80x80.png" onclick="document.getElementById('imgInpDoc').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
            <input type='file' class="d-none" id="imgInpDoc" name="thumbnail" autofocus value="{{ old('thumbnail') }}" />
          </div>
          @error('thumbnail')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group col-md">
          <label for="imgInp">Logo</label>
          <div class="input-group">
            <img id="blah" src="{{URL::to('/')}}/images/80x80.png" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
            <div class="input-group my-3">
             <input type='file' class="d-none" id="imgInp" name="logo"autofocus value="{{ old('logo') }}" />
           </div>
         </div>
         @error('logo')
         <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
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
  function myFunction(e){
    var keyCode = e.which ? e.which : e.keyCode
    // alert(keyCode);
    if (!((keyCode >= 48 && keyCode <= 57) || keyCode == 46)) {
            $(".error").css("display", "inline");
            // toastr.error('* Input digits (0 - 9)');
            return false;
          }
          else{
            $(".error").css("display", "none");
          }
  }
</script>
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

  function readURLDoc(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blahDoc').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });
  $("#imgInpDoc").change(function() {
    readURLDoc(this);
  });
</script>




@endpush