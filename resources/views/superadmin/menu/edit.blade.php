@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 8, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h3 class="text-capitalize"><small> {{$menus->name}}</small></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('superadmin.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">Menu Dropdown Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.menu.update',$menus->id)}}" >
      <div class="card-body">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="name">Name:<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter menu" name="name"  autocomplete="off" value="{{ $menus->name }}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_np">Name Np<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name_np" placeholder="Enter menu name in Nepali" name="name_np" autocomplete="off" value="{{ $menus->name_np }}">
          @error('name_np')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter link" name="link" autocomplete="off" autofocus value="{{ $menus->link }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="select_model">Model</label>
          <select class="form-control" name="model" id="select_model">
            <option value="">--Select--</option>
            <option value="Niti" {{ $menus->model == 'Niti' ? 'selected' : ''}}>Niti</option>
            <option value="Notice" {{ $menus->model == 'Notice' ? 'selected' : ''}}>Notice</option>
            <option value="About" {{ $menus->model == 'About' ? 'selected' : ''}}>About</option>
          </select>
        </div>
        <div class="form-group">
          <div class="row col-md-5">
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="is_main" id="is_main" value="1" onchange="Check(this)" {{ $menus->is_main == '1' ? 'checked' : ''}}>
              <label class="form-check-label" for="is_main">
                Is Dropdown
              </label>
            </div>
          </div>
            @error('scroll')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div id="Myid">
        
        <div class="form-group">
          <label for="type_data" class="control-label">Type </label>
          <select class="form-control" name="type" id="type_data">
            {{-- <option value="">Select Type</option> --}}
            @foreach ($modelhastypes as $key => $data)
            <option value="{{ $data->id }}" {{ $menus->type == $data->id ? 'selected' : ''}}>
              {{$data->type}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="page">Page</label>
          <input type="text"  class="form-control max" id="page" placeholder="Enter page" name="page" autocomplete="off" autofocus value="{{ $menus->page }}">
          @error('page')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
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
<script type="text/javascript">
  $("body").on("change","#select_model", function(event){

    var model = $('#select_model').val(),
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
<script type="text/javascript">
  $( document ).ready(function() {
    // console.log(document.getElementById("is_main").checked);
    var x = document.getElementById("Myid");
    if(document.getElementById("is_main").checked)
    {
        x.style.display = "none";
    }
    else
    {
        x.style.display = "block";
    }

  });
</script>
<script>
    function Check(value) {
      var y = value.checked;
      // console.log(y);
      var x = document.getElementById("Myid");
      if(y == true){
        x.style.display = "none";
      }
      else{
        x.style.display = "block";

      }

    };
  </script>
@endpush
