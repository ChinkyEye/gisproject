@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Edit {{$page}}</h1>
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
    <form role="form" method="POST" action="{{route('superadmin.sangathansanrachana.update', $datas->id)}}" enctype="multipart/form-data">
       @method('PATCH')
       @csrf
      <div class="card-body" >
        <div class="form-group">
          <label for="title">Title</label>
          <input  type="text"  class="form-control max" id="title" placeholder="Enter name" name="title" autocomplete="off" value="{{ $datas->title }}">
          @error('title')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="imgInp">Photo<span class="text-danger">*</span></label>
          <div class="input-group">
            <img id="blah" src="{{URL::to('/')}}/images/sangathansanrachana/{{$datas->image}}" onclick="document.getElementById('imgInp').click();" alt="your image" class="img-thumbnail" style="width: 175px;height: 140px"/>
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
        <button type="submit" class="btn btn-info text-capitalize">Update Data</button>
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