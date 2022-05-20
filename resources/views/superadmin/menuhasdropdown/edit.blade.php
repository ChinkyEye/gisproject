@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 8, strpos(str_replace('manager.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
          <p class="text-danger m-0">Edit on {{$edit_value}}</p>
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
          @error('name_np')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_np">Name Np<span class="text-danger">*</span></label>
          <input type="text"  class="form-control max" id="name_np" placeholder="Enter menu name in Nepali" name="name_np" autocomplete="off" value="{{ $menuhasdropdowns->name_np }}">
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
            <option value="Niti" {{ $menuhasdropdowns->model == 'Niti' ? 'selected' : ''}}>Niti</option>
            <option value="About" {{ $menuhasdropdowns->model == 'About' ? 'selected' : ''}}>About</option>
            <option value="Pratibedan" {{ $menuhasdropdowns->model == 'Pratibedan' ? 'selected' : '' }}>Pratibedan</option>
            <option value="TblRemoteNotice" {{ $menuhasdropdowns->model == 'TblRemoteNotice' ? 'selected' : ''}}>Notice</option>
            <option value="TblRemoteYearlyBudget" {{ $menuhasdropdowns->model == 'TblRemoteYearlyBudget' ? 'selected' : ''}}>Yearly Budget</option>
            {{-- <option value="Notice" {{ $menuhasdropdowns->model == 'Notice' ? 'selected' : '' }}>Notice</option>  --}}
            <option value="Mission" {{ $menuhasdropdowns->model == 'Mission' ? 'selected' : '' }}>Mission</option>  
            <option value="Vision" {{ $menuhasdropdowns->model == 'Vision' ? 'selected' : '' }}>Vision</option> 
            <option value="Gallery" {{ $menuhasdropdowns->model == 'Gallery' ? 'selected' : '' }}>Gallery</option>  
            <option value="SangathanSanrachana" {{ $menuhasdropdowns->model == 'SangathanSanrachana' ? 'selected' : '' }}>Sangathan Sanrachana</option>  
            <option value="Department" {{ $menuhasdropdowns->model == 'Department' ? 'selected' : '' }}>Bivagh/Karyalaya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="text"  class="form-control max" id="link" placeholder="Enter menu name" name="link" autocomplete="off" value="{{ $menuhasdropdowns->link }}">
          @error('link')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="type" class="control-label">Type</label>
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
          <label for="select_model">Page</label>
          <select class="form-control" name="page" id="page">
           <option value="" selected disabled>-----Select Page------</option>
           <option value="table" {{ $menuhasdropdowns->page == 'table' ? 'selected' : ''}}>Table</option>
           <option value="background" {{ $menuhasdropdowns->page == 'background' ? 'selected' : ''}}>Background</option>
           <option value="gallery-folder" {{ $menuhasdropdowns->page == 'galary-folder' ? 'selected' : ''}}>Gallery</option>
           <option value="contactus" {{ $menuhasdropdowns->page == 'contactus' ? 'selected' : ''}}>Contact us</option>
           <option value="detail" {{ $menuhasdropdowns->page == 'detail' ? 'selected' : ''}}>Detail</option>
           <option value="view-more" {{ $menuhasdropdowns->page == 'view-more' ? 'selected' : ''}}>View More</option>
         </select>
       </div>
        <div class="form-group">
          <div class="row col-md-5">
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="checkbox" name="is_api" id="is_api" value="1" onchange="ApiCheck(this)" {{ $menuhasdropdowns->is_api == '1' ? 'checked' : ''}}>
              <label class="form-check-label" for="is_api">
                Is Api
              </label>
            </div>
          </div>
            @error('is_api')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div id="api_check" style="display:none">
          <div class="form-group">
            <label for="api_key">Api Key</label>
            <input type="text"  class="form-control max" id="api_key" placeholder="Enter Api Key" name="api_key" autocomplete="off" autofocus value="{{ $menuhasdropdowns->api_key }}">
            @error('api_key')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="quickmenu">Is Quick Menu</label>
          <div class="row col-md-5">
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="radio" name="is_quickmenu" id="yes" value="1"  {{ $menuhasdropdowns->is_quickmenu == "1" ? 'checked' : '' }} >
              <label class="form-check-label" for="is_quickmenu">
                Yes
              </label>
            </div>
            <div class="form-check-inline col-md">
              <input class="form-check-input" type="radio" name="is_quickmenu" id="no" value="0" {{ $menuhasdropdowns->is_quickmenu == "0" ? 'checked' : '' }}>
              <label class="form-check-label" for="is_quickmenu">
                No
              </label>
            </div>
          </div>
          @error('is_quickmenu')
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
@push('javascript')
<script type="text/javascript">
  $( document ).ready(function() {
    var x = document.getElementById("api_check");

    if(document.getElementById("is_api").checked)
    {
        x.style.display = "block";
    }
    else
    {
        x.style.display = "none";
    }

  });
</script>
<script>
  function ApiCheck(value) {
    var y = value.checked;
    var x = document.getElementById("api_check");
    if(y == true){
      x.style.display = "block";
    }
    else{
      x.style.display = "none";

    }

  };
</script>
@endpush
