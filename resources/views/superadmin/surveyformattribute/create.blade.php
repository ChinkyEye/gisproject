@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 5, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Survey Questions</h1>
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
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('superadmin.surveyformattribute.store')}}" class="signup" id="signup" enctype="multipart/form-data">
      <div class="card-body" id="entry-table">
        @csrf
        <input type="hidden" name="form_id" value="{{$id}}">
        <div class="row" id="main-entry">
         {{--  <div class="form-group col-md-6">
            <label for="question">Question</label>
            <input  type="text"  class="form-control max" id="question" placeholder="Enter question" name="question" autocomplete="off" autofocus value="{{ old('question') }}">
            @error('question')
            <span class="text-danger font-italic" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> --}}
          <div class="form-group col-md-6">
          <label for="question">Question</label>
          <input type="text" class="form-control form-control-border" id="question" placeholder="Enter questions" name="question">
          </div>
          <div class="form-group col-md-4">
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

          <div id="replaceTable">
            
          </div>
          
          
          <div class="form-group col-md-6">
          <label for="min">Min</label>
          <input type="number" class="form-control form-control-border" id="min" placeholder="Enter min length" name="min">
          </div>

          <div class="form-group col-md-6">
          <label for="max">Max</label>
          <input type="number" class="form-control form-control-border" id="max" placeholder="Enter max" name="max">
          </div>
          <div class="form-group">
          
          </div>
          
          
          <div class="input-group-btn"> 
            {{-- <button type="button" name="add" id="add_more" class="btn btn-xs btn-outline-primary"><i class="fas fa-plus"></i></button> --}}
          </div>
        </div>
        
      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Save</button>
        <div class="float-right">
          <div class="custom-control custom-switch">
          <input type="checkbox" name="is_required" class="custom-control-input" id="customSwitch1">
          <label class="custom-control-label" for="customSwitch1">is required</label>
          </div>
          {{-- <a href="" class="btn btn-xs" title="Update"><i class="fas fa-trash"></i></a> --}}
          
        </div>
        
      </div>
    </form>
  </div>
</section>
@endsection
@push('javascript')
{{-- <script type="text/javascript">
    var max_fields      = 14; 
    var x = 0;
    var wrapper         = $("#entry-table"); 
    $("body").on("click", "#add_more", function(event){
      console.log('ll');
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

<script type="text/javascript">
    var max_fields      = 14; 
    var x = 0;
    var wrapper         = $("#radio-entry-table"); 
    $("body").on("click", "#radio_more", function(event){
      console.log('kkkkradiobuttons');
        if(x < max_fields){
            x++;
            var $cloned = $("#radio-main-entry:first").clone();
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
</script>

<script type="text/javascript">
  $("body").on("change","#type", function(event){
    var type = $('#type').val(),
        token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type:"GET",
          dataType:"html",
          url: "{{route('superadmin.survey.getType')}}",
          data: {
            _token: token,
            type: type,
          },
          success:function(response){
            $('#replaceTable').html("");
            $('#replaceTable').html(response);
          },
          error: function (e) {
            alert('Sorry! we cannot load data this time');
            return false;
          }
        });
   
  });
</script>
@endpush
