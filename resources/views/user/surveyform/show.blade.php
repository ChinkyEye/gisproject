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
              <th>Questions</th>
              <th>Type</th>
              <th class="text-center">Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="menu" class="sortable">
            @foreach($datas as $key => $data)
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
