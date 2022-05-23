@extends('superadmin.main.app')
@push('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <p class="text-danger m-0">Add Dropdown on {{$menu_name}}</p>
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
        <section class="col-lg-12">
          <!-- main page load here-->
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-2">
                  <a href="{{route('superadmin.menuhasdropdown.create',$menus->id)}}" class="btn btn-flat btn-danger btn-block text-capitalize" style="color:#fff">Add Dropdown <i class="fas fa-plus fa-fw"></i></a>
                </div>
                <div class="col-md-10">
                  {{-- <input type="text" class="form-control" placeholder="Search by name"> --}}
                </div>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead class="thead-dark">                  
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Name Nepali</th>
                      <th>Model</th>
                      <th>Link</th>
                      <th>Type</th>
                      <th>Page</th>
                      <th>Is Api</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="connectedSortable" id="padding-item-drop">
                   @if(!empty($menuhasdropdowns) && $menuhasdropdowns->count())
                    @foreach($menuhasdropdowns as $key => $menuhasdropdown)
                    <tr class="{{$menuhasdropdown->is_active == 1 ? '' : 'table-danger'}}" item-id="{{ $menuhasdropdown->id }}">
                      <td>{{$key + 1}}</td>
                      <td>{{$menuhasdropdown->name}}</td>
                      <td>{{$menuhasdropdown->name_np}}</td>
                      <td>{{$menuhasdropdown->model}}</td>
                      <td>{{$menuhasdropdown->link}}</td>
                      <td>{{$menuhasdropdown->getModelType->type}}</td>
                      <td>{{$menuhasdropdown->page}}</td>
                       <td>
                          @if($menuhasdropdown->is_api)
                          Yes
                          @else
                          No
                          @endif
                        </td>
                      <td>
                        <a href="{{ route('superadmin.menuhasdropdown.active',$menuhasdropdown->id) }}" data-placement="top" title="{{ $menuhasdropdown->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                          <i class="nav-icon fas {{ $menuhasdropdown->is_active == '1' ? 'fa-check-circle':'fa-times-circle text-danger'}}"></i>
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('superadmin.menuhasdropdown.edit',$menuhasdropdown->id) }}" class="btn btn-xs btn-outline-info" title="Update"><i class="fas fa-edit"></i></a>
                        <form action='javascript:void(0)' data_url="{{route('superadmin.menuhasdropdown.destroy',$menuhasdropdown->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                          <input type='hidden' name='_token' value='".csrf_token()."'>
                          <input name='_method' type='hidden' value='DELETE'>
                          <button class='btn btn-xs btn-outline-danger' type='submit' ><i class='fa fa-trash'></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              {{-- {!! $menuhasdropdowns->links() !!} --}}
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
 {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script> --}}
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
 <script>
  $( function() {
    $( "#padding-item-drop, #complete-item-drop" ).sortable({
      connectWith: ".connectedSortable",
      opacity: 0.5,
    });
    $( ".connectedSortable" ).on( "sortupdate", function( event, ui ) {
      var pending = [];
      $("#padding-item-drop tr").each(function( index ) {
        if($(this).attr('item-id')){
          pending[index] = $(this).attr('item-id');
        }
      });
      $.ajax({
        url: "{{ route('superadmin.update.items') }}",
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {pending:pending},
        success: function(data) {
          console.log('success');
        }
      });

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
