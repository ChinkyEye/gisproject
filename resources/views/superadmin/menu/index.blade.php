@extends('superadmin.main.app')
@push('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"/>
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <p class="text-danger m-0">Menu List</p>
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
                    <a href="{{route('superadmin.menu.create')}}" class="btn btn-flat btn-sm btn-danger btn-block text-capitalize" style="color:#fff">Add {{ $page }} <i class="fas fa-plus fa-fw"></i></a>
                  </div>
                  <div class="col-md">
                    <i class="float-right">Drap & drop for sorting.</i>
                  </div>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-sm table-bordered table-hover mb-0">
                    <thead class="thead-dark" style="text-align: center">                  
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Name Nepali</th>
                        <th>Type</th>
                        <th>Model</th>
                        <th>Link</th>
                        <th>Page</th>
                        <th>Sub menu</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center" id="menu" class="sortable">
                      @foreach($menus as $key => $menu)
                      <tr id="{{$menu->id}}" class="{{$menu->is_active == 1 ? '' : 'table-danger'}}">
                        <td>{{$key + 1}}</td>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->name_np}}</td>
                        <td>{{$menu->getModelType->type}}</td>
                        <td>{{$menu->model}}</td>
                        <td>{{$menu->link}}</td>
                        @if($menu->link == '/')
                        <td>welcome</td>
                        @else
                        <td>{{$menu->page}}</td>
                        @endif
                        <td>
                          @if($menu->is_main)
                          Yes
                          @else
                          No
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('superadmin.menu.active',$menu->id) }}" data-placement="top" title="{{ $menu->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                            <i class="nav-icon fas {{ $menu->is_active == '1' ? 'fa-check-circle':'fa-times-circle text-danger'}}"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('superadmin.menu.edit',$menu->id) }}" class="btn btn-sm btn-outline-info" title="Update"><i class="fas fa-edit"></i></a>
                          @if($menu->is_main)
                          <a href="{{ route('superadmin.menuhasdropdown.index',$menu->id) }}" class="btn btn-sm btn-outline-info" title="Add menu Schedule">
                            <i class="fas fa-plus">{{$menu->parent->count()}}</i>
                          </a>
                          @endif

                          <form action='javascript:void(0)' data_url="{{route('superadmin.menu.destroy',$menu->id)}}" method='post' class='d-inline-block mb-0'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <input name='_method' type='hidden' value='DELETE'>
                            <button class='btn btn-sm btn-outline-danger' type='submit' ><i class='fa fa-trash'></i></button>
                          </form>
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
    $(function(){
      $("#menu").sortable({
        stop: function(){
          $.map($(this).find('tr'), function(el) {
            var itemID = el.id;
            var itemIndex = $(el).index();
            $.ajax({
              url:"{{route('superadmin.order-menu')}}",
              type:'GET',
              dataType:'json',
              data: {itemID:itemID, itemIndex: itemIndex},
            });
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

@endpush
