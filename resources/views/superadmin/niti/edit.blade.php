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
    <form role="form" method="POST" action="{{route('superadmin.niti.update', $nitis->id)}}" enctype="multipart/form-data">
     @method('PATCH')
     @csrf
     <div class="modal-body" >
      <div class="form-group">
        <label for="name">Title<span class="text-danger">*</span></label>
        @error('name')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="text"  class="form-control max" id="name" placeholder="Enter Insurance Id" name="name"  autocomplete="off" value="{{ $nitis->title }}">
      </div>
      <div class="form-group">
        <label for="description">Description <span class="text-danger">*</span></label>
        <textarea class="form-control" id="description" name="description">{{ $nitis->description }}</textarea>
        @error('description')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="type">Type:<span class="text-danger">*</span></label>
        <div class="row col-md-12">
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="ahyan" value="1" {{$nitis->type == '1' ? 'checked' : ' '}} onclick="onlyOne(this)">
            <label class="form-check-label" for="ahyan">
              Ahyan
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="niyammawali" value="2" {{ $nitis->type == '2' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="niyammawali">
              Niyammawali
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="karyabidhi" value="3" {{ $nitis->type == '3' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="karyabidhi">
              Karyabidhi
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="nirdesika" value="4" {{ $nitis->type == '4' ? 'checked' : ''}} onclick="onlyOne(this)">
            <label class="form-check-label" for="nirdesika">
              Nirdesika
            </label>
          </div>
          <div class="form-check-inline col-md">
            <input class="form-check-input" type="checkbox" name="type" id="aanya" value="5" {{$nitis->type == '5' ? 'checked' : ''}} onclick="onlyOne(this)">
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
           <a href="{{ route('superadmin.niti.downloadfile',$nitis->document)}}" style="color:red" title="Click Here"><i class="fas fa-file-pdf fa-5x"></i></a>
           {{-- <span>{{$nitis->document}}</span> --}}
           {{-- <iframe src="{{URL::to('/')}}/document/niti/{{$nitis->document}}" width="100" height="100" class="text-right"></iframe> --}}
          </div>
           <span class="error mt-2" style="color: red; display: none">* Input pdf file type</span>
          @error('document')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
       </div>
      {{-- <div class="form-group">
        <label for="logo">Choose Logo</label>
        <input type="hidden" value="{{$headers->image}}">
        <div class="input-group">
          <input type="file" class="form-control d-none" id="image" name="image"  value="{{$headers->image}}" >
          <img src="{{URL::to('/')}}/images/logo/{{$headers->image}}" id="profile-img-tag" width="200px" onclick="document.getElementById('image').click();" alt="your image" class="img-thumbnail img-fluid editback-gallery-img center-block"  />
        </div>
        @error('image')
        <span class="text-danger font-italic" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div> --}}
    </div>
    <div class="modal-footer justify-content-between">
      <button type="submit" class="btn btn-info text-capitalize">Update Niti</button>
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