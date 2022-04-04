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
        <label for="address">Address<span class="text-danger">*</span></label>
        <input type="text"  class="form-control max" id="address" placeholder="Enter address" name="address" autocomplete="off" autofocus value="{{ $corepersons->address }}">
        @error('address')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email<span class="text-danger">*</span></label>
        <input type="text"  class="form-control max" id="email" placeholder="Enter email" name="email" autocomplete="off" autofocus value="{{ $corepersons->email }}">
        @error('email')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="phone">Phone<span class="text-danger">*</span></label>
        <input type="text"  class="form-control max" id="phone" placeholder="Enter phone number" name="phone" autocomplete="off" autofocus value="{{ $corepersons->phone }}" onkeypress="myFunction(event)">
        <span class="error mt-2" style="color: red; display: none">* Input digits (0 - 9)</span>
        @error('phone')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="type">Type:<span class="text-danger">*</span></label>
        <div class="row col-md-12">
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="pramukh" value="1" {{ $corepersons->type == '1' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="pramukh">
              karyalaya pramukh
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="Prabatdaa" value="2" {{ $corepersons->type == '2' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="Prabatdaa">
              Prabatdaa
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="suchana_sunne" value="3" {{ $corepersons->type == '3' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="suchana_sunne">
              Suchana Sunne
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="gunaso_sunne" value="4" {{ $corepersons->type == '4' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="gunaso_sunne">
              Gunaso Sunne
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="aanya" value="5" {{ $corepersons->type == '5' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="aanya">
              Aanya
            </label>
          </div>
        </div>
        @error('type')
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