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
    <form role="form" method="POST" action="{{route('superadmin.coreperson.store')}}">
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
          <label for="address">Address<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="address" placeholder="Enter address" name="address" autocomplete="off" autofocus value="{{ old('address') }}">
          @error('address')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="email" placeholder="Enter email" name="email" autocomplete="off" autofocus value="{{ old('email') }}">
          @error('email')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="phone" placeholder="Enter phone number" name="phone" autocomplete="off" autofocus value="{{ old('phone') }}" onkeypress="myFunction(event)">
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
              <input class="form-check-input" type="checkbox" name="type" id="pramukh" value="1" {{ old('type') == '1' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="pramukh">
                karyalaya pramukh
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="Prabatdaa" value="2" {{ old('type') == '2' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="Prabatdaa">
                Prabatdaa
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="suchana_sunne" value="3" {{ old('type') == '3' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="suchana_sunne">
                Suchana Sunne
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="gunaso_sunne" value="4" {{ old('type') == '4' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="gunaso_sunne">
                Gunaso Sunne
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="aanya" value="5" {{ old('type') == '5' ? 'checked' : ''}} onclick="onlyOne(this)">
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
          <input type="text"  class="form-control max" id="responsibility" placeholder="Enter their responsibility" name="responsibility" autocomplete="off" autofocus value="{{ old('responsibility') }}">
          @error('responsibility')
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
  function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('type')
    checkboxes.forEach((item) => {
      if (item !== checkbox) item.checked = false
    })
  }
</script>
@endpush
