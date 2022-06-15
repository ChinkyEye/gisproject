@extends('user.main.app')
@push('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"/>
<style>
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
@endpush
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('user.','',Route::currentRouteName()), ".")); ?>
<div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <p class="text-danger m-0">Survey</p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- main page load here-->
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-2">
                    <a href="{{route('user.surveyform.create')}}" class="btn btn-flat btn-danger btn-block text-capitalize" style="color:#fff">Add Survey<i class="fas fa-plus fa-fw"></i></a>
                  </div>
                  <div class="col-md-10">
                  </div>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-bordered table-hover">
                    <thead class="thead-dark" style="text-align: center">                  
                      <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Questions Count</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead> 
                    <tbody id="menu" class="sortable" style="text-align: center">
                      @foreach($datas as $key => $data)
                      <tr id="{{$data->id}}" class="{{$data->is_active == 1 ? '' : 'table-danger'}}">
                        <td>{{$key + 1}}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                          <a href="{{ route('user.surveyform.show',$data->id) }}" title="View question"><i class="fas fa-eye "></i></a>
                          {{ $data->getSurveyQuestion->count()}}
                        </td>
                        <td>
                          <a href="{{ route('user.surveyform.getsurveyuser',$data->slug) }}" title="View Answer"><i class="fas fa-eye"></i></a>
                          {{ $data->getSurveyAnswer->count()}}
                        </td>
                        <td>
                          <a href="{{ route('user.surveyform.active',$data->id) }}" data-placement="top" title="{{ $data->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                            <i class="nav-icon fas {{ $data->is_active == '1' ? 'fa-check-circle':'fa-times-circle text-danger'}}"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('user.surveyform.edit',$data->id) }}" class="btn btn-xs btn-outline-info" title="Update"><i class="fas fa-edit"></i></a>
                          <a href="{{ route('user.surveyform.attribute',$data->id) }}" class="btn btn-xs btn-outline-info" title="Update"><i class="fas fa-plus"></i></a>
                          <form action='javascript:void(0)' data_url="{{route('user.surveyform.destroy',$data->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <input name='_method' type='hidden' value='DELETE'>
                            <button class='btn btn-xs btn-outline-danger' type='submit' ><i class='fa fa-trash'></i></button>
                          </form>
                          
                          {{--  <a href="{{ route('web.survey.question',$data->slug) }}" id="surveylink" class="btn btn-xs btn-outline-info" title="Update" value="{{ route('web.survey.question',$data->slug) }}"><i class="fa fa-copy"></i></a> --}}
                          <div class="border border-dark d-inline-block">
                            <span id="pwd_spn" class="password-span">{{ route('web.survey.question',$data->slug) }}</span>
                            <button class="btn btn-sm btn-outline-info" onclick="copyToClipboard({{ $data->id }})" title="copy link to clipboard"><i class="fas fa-copy"></i></button>
                          </div>

                           {{--  <input type="text" id="copy_{{ $data->id }}" value="{{ route('web.survey.question',$data->slug) }}">
                            <button value="copy" class="btn btn-sm btn-outline-info" onclick="copyToClipboards('copy_{{ $data->id }}')" title="copy link to clipboard"><i class="fas fa-copy"></i></button> --}}
                            
                          {{--  <input id="input-txt"  type="text" value="{{ route('web.survey.question',$data->slug) }}">
                           <button class="btn" data-clipboard-target="#surveylink">Copy</button>

                           <textarea id="txtarea">clipboard.js is simple.</textarea>
                           <button class="btn" data-clipboard-target="#txtarea">Copy</button>

                           {{-- <input type="text" value="{{$data->slug}}" id="link">
                           <button class="btn" data-clipboard-target="#link">Copy</button> --}}

                          {{--  <span id="sample" value="{{$data->slug}}">{{$data->slug}}</span>
                           <a href="#" onclick="CopyToClipboard({{$data->id}});return false;">Copy Text</a> --}}



                          
                          
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
@push('javascript')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script type="text/javascript">
    var Clipboard = new ClipboardJS('.btn');
</script>

<script>
function CopyToClipboard(id) {
  var copyText = document.getElementById("link");
  // console.log('hello');
  // console.log(copyText);
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
</script>
{{-- <script>
function CopyToClipboard(id)
{
  console.log(id);
var r = document.createRange();
r.selectNode(document.getElementById(id));
window.getSelection().removeAllRanges();
window.getSelection().addRange(r);
document.execCommand('copy');
window.getSelection().removeAllRanges();
}
</script> --}}

{{-- <script>
    function copyToClipboards(id) {
        document.getElementById(id).select();
        console.log(document.getElementById(id));
        document.execCommand('copy');
    }
</script> --}}

<script type="text/javascript">
   function copyToClipboard(id) {
    var copyText = document.getElementById("pwd_spn");
    var textArea = document.createElement("textarea");
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    textArea.remove();
    }
</script>
@endpush
