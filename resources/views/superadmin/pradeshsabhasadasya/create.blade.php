@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
            <p class="text-danger m-0">Add Pradesh Shava Shadashya</p>
          </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.pradeshsabhasadasya.store')}}" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label for="name">Full Name<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter full name" name="name" autocomplete="off" autofocus value="{{ old('name') }}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="district">District<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="district" placeholder="Enter district" name="district" autocomplete="off" autofocus value="{{ old('district') }}">
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
              <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : ''}} checked>
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : ''}}>
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
          <label for="dala">Dal<span class="text-danger">*</span></label>
          <select class="form-control max" id="dala" name="dala">
            <option>--Please choose one--</option>
          @foreach($dals as $dal)
          <option value="{{$dal->id}}">{{$dal->name}}</option>
          @endforeach
          </select>
          @error('dala')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          
        </div>
        <div class="form-group">
          <label for="nirvachit_kshetra_no">Nirvachit kshetra no<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="nirvachit_kshetra_no" placeholder="Enter nirvachit kshetra no" name="nirvachit_kshetra_no" autocomplete="off" autofocus value="{{ old('nirvachit_kshetra_no') }}">
          @error('nirvachit_kshetra_no')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone no</label>
          <input type="text"  class="form-control max" id="phone" placeholder="Enter phone no" name="phone" autocomplete="off" autofocus value="{{ old('phone') }}"  onkeypress="myFunction(event)">
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
            <img id="blah" src="{{URL::to('/')}}/images/80x80.png" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
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

        $("#imgInp").change(function() {
          readURL(this);
        });
      </script>
      @endpush
