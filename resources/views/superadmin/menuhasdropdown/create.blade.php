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
          <label for="dropdown_name">Name<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="dropdown_name" placeholder="Enter menu dropdown name" name="name" autocomplete="off" autofocus value="{{ old('dropdown_name') }}">
          @error('dropdown_name')
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
          <label for="model_data">Model<span class="text-danger">*</span></label>
          <select id="nationality" class="form-control" name="model" id="modal">
            <option value="">--Select--</option>
            <option value="Niti">Niti</option>
            <option value="About">About</option>
            <option value="Pratibedan">Pratibedan</option>
            <option value="Notice">Notice</option>
          </select>
        </div>
        <div class="form-group">
          <label for="link">Link<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter menu name" name="link" autocomplete="off" autofocus value="{{ old('link') }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        {{-- <div class="form-group">
          <div class="row col-md-5">
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="is_main" id="is_main" value="1"  >
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
        </div> --}}
        <div class="form-group">
          <label for="type" class="control-label">Type <span class="text-danger">*</span></label>
          <select class="form-control" name="type" id="type">
            {{-- <option value="">Select Type</option> --}}
            @foreach ($modelhastypes as $key => $data)
            <option value="{{ $data->id }}" {{ old('type') == $data->id ? 'selected' : ''}}>
              {{$data->type}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="page">Page<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="page" placeholder="Enter menu name" name="page" autocomplete="off" autofocus value="{{ old('page') }}">
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
