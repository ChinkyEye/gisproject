@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('superadmin.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">important-places Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.importantplace.store')}}" enctype="multipart/form-data">
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
          <label for="description">Description<span class="text-danger">*</span></label>
          <textarea  type="text"  class="form-control max" id="description" placeholder="Enter description" name="description" autocomplete="off" autofocus>{{ old('description')}}</textarea>
          @error('description')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        {{-- <div class="form-group">
          <label for="link">Link</label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter the link" name="link" autocomplete="off" autofocus value="{{ old('link') }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> --}}
        <div class="form-group">
          <label for="imgInp">Photo</label>
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
       <div class="form-group">
          <label for="course_name">Pick your Location:</label>
          <div id="googleMap" style="height:280px;"></div>
       </div>
       <div class="row">
        <div class="form-group col-md">
          <label for="latitude">Latitude</label>
          <input type="text"  class="form-control max" id="lat" placeholder="Enter the latitude" name="latitude" autocomplete="off" autofocus value="{{ old('latitude') }}">
          @error('latitude')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group col-md">
          <label for="longitude">Longitude</label>
          <input type="text"  class="form-control max" id="lang" placeholder="Enter the longitude" name="longitude" autocomplete="off" autofocus value="{{ old('longitude') }}">
          @error('longitude')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1dKX5bl_Y-oEyO07qya3paa3RpdOVzb0">
</script>
<script type="text/javascript">
  var myCenter=new google.maps.LatLng(26.475616, 87.283951);
  function initialize()
  {
    var mapProp = {
      draggable:true,
      // zoomControl: false,
      scaleControl: false,
      scrollwheel: false,
      disableDoubleClickZoom: true,
      scrollwheel: true,
      center:myCenter,
      zoom:15,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker=new google.maps.Marker({
      position:myCenter,
    });
    marker.setMap(map);

    google.maps.event.addListener(map, 'click', function( event ){
      $('#lat').html(" ");
      $('#lat').html(" ");
      $('.form-group').find('#lat').val(event.latLng.lat());
      $('.form-group').find('#lang').val(event.latLng.lng());
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endpush
