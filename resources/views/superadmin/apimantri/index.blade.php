@extends('superadmin.main.app')
@push('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"/>
@endpush
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <p class="text-danger m-0">Mantri List</p>
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
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead class="thead-dark" style="text-align: center">                  
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>image</th>
                      <th>Post</th>
                      <th>Ministry</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center" id="apimantri" class="sortable">
                    @foreach($datas as $key => $data)
                    <tr id="{{$data->id}}" class="{{$data->is_active == 1 ? '' : 'table-danger'}}">
                      <td>{{$key + 1}}</td>
                      <td>{!! $data->name !!}</td>
                      <td>
                       <img src="{{ $data->image == null ? asset('images/no-image-user.png') : $data->image  }}" alt="" class="responsive" width="50" height="50">
                      </td>
                      <td>{{$data->post}}</td>
                      <td>{{$data->ministry}}</td>
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
    $(function(){
      $("#apimantri").sortable({
        stop: function(){
          $.map($(this).find('tr'), function(el) {
            var itemID = el.id;
            var itemIndex = $(el).index();
            $.ajax({
              url:"{{route('superadmin.apimantri-sort')}}",
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

