@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 8, strpos(str_replace('manager.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h3 class="text-capitalize"><small> {{$menu_value->name}}</small></h3>
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
    <form role="form" method="POST" action="{{route('superadmin.menuhasdropdown.update',$menuhasdropdowns->id)}}">
      <div class="card-body">
        @csrf
        @method('PATCH')
        <input type="hidden" name="menu_id" id="menu_id" value="{{$menu_value->parent_id}}">
        <div class="form-group">
          <label for="dropdown_name">Name:<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="dropdown_name" placeholder="Enter Insurance Id" name="name"  autocomplete="off" value="{{ $menuhasdropdowns->name }}">
        </div>
        <div class="form-group">
          <label for="model_data">Model<span class="text-danger">*</span></label>
          <select id="nationality" class="form-control" name="model" id="modal">
            <option value="">--Select--</option>
            <option value="Niti" {{ $menuhasdropdowns->model == 'Niti' ? 'selected' : ''}}>Niti</option>
            <option value="About" {{ $menuhasdropdowns->model == 'About' ? 'selected' : ''}}>About</option>
            <option value="Pratibedan" {{ $menuhasdropdowns->model == 'Pratibedan' ? 'selected' : '' }}>Pratibedan</option>
            <option value="Notice" {{ $menuhasdropdowns->model == 'Notice' ? 'selected' : '' }}>Notice</option>
          </select>
        </div>
        <div class="form-group">
          <label for="link">Link<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter menu name" name="link" autocomplete="off" autofocus value="{{ $menuhasdropdowns->link }}">
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
            <option value="{{ $data->id }}" {{ $menuhasdropdowns->type == $data->id ? 'selected' : ''}}>
              {{$data->type}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="page">Page<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="page" placeholder="Enter menu name" name="page" autocomplete="off" autofocus value="{{ $menuhasdropdowns->page }}">
          @error('page')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Update</button>
      </div>
    </form>
  </div>
</section>
@endsection
