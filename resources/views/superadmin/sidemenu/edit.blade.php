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
            <option value="" selected disabled>--Select--</option>

            <option value="PradeshSarkar" {{ $sidemenus->model == 'PradeshSarkar' ? 'selected' : ''}}>PradeshSarkar</option>
            <option value="MantralayaHasUser" {{ $sidemenus->model == 'MantralayaHasUser' ? 'selected' : ''}}>Mantralaya</option>
            <option value="PradeshSabhaSadasya" {{ $sidemenus->model == 'PradeshSabhaSadasya' ? 'selected' : ''}}>Pradesh Sabha Sadasya</option>
            <option value="Eservice" {{ $sidemenus->model == 'Eservice' ? 'selected' : ''}}>Eservice</option>
            <option value="HelloCM" {{ $sidemenus->model == 'HelloCM' ? 'selected' : ''}}>HelloCM</option>
            <option value="TblRemoteCorePerson">Api Mantri Parisadh</option>
            <option value="TblRemoteCorePerson">Api KaryalayaPramukh</option>
            <option value="ImportantPlace" {{ $sidemenus->model == 'ImportantPlace' ? 'selected' : ''}}>Important Places</option>
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
        <div class="form-group">
          <label for="page">Page</label>
          <select id="nationality" class="form-control" name="page" id="page">
            <option value="" disabled selected>--Select--</option>
            <option value="background" {{ $sidemenus->page == 'background' ? 'selected' : ''}}>Background</option>
            <option value="mantralaya-detail" {{ $sidemenus->page == 'mentralaya-detail' ? 'selected' : ''}}>Mantralaya Detail</option>
            <option value="mantriparishad" {{ $sidemenus->page == 'mantriparishad' ? 'selected' : ''}}>Mantriparishad</option>
            <option value="block" {{ $sidemenus->page == 'block' ? 'selected' : ''}}>Block</option>
            <option value="eservice" {{ $sidemenus->page == 'eservice' ? 'selected' : ''}}>Eservice</option>
            <option value="table" {{ $sidemenus->page == 'table' ? 'selected' : ''}}>Table</option>
            <option value="hellocm" {{ $sidemenus->page == 'hellocm' ? 'selected' : ''}}>HelloCM</option>
            <option value="important-place" {{ $sidemenus->page == 'important-place' ? 'selected' : ''}}>Important Place</option>
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
