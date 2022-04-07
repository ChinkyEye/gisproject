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
    <form role="form" method="POST" action="{{route('superadmin.niti.store')}}" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label for="title">Title<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="title" placeholder="Enter title" name="title" autocomplete="off" autofocus value="{{ old('title') }}">
          @error('title')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
          @error('description')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        {{-- <div class="form-group">
          <label for="description">Description<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="description" placeholder="Enter comment" name="description" autocomplete="off" autofocus value="{{ old('description') }}">
          @error('description')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> --}}
        <div class="form-group">
          <label for="type">Type:<span class="text-danger">*</span></label>
          <div class="row col-md-12">
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="ahyan" value="1" {{ old('type') == '1' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="ahyan">
                Ahyan
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="niyammawali" value="2" {{ old('type') == '2' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="niyammawali">
                Niyammawali
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="karyabidhi" value="3" {{ old('type') == '3' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="karyabidhi">
                Karyabidhi
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="type" id="nirdesika" value="4" {{ old('type') == '4' ? 'checked' : ''}} onclick="onlyOne(this)">
              <label class="form-check-label" for="nirdesika">
                Nirdesika
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
          <label for="document">Document<span class="text-danger">*</span></label>
          <div class="input-group">
            <input type='file' id="document" name="document" onchange="fileType(event)"/>
          </div>
           <span class="error mt-2" style="color: red; display: none">* Input pdf file type</span>
          @error('document')
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
<script>
    /* this function will call when page loaded successfully */
    $(document).ready(function(){
 
        /* this function will call when onchange event fired */
        $("#document").on("change",function(){
             
            /* current this object refer to input element */
            var $input = $(this);

            /* collect list of files choosen */
            var files = $input[0].files;
 
            var filename = files[0].name;
      
            /* getting file extenstion eg- .jpg,.png, etc */
            var extension = filename.substr(filename.lastIndexOf("."));
 
            /* define allowed file types */
            var allowedExtensionsRegx = /(\.pdf)$/i;
            // var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
 
            /* testing extension with regular expression */
            var isAllowed = allowedExtensionsRegx.test(extension);
 
            if(isAllowed){
              $(".error").css("display", "none");
                // alert("File type is valid for the upload");
                /* file upload logic goes here... */
            }else{
               $(".error").css("display", "inline");
                // alert("Invalid File Type.");
                return false;
            }
        });    
    });
</script>
@endpush