@extends('user.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize"></h1>
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
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th width="20">SN</th>
              <th>Question</th>
              <th>Type</th>
              <th class="text-center">Status</th>
              <th>Action</th>
            </tr>
          </thead>
          {{-- <form role="form" method="POST" action="{{route('user.surveyattribute.edit')}}" enctype="multipart/form-data">
            
          </form> --}}

          <tbody id="menu" class="sortable">
           {{--  @foreach($datas as $key => $data)
            <tr  id="{{$data->id}}" class="{{$data->is_active == 1 ? '' : 'table-danger'}}">
              <td><a>{{$key + 1}}</a></td>
              <td>{{$data->question}}</td>
            
              <td>{{$data->type}}</td>
              <td class="text-center">
                <a href="{{ route('user.surveyformquestion.active',$data->id) }}" data-placement="top" title="{{ $data->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                  <i class="nav-icon fas {{ $data->is_active == '1' ? 'fa-check-circle':'fa-times-circle text-danger'}}"></i>
                </a>
              </td>
              <td>  
                <a href="{{ route('user.surveyformattribute.edit',$data->id) }}" class="btn btn-xs btn-outline-info" title="Update"><i class="fas fa-edit"></i>
                </a>
                <form action='javascript:void(0)' data_url="{{route('user.surveyformattribute.destroy',$data->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                  <input type='hidden' name='_token' value='".csrf_token()."'>
                  <input name='_method' type='hidden' value='DELETE'>
                  <button class='btn btn-xs btn-outline-danger' type='submit' ><i class='fa fa-trash'></i></button>
                </form>
              </td>
            </tr>
            @endforeach --}}

            @section('content')
            <?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6 pl-1">
                    <h1 class="text-capitalize"></h1>
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
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th width="20">SN</th>
                          <th>Question</th>
                          <th>Type</th>
                        </tr>
                      </thead>
                      <tbody id="menu" class="sortable">
                        @foreach($datas as $key => $data)
                          <input type="hidden" class="token" name="_token" value="{{ csrf_token() }}" />
                        <tr  id="{{$data->id}}" class="{{$data->is_active == 1 ? '' : 'table-danger'}}">
                          <td><a>{{$key + 1}}</a></td>
                          <td><input type="text" class="clickable sort" name="report_id" id="{{$data->id}}" value="{{$data->question}}" readonly="true"> <span>{{($data->is_required == '1') ? '*' : ""}} </span>
                            


                            @if($data->type == 'radio')

                            <div class="row col-md-12">

                              @foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choiceradio)
                              <div class="form-check-inline col-md">
                                <input type="{{$data->type}}" class="form-check-inline" id="{{$choiceradio->choice}}" value="{{$choiceradio->choice}}" {{($data->is_required == '1') ? 'required' : ""}}>
                                <label class="form-check-label" for="{{$choiceradio->choice}}"><input type="text" class="clickablesurveychoice sortchoice" name="report_id" id="{{$choiceradio->id}}" value="{{$choiceradio->choice}}" readonly="true"></label>

                                <form action='javascript:void(0)' data_url="{{route('user.surveyformchoice.destroy',$choiceradio->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                                  <input type='hidden' name='_token' value='".csrf_token()."'>
                                  <input name='_method' type='hidden' value='DELETE'>
                                  <button class='btn btn-xs' type='submit' ><i class='fa fa-trash'></i></button>
                                </form>
                                {{-- <a href="">delte</a> --}}
                              </div>
                              @endforeach
                            </div>
                            <div>
                              <form role="form" method="POST" action="{{route('user.addsurveyformchoice.store')}}" class="signup" id="signup" enctype="multipart/form-data">
                                @csrf
                                 <input type="hidden" value="{{$data->id}}" name="surveyformattr_id">
                                <div id="entry-table">
                                  <div class="col-md-6 row radio-entry-table mb-1" id="main-entry">
                                    <div class="input-group col-md">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <input type="radio"  checked>
                                        </div>
                                      </div>
                                      <input type="text" class="form-control form-control-border" placeholder="Enter Op" name="radiooption[]">
                                    </div>
                                     
                                    <button type="button" name="radio" id="add_more" class="btn btn-xs btn-outline-primary add_more"><i class="fas fa-plus"></i></button>
                                  {{--   <button type="button" name="radio" id="radio_remove" class="btn btn-xs btn-outline-danger radio_remove"><i class="fas fa-minus"></i></button> --}}
                                  </div>
                                  
                                </div>
                                <button type="submit" class="btn btn-info text-capitalize">Save</button>
                              </form>
                            </div>

                            @elseif($data->type == 'dropdown')

                            <div class="row col-md-12">

                              @foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choiceradio)
                              <div class="form-check-inline col-md">
                                <input type="checkbox" class="form-check-inline" id="{{$choiceradio->choice}}" value="{{$choiceradio->choice}}" {{($data->is_required == '1') ? 'required' : ""}}>
                                <label class="form-check-label" for="{{$choiceradio->choice}}"><input type="text" class="clickablesurveychoice sortchoice" name="report_id" id="{{$choiceradio->id}}" value="{{$choiceradio->choice}}" readonly="true"></label>

                                <form action='javascript:void(0)' data_url="{{route('user.surveyformchoice.destroy',$choiceradio->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                                  <input type='hidden' name='_token' value='".csrf_token()."'>
                                  <input name='_method' type='hidden' value='DELETE'>
                                  <button class='btn btn-xs' type='submit' ><i class='fa fa-trash'></i></button>
                                </form>
                                {{-- <a href="">delte</a> --}}
                              </div>
                              @endforeach
                            </div>
                            <div>
                              <form role="form" method="POST" action="{{route('user.addsurveyformchoice.store')}}" class="signup" id="signup" enctype="multipart/form-data">
                                @csrf
                                 <input type="hidden" value="{{$data->id}}" name="surveyformattr_id">
                                <div id="entry-table">
                                  <div class="col-md-6 row radio-entry-table mb-1" id="main-entry">
                                    <div class="input-group col-md">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <input type="radio"  checked>
                                        </div>
                                      </div>
                                      <input type="text" class="form-control form-control-border" placeholder="Enter Op" name="radiooption[]">
                                    </div>
                                     
                                    <button type="button" name="radio" id="add_more" class="btn btn-xs btn-outline-primary add_more"><i class="fas fa-plus"></i></button>
                                  {{--   <button type="button" name="radio" id="radio_remove" class="btn btn-xs btn-outline-danger radio_remove"><i class="fas fa-minus"></i></button> --}}
                                  </div>
                                  
                                </div>
                                <button type="submit" class="btn btn-info text-capitalize">Save</button>
                              </form>
                            </div>
                            

                            
                            @elseif($data->type == 'checkbox')

                            <div class="row col-md-12">

                              @foreach($data->getSurveyChoice()->where('is_active','1')->get() as $choiceradio)
                              <div class="form-check-inline col-md">
                                <input type="{{$data->type}}" class="form-check-inline" id="{{$choiceradio->choice}}" value="{{$choiceradio->choice}}" {{($data->is_required == '1') ? 'required' : ""}}>
                                <label class="form-check-label" for="{{$choiceradio->choice}}"><input type="text" class="clickablesurveychoice sortchoice" name="report_id" id="{{$choiceradio->id}}" value="{{$choiceradio->choice}}" readonly="true"></label>

                                <form action='javascript:void(0)' data_url="{{route('user.surveyformchoice.destroy',$choiceradio->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                                  <input type='hidden' name='_token' value='".csrf_token()."'>
                                  <input name='_method' type='hidden' value='DELETE'>
                                  <button class='btn btn-xs' type='submit' ><i class='fa fa-trash'></i></button>
                                </form>
                                {{-- <a href="">delte</a> --}}
                              </div>
                              @endforeach
                            </div>
                            <div>
                              <form role="form" method="POST" action="{{route('user.addsurveyformchoice.store')}}" class="signup" id="signup" enctype="multipart/form-data">
                                @csrf
                                 <input type="hidden" value="{{$data->id}}" name="surveyformattr_id">
                                <div id="entry-table">
                                  <div class="col-md-6 row radio-entry-table mb-1" id="main-entry">
                                    <div class="input-group col-md">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <input type="radio"  checked>
                                        </div>
                                      </div>
                                      <input type="text" class="form-control form-control-border" placeholder="Enter Op" name="radiooption[]">
                                    </div>
                                     
                                    <button type="button" name="radio" id="add_more" class="btn btn-xs btn-outline-primary add_more"><i class="fas fa-plus"></i></button>
                                  {{--   <button type="button" name="radio" id="radio_remove" class="btn btn-xs btn-outline-danger radio_remove"><i class="fas fa-minus"></i></button> --}}
                                  </div>
                                  
                                </div>
                                <button type="submit" class="btn btn-info text-capitalize">Save</button>
                              </form>
                            </div>
                            @endif

                          </td>
                        
                          <td>{{$data->type}}
                            <form role="form" method="POST" action="{{route('user.survey.getSurveyAttributeUpdate')}}" class="signup" id="signup" enctype="multipart/form-data">
                              @csrf
                              <input type="text" name="id" value="{{$data->id}}">
                              <select class="form-control max" id="type" name="type">
                                <option value="">--Please choose one--</option>
                                <option value="short" {{$data->type == 'short' ? 'selected' : ''}}>Short Answer</option>
                                <option value="long" {{$data->type == 'textarea' ? 'selected' : ''}}>Long Answer</option>
                                <option value="url">URL</option>
                                <option value="number">Number</option>
                                <option value="email">Email</option>
                                <option value="radio">Radio</option>
                                <option value="dropdown">Dropdown</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="date">Date</option>
                                <option value="image">Image</option>
                              </select>
                              <div class="col-md-12" id="replaceTable">
                                
                              </div>
                              <button type="submit" class="btn btn-info text-capitalize" >Update</button>

                              
                              
                            </form>
                            
                            {{-- <button type="submit" class="btn btn-info text-capitalize" id="updateattribute" ids="{{$data->id}}">Update {{$data->id}}</button> --}}
                          </td>
                          

                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </section>
            @endsection
            @push('javascript')
             <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
             <script>
              $(function(){
                $("#menu").sortable({
                  stop: function(){
                    $.map($(this).find('tr'), function(el) {
                      var itemID = el.id;
                      var itemIndex = $(el).index();
                      $.ajax({
                        url:"{{route('user.survey-question')}}",
                        type:'GET',
                        dataType:'json',
                        data: {itemID:itemID, itemIndex: itemIndex},
                      });
                    });
                  }
                });
              });
            </script>
            @endpush

          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
 <script>
  $(function(){
    $("#menu").sortable({
      stop: function(){
        $.map($(this).find('tr'), function(el) {
          var itemID = el.id;
          var itemIndex = $(el).index();
          $.ajax({
            url:"{{route('user.survey-question')}}",
            type:'GET',
            dataType:'json',
            data: {itemID:itemID, itemIndex: itemIndex},
          });
        });
      }
    });
  });
</script>
<script type="text/javascript">
      $('.clickable').dblclick(function(event){
        $('input').prop("readonly", false );
        $(".sort").keydown(function (e) {
          if (e.which == 9){
            var id = $(event.target).attr('id'),
                token=$(".token").val(),
                val = $(event.target).val();
              $.ajax({
                type:"POST",
                dataType:"JSON",
                url:"{{URL::route('user.survey_form.edit')}}",
                data:{
                  _token:token,
                  id : id,
                  val:val,
                },
                success:function(e){
                    $('input').prop( "readonly", true );
                    alertify.alert(e.msg);
                  $('input').prop( "readonly", true );
                    location.reload();
                },
                error: function (e) {
                  $('input').prop( "readonly", true );
                  alertify.alert('Sorry! this data cannot be edited');
                }
              });
          }
        });
      });
    </script>
    <script type="text/javascript">
          $('.clickablesurveychoice').dblclick(function(event){
            $('input').prop("readonly", false );
            $(".sortchoice").keydown(function (e) {
              if (e.which == 9){
                var id = $(event.target).attr('id'),
                    token=$(".token").val(),
                    val = $(event.target).val();
                  $.ajax({
                    type:"POST",
                    dataType:"JSON",
                    url:"{{URL::route('user.survey_form_choice.edit')}}",
                    data:{
                      _token:token,
                      id : id,
                      val:val,
                    },
                    success:function(e){
                        $('input').prop( "readonly", true );
                        alertify.alert(e.msg);
                      $('input').prop( "readonly", true );
                        location.reload();
                    },
                    error: function (e) {
                      $('input').prop( "readonly", true );
                      alertify.alert('Sorry! this data cannot be edited');
                    }
                  });
              }
            });
          });
        </script>
    <script>
      function myFunction(el) {
        const url = $(el).attr('data_url');
          var token = $('meta[name="csrf-token"]').attr('content');
          swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
            dangerMode: true,
            closeOnClickOutside: false,
          }).then(function(value) {
            if(value == true){
              $.ajax({
                url: url,
                type: "POST",
                data: {
                  _token: token,
                  '_method': 'DELETE',
                },
                success: function (data) {
                  swal({
                    title: "Success!",
                    type: "success",
                    text: "Click OK",
                    icon: "success",
                    showConfirmButton: false,
                  }).then(location.reload(true));
                  
                },
                error: function (data) {
                  swal({
                    title: 'Opps...',
                    text: "Please refresh your page",
                    type: 'error',
                    timer: '1500'
                  });
                }
              });
            }else{
              swal({
                title: 'Cancel',
                text: "Data is safe.",
                icon: "success",
                type: 'info',
                timer: '1500'
              });
            }
          });
      }
    </script>

    <script type="text/javascript">
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
    </script>
    <script type="text/javascript">
       
        function cloningSection() {
          var clone = $(".radio-entry-table:first").clone();
          clone.find("input").val("");
          $("#radio-entry-table").after(clone);
        }

        function removeSection(e) {
            e.preventDefault();
            // $("#radio-entry-table:closest").remove();
            $(this).parent('#radio-entry-table').remove();
        }

        function cloningdropdownSection() {
          var clone = $(".dropdown-entry-table:first").clone();
          clone.find("input").val("");
          $("#dropdown-entry-table").after(clone);
        }


        
    </script>
    <script type="text/javascript">
      $("body").on("change","#type", function(event){
        var type = $('#type').val(),
            token = $('meta[name="csrf-token"]').attr('content');
            // console.log('kkkk');
            $.ajax({
              type:"GET",
              dataType:"html",
              url: "{{route('user.survey.getType')}}",
              data: {
                _token: token,
                type: type,
              },
              success:function(response){
                console.log(response);
                $('#replaceTable').html();
                $('#replaceTable').html(response);
                $("body").on("click", ".radio_more", function(event){
                  // debugger;
                  cloningSection();
                });
                $("body").on("click", ".radio-entry-table .radio_remove", function(event){
                // $("#radio-entry-table .radio_remove").click(function(e){
                  event.preventDefault();
                  $(this).parent().remove();
                });

                $("body").on("click", ".dropdown_more", function(event){
                  // debugger;
                  cloningdropdownSection();
                });
                $("body").on("click", ".dropdown-entry-table .dropdown_remove", function(event){
                // $("#radio-entry-table .radio_remove").click(function(e){
                  event.preventDefault();
                  $(this).parent().remove();
                });

              },
              error: function (e) {
                alert('Sorry! we cannot load data this time');
                return false;
              }
            });
       
      });
    </script><script type="text/javascript">
  $("body").on("change","#type", function(event){
    var type = $('#type').val(),
        token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type:"GET",
          dataType:"html",
          url: "{{route('user.survey.getType')}}",
          data: {
            _token: token,
            type: type,
          },
          success:function(response){
            // console.log('lll');
            $('#replaceTable').html();
            $('#replaceTable').html(response);
            $("body").on("click", ".radio_more", function(event){
              // debugger;
              cloningSection();
            });
            $("body").on("click", ".radio-entry-table .radio_remove", function(event){
            // $("#radio-entry-table .radio_remove").click(function(e){
              event.preventDefault();
              $(this).parent().remove();
            });

            $("body").on("click", ".dropdown_more", function(event){
              // debugger;
              cloningdropdownSection();
            });
            $("body").on("click", ".dropdown-entry-table .dropdown_remove", function(event){
            // $("#radio-entry-table .radio_remove").click(function(e){
              event.preventDefault();
              $(this).parent().remove();
            });

          },
          error: function (e) {
            alert('Sorry! we cannot load data this time');
            return false;
          }
        });
   
  });
</script>
    <script type="text/javascript">
      $("body").on("click","#updateattribute", function(event){
        var type = $('#type').val(),
            id = $(event.target).attr('ids'),
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              type:"GET",
              dataType:"html",
              url: "{{route('user.survey.getSurveyAttributeUpdate')}}",
              data: {
                _token: token,
                type: type,
                id: id,
              },
              success:function(response){
                // console.log(response,type);
                // if(type == 'short')
                $('#replaceTable').html();
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
