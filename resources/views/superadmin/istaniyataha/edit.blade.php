@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Edit {{ $page }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('superadmin.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">{{ $page }} Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <form role="form" method="POST" action="{{route('superadmin.istaniyataha.update', $datas->id)}}" enctype="multipart/form-data">
     @method('PATCH')
     @csrf
     <div class="modal-body" >
         <div class="form-group">
          <label for="metropolitan">Metropolitan</label>
          <input type="text"  class="form-control max" id="metropolitan" placeholder="Enter total metropolitan" name="metropolitan" autocomplete="off" autofocus value="{{ $datas->metropolitan}}">
          @error('metropolitan')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="sub_metropolitan">Sub Metropolitan</label>
          <input type="text"  class="form-control max" id="sub_metropolitan" placeholder="Enter total sub_metropolitan" name="sub_metropolitan" autocomplete="off" autofocus value="{{ $datas->sub_metropolitan }}">
          @error('sub_metropolitan')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>  
        <div class="form-group">
          <label for="municipalities">Municipalities</label>
          <input type="text"  class="form-control max" id="municipalities" placeholder="Enter total municipalities" name="municipalities" autocomplete="off" autofocus value="{{ $datas->municipalities}}">
          @error('municipalities')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>  
        <div class="form-group">
          <label for="rural_municipalities">Rulal Municipalities</label>
          <input type="text"  class="form-control max" id="rural_municipalities" placeholder="Enter total rural_municipalities" name="rural_municipalities" autocomplete="off" autofocus value="{{ $datas->rural_municipalities }}">
          @error('rural_municipalities')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
        <div class="form-group">
          <label for="forest_area">Forest Area</label>
          <input type="text"  class="form-control max" id="forest_area" placeholder="Enter total forest_area" name="forest_area" autocomplete="off" autofocus value="{{ $datas->forest_area }}">
          @error('forest_area')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>  
        <div class="form-group">
          <label for="population">Population</label>
          <input type="text"  class="form-control max" id="population" placeholder="Enter total population" name="population" autocomplete="off" autofocus value="{{$datas->population}}">
          @error('population')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>  
        <div class="form-group">
          <label for="agricultural_land">Agricultural Land</label>
          <input type="text"  class="form-control max" id="agricultural_land" placeholder="Enter total agricultural_land" name="agricultural_land" autocomplete="off" autofocus value="{{ $datas->agricultural_land }}">
          @error('agricultural_land')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
        <div class="form-group">
          <label for="tourists_site">Tourists Site</label>
          <input type="text"  class="form-control max" id="tourists_site" placeholder="Enter total tourists_site" name="tourists_site" autocomplete="off" autofocus value="{{ $datas->tourists_site }}">
          @error('tourists_site')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
        <div class="form-group">
          <label for="electricity_dev">Electricity Development Sector</label>
          <input type="text"  class="form-control max" id="electricity_dev" placeholder="Enter total electricity development sector" name="electricity_dev" autocomplete="off" autofocus value="{{ $datas->electricity_dev}}">
          @error('electricity_dev')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="district">District</label>
          <input type="text"  class="form-control max" id="district" placeholder="Enter total district" name="district" autocomplete="off" autofocus value="{{ $datas->district }}">
          @error('district')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
        <div class="form-group">
          <label for="wada">Wada</label>
          <input type="text"  class="form-control max" id="wada" placeholder="Enter total wada" name="wada" autocomplete="off" autofocus value="{{ $datas->wada }}">
          @error('wada')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="industries">Industries</label>
          <input type="text"  class="form-control max" id="industries" placeholder="Enter total industries" name="industries" autocomplete="off" autofocus value="{{ $datas->industries }}">
          @error('industries')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>


    </div>
    <div class="modal-footer justify-content-between">
      <button type="submit" class="btn btn-info text-capitalize">Update</button>
    </div>
  </form>
</div>
</section>
@endsection