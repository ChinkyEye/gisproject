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
    <form role="form" method="POST" action="{{route('superadmin.pradeshsabhasadasya.update', $datas->id)}}" enctype="multipart/form-data">
       @method('PATCH')
       @csrf
      <div class="modal-body" >
        <div class="form-group">
          <label for="name">Full Name:<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter Full Name" name="name" autocomplete="off" autofocus value="{{ $datas->name}}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="district">District<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="district" placeholder="Enter district" name="district" autocomplete="off" autofocus value="{{ $datas->district }}">
          @error('district')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="gender">Gender:<span class="text-danger">*</span></label>
          <div class="row col-md-12">
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $datas->gender == 'male' ? 'checked' : ''}} checked>
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $datas->gender == 'female' ? 'checked' : ''}}>
              <label class="form-check-label" for="female">
                Female
              </label>
            </div>
          </div>
          @error('gender')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="dala">Dala<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="dala" placeholder="Enter dala" name="dala" autocomplete="off" autofocus value="{{ $datas->dala }}">
          @error('dala')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="nirvachit_kshetra_no">Nirvachit kshetra no<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="nirvachit_kshetra_no" placeholder="Enter nirvachit kshetra no" name="nirvachit_kshetra_no" autocomplete="off" autofocus value="{{ $datas->nirvachit_kshetra_no }}">
          @error('nirvachit_kshetra_no')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone no</label>
          <input type="text"  class="form-control max" id="phone" placeholder="Enter phone no" name="phone" autocomplete="off" autofocus value="{{ $datas->phone }}" onkeypress="myFunction(event)">
          <span class="error mt-2" style="color: red; display: none">* Input digits (0 - 9)</span>
          @error('phone')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
            <label for="imgInp">Image</label>
            <div class="input-group">
              @if($datas->image)
              <img id="blah" src="{{URL::to('/')}}/images/pradeshsabhasadasya/{{$datas->image}}" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
               <input type='file' class="d-none" id="imgInp" name="image" />
              @else
                <img id="blah" src="{{ asset('images/no-image-user.png') }}" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
               <input type='file' class="d-none" id="imgInp" name="image"  />
               @endif
              <div class="input-group my-3">
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
        <button type="submit" class="btn btn-info text-capitalize">Update Data</button>
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

  $("#imgInp").change(function() {
    readURL(this);
  });
</script>
@endpush