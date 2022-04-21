@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 8, strpos(str_replace('manager.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
            <p class="text-danger m-0">Edit {{$sidemenus->name}}</p>
          </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.sidemenu.update',$sidemenus->id)}}">
      <div class="card-body">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="name">Name:<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter sidemenu" name="name"  autocomplete="off" value="{{ $sidemenus->name }}">  @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_np">Name Np<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name_np" placeholder="Enter menu name in Nepali" name="name_np" autocomplete="off" value="{{ $sidemenus->name_np }}">
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
            <option value="Mantralaya" {{ $sidemenus->model == 'Mantralaya' ? 'selected' : ''}}>Mantralaya</option>
            <option value="HelloCM" {{ $sidemenus->model == 'HelloCM' ? 'selected' : ''}}>HelloCM</option>
            <option value="PradeshSabhaSanrachana" {{ $sidemenus->model == 'PradeshSabhaSanrachana' ? 'selected' : ''}}>PradeshSabhaSadasya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="link">Link<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter menu name" name="link" autocomplete="off" value="{{ $sidemenus->link }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        {{-- <div class="form-group">
          <label for="page">Page<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="page" placeholder="Enter menu name" name="page" autocomplete="off" value="{{ $sidemenus->page }}">
          @error('page')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> --}}
        <div class="form-group">
          <label for="page">Page</label>
          <select id="nationality" class="form-control" name="page" id="page">
            <option value="" disabled selected>--Select--</option>
            <option value="background">Background</option>
            <option value="mantralaya-detail">Mantralaya Detail</option>
            <option value="mantriparishad">Mantriparishad</option>
            <option value="block">Block</option>
            <option value="eservice">Eservice</option>
            <option value="table">Table</option>
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
        <button type="submit" class="btn btn-info text-capitalize">Update</button>
      </div>
    </form>
  </div>
</section>
@endsection
