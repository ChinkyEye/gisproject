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
    <form role="form" method="POST" action="{{route('superadmin.coreperson.update', $corepersons->id)}}" enctype="multipart/form-data">
     @method('PATCH')
     @csrf
     <div class="modal-body" >
      <div class="form-group">
        <label for="name">Full Name<span class="text-danger">*</span></label>
        <input type="text"  class="form-control max" id="name" placeholder="Enter full name" name="name" autocomplete="off" autofocus value="{{ $corepersons->name }}">
        @error('name')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text"  class="form-control max" id="address" placeholder="Enter address" name="address" autocomplete="off" autofocus value="{{ $corepersons->address }}">
        @error('address')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text"  class="form-control max" id="email" placeholder="Enter email" name="email" autocomplete="off" autofocus value="{{ $corepersons->email }}">
        @error('email')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text"  class="form-control max" id="phone" placeholder="Enter phone number" name="phone" autocomplete="off" autofocus value="{{ $corepersons->phone }}" onkeypress="myFunction(event)">
        <span class="error mt-2" style="color: red; display: none">* Input digits (0 - 9)</span>
        @error('phone')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="link">Link</label>
        <input type="text"  class="form-control max" id="link" placeholder="Enter link" name="link" autocomplete="off" autofocus value="{{ $corepersons->link }}">
        <span class="error mt-2" style="color: red; display: none">* Input digits (0 - 9)</span>
        @error('link')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div> 
      <div class="form-group">
        <label for="facebook">Facebook link</label>
        <input type="text"  class="form-control max" id="facebook" placeholder="Enter facebook link" name="facebook" autocomplete="off" autofocus value="{{ $corepersons->facebook }}">
        <span class="error mt-2" style="color: red; display: none">* Input digits (0 - 9)</span>
        @error('facebook')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="responsibility">Responsibilities</label>
        <input type="text"  class="form-control max" id="responsibility" placeholder="Enter their responsibility" name="responsibility" autocomplete="off" autofocus value="{{ $corepersons->responsibility }}">
        @error('responsibility')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="type">Type <span class="text-danger">*</span></label><br>
        <div class="row col-md-12">
          @foreach ($modelhastypes as $key => $data)
          <div class="form-check-inline col-md">
            <input class="form-check-inline" type="radio" name="type" id="type" value="{{$data->id}}" {{ $corepersons->type == $data->id ? 'checked' : ''}}>
            <label class="form-check-label" for="type">
             {{$data->type}}
           </label>
         </div>
         @endforeach
       </div>
     </div>
      <div class="form-group">
        <label for="is_top">Is Top<span class="text-danger">*</span></label>
        <div class="row col-md-5">
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="radio" name="is_top" id="yes" value="1"{{ $corepersons->is_top == '1' ? 'checked' : ''}}>
            <label class="form-check-label" for="is_top">
              Yes
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="radio" name="is_top" id="no" value="0" {{ $corepersons->is_top == '0' ? 'checked' : ''}}>
            <label class="form-check-label" for="is_top">
              No
            </label>
          </div>
        </div>
        @error('is_top')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="imgInp">Image</label>
        <div class="input-group">
          <img id="blah" src="{{URL::to('/')}}/images/coreperson/{{$corepersons->document}}" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
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
    <button type="submit" class="btn btn-info text-capitalize">Update Detail</button>
  </div>
</form>
</div>
</section>
@endsection
@push('javascript')
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('description');
    CKEDITOR.config.removeButtons = 'Anchor';
    CKEDITOR.config.removePlugins = 'stylescombo,link,sourcearea,maximize,image,about,tabletools,scayt';
  });
</script>
<script type="text/javascript">
  function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('type')
    checkboxes.forEach((item) => {
      if (item !== checkbox) item.checked = false
    })
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