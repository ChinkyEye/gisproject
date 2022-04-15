@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Image</h1>
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
    <form role="form" method="POST" action="{{route('superadmin.galleryhasimage.store')}}" class="signup" enctype="multipart/form-data" >
      <div class="card-body" id="entry-table">
        @csrf

        <input type="hidden" name="gallery_id" value="{{$gallery_id}}">
        <div class="form-group" >
          <label for="imgInp">Image<span class="text-danger">*</span></label>
          <div class="input-group" id="main-entry">
            <input type="file" name="image[]" class="myfrm form-control">

            <div class="input-group-btn"> 
              <button type="button" name="add" id="add_more" class="btn btn-xs btn-outline-primary"><i class="fas fa-plus"></i></button>
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
<script type="text/javascript">
    var max_fields      = 14; 
    var x = 0;
    var wrapper         = $("#entry-table"); 
    $("body").on("click", "#add_more", function(event){
        if(x < max_fields){
            x++;
            var $cloned = $("#main-entry:first").clone();
            $cloned.append('<div class="remove_field input-group-btn"><a href="javascript:void(0)" class="btn btn-outline-danger btn-xs"><i class="fas fa-minus-circle"></i></a></div>').find("input[type='file']").val("");
            wrapper.append($cloned);
        }
        else
            alertify.alert("only max 15 entries");
    });
    wrapper.on("click",".remove_field", function(e){
        e.preventDefault(); $(this).parent('div').remove(); 
        x--;
    });
</script>
@endpush