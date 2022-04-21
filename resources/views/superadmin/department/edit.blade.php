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
    <form role="form" method="POST" action="{{route('superadmin.department.update',$data->id)}}" enctype="multipart/form-data">
      <div class="card-body">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="office_name">Office Name<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="office_name" placeholder="Enter office name" name="office_name" autocomplete="off" autofocus value="{{$data->office_name}}">
          @error('office_name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name">Person Name<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter full name" name="name" autocomplete="off" autofocus value="{{$data->name}}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text"  class="form-control max" id="address" placeholder="Enter address" name="address" autocomplete="off" autofocus value="{{$data->address}}">
          @error('address')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="designation">Designation</label>
          <input type="text"  class="form-control max" id="designation" placeholder="Enter designation" name="designation" autocomplete="off" autofocus value="{{$data->designation}}">
          @error('designation')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email"  class="form-control max" id="email" placeholder="Enter email" name="email" autocomplete="off" autofocus value= "{{$data->email}}">
          @error('email')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone No</label>
          <input type="phone"  class="form-control max" id="phone" placeholder="Enter phone" name="phone" autocomplete="off" autofocus value="{{ $data->phone }}">
          @error('phone')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="work_to_be_done">Work To Be Done</label>
          <textarea class="form-control max" id="work_to_be_done" name="work_to_be_done" autocomplete="off" autofocus value="{{$data->work_to_be_done}}">{{$data->work_to_be_done}}</textarea>
          @error('work_to_be_done')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
       <div class="form-group">
          <label for="imgInp">Image</label>
          <div class="input-group">
            <img id="blah" src="{{URL::to('/')}}/images/department/{{$data->document}}" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
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
        <button type="submit" class="btn btn-info text-capitalize">Update</button>
      </div>
    </form>
  </div>
</section>
@endsection
@push('javascript')
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('work_to_be_done');
    CKEDITOR.config.autoParagraph = false;
    CKEDITOR.config.removeButtons = 'Anchor';
    CKEDITOR.config.removePlugins = 'stylescombo,link,sourcearea,maximize,image,about,tabletools,scayt';
  });
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
