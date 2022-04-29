@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
            <p class="text-danger m-0">Add Dropdown on {{$menu_name}}</p>
          </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.menuhasdropdown.store')}}">
      <div class="card-body">
        @csrf
        <input type="hidden" name="menu_id" id="menu_id" value="{{$menus->id}}">
        <div class="form-group">
          <label for="name">Name<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter menu dropdown name" name="name" autocomplete="off" autofocus value="{{ old('name') }}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_np">Name Np<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name_np" placeholder="Enter menu name in Nepali" name="name_np" autocomplete="off" autofocus value="{{ old('name_np') }}">
          @error('name_np')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="model">Model</label>
          <select class="form-control" name="model" id="model">
            <option value="">--Select--</option>
            <option value="Niti">Niti</option>
            <option value="Notice">Notice</option>
            <option value="AboutUs">About</option>
            <option value="Mission">Mission</option>
            <option value="Vision">Vision</option>
            <option value="Gallery">Gallery</option>
            <option value="SangathanSanrachana">Sangathan Sanrachana</option>
            <option value="Pratibedan">Pratibedan</option>
            <option value="Department">Bivagh/Karyalaya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter menu name" name="link" autocomplete="off" autofocus value="{{ old('link') }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="type_data" class="control-label">Type</label>
          <select class="form-control" name="type" id="type_data">
            <option value="">Select Type</option>
          </select>
          @error('type')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="page">Page</label>
          <select class="form-control" name="page" id="page">
            <option value="" selected disabled>-----Select Page------</option>
            <option value="table">Table</option>
            <option value="background">Background</option>
            <option value="gallery-folder">Gallery</option>
            <option value="contactus">Contact us</option>
            <option value="detail">Detail</option>
            <option value="view-more">View More</option>
          </select> 
          @error('page')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $("body").on("change","#model", function(event){
    var model = $('#model').val(),
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type:"POST",
      dataType:"JSON",
      url:"{{route('superadmin.getTypeList')}}", 
      data:{
        _token: token,
        model: model
      },
      success: function(response){
        console.log(response);
        $('#type_data').html('');
        $('#type_data').append('<option value="">--Choose Type--</option>');
        $.each( response, function( i, val ) {
          $('#type_data').append('<option value='+val.id+'>'+val.type+'</option>');
        });
      },
      error: function(event){
        alert("Sorry");
      }
    });
        // Pace.stop();
  });
</script>
@endpush
