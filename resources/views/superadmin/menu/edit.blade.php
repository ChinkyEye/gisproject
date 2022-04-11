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
        </div>
        <div class="form-group">
          <label for="model_data">Model<span class="text-danger">*</span></label>
          <select id="nationality" class="form-control" name="model" id="modal">
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
          <label for="link">Link<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter link" name="link" autocomplete="off" autofocus value="{{ $menus->link }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="type" class="control-label">Type <span class="text-danger">*</span></label>
          <select class="form-control" name="type" id="type">
            {{-- <option value="">Select Type</option> --}}
            @foreach ($modelhastypes as $key => $data)
            <option value="{{ $data->id }}" {{ $menus->type == $data->id ? 'selected' : ''}}>
              {{$data->type}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="page">Page<span class="text-danger">*</span></label>
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
<script>
    function Check(value) {
      var y = value.checked;
      console.log(y);
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
