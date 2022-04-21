@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <p class="text-danger m-0">Add {{$page}}</p>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.sidemenu.store')}}">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label for="name">Name<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter menu name" name="name" autocomplete="off" autofocus value="{{ old('name') }}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_np">Name Np<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name_np" placeholder="Enter menu name in Nepali" name="name_np" autocomplete="off" value="{{ old('name_np') }}">
          @error('name_np')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="model_data">Model</label>
          <select id="nationality" class="form-control" name="model" id="modal">
            <option value="">--Select--</option>
            <option value="PradeshSarkar">PradeshSarkar</option>
            <option value="MantralayaHasUser">Mantralaya</option>
            <option value="PradeshSabhaSadasya">Pradesh Sabha Sadasya</option>
            <option value="Eservice">Eservice</option>
            <option value="HelloCM">HelloCM</option>
            <option value="TblRemoteCorePerson">KaryalayaPramukh</option>
            <option value="ImportantPlace">Important Places</option>
          </select>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter link" name="link" autocomplete="off" autofocus value="{{ old('link') }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="page">Page</label>
          <select id="nationality" class="form-control" name="page" id="page">
            <option value="" disabled selected>--Select--</option>
            <option value="background">Background</option>
            <option value="mantralaya-detail">Mantralaya Detail</option>
            <option value="mantriparishad">Mantriparishad</option>
            <option value="block">Block</option>
            <option value="eservice">Eservice</option>
            <option value="sidemenu-table">Table</option>
            <option value="hellocm">HelloCM</option>
            <option value="important-place">Important Place</option>
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
