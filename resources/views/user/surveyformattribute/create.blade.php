@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 5, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Survey Questions</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">{{ $page }} Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('user.surveyformattribute.store')}}" class="signup" id="signup" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <input type="hidden" name="form_id" value="{{$id}}">
        <div class="row" >
          <div class="form-group col-md-6">
            <label for="question">Question</label>
            <input  type="text"  class="form-control max" id="question" placeholder="Enter question" name="question" autocomplete="off" autofocus value="{{ old('question') }}">
            @error('question')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="type">Type<span class="text-danger">*</span></label>
            <select class="form-control max" id="type" name="type">
            <option>--Please choose one--</option>
            <option value="short">Short</option>
            <option value="number">Number</option>
            <option value="email">Email</option>
            <option value="long">Long</option>
            <option value="radio">Radio</option>
            <option value="dropdown">Dropdown</option>
            <option value="checkbox">Checkbox</option>
            <option value="date">Date</option>
            <option value="image">Image</option>
            <option value="pdf">Pdf</option>
            </select>
            @error('type')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            
          </div>

          
          {{-- <div class="form-group">
            <label for="description">Description<span class="text-danger">*</span></label>
            <textarea  type="text"  class="form-control max" id="description" placeholder="Enter description" name="description" rows="4" autocomplete="off" autofocus value="{{ old('description') }}"></textarea>
            @error('description')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> --}}
          
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
{{-- <script type="text/javascript">
  console.log('kk');
    var max_fields      = 14; 
    var x = 0;
    var wrapper         = $("#entry-table"); 
    $("body").on("click", "#add_more", function(event){
        if(x < max_fields){
            x++;
            var $cloned = $("#main-entry:first").clone();
            $cloned.append('<div class="remove_field input-group-btn"><a href="javascript:void(0)" class="btn btn-outline-danger btn-xs"><i class="fas fa-minus-circle"></i></a></div>').find("input[type='file']").val("");
            wrapper.append($cloned);
        }
        else
            alertify.alert("only max 15 entries");
    });
    wrapper.on("click",".remove_field", function(e){
        e.preventDefault(); $(this).parent('div').remove(); 
        x--;
    });
</script> --}}
@endpush
