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
            <p class="text-danger m-0">Person List</p>
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
                  <div class="col-md-3">
                   {{--  <a href="{{route('superadmin.coreperson.create')}}" class="btn btn-flat btn-danger btn-inline-block text-capitalize" style="color:#fff">Add {{ $page }} <i class="fas fa-plus fa-fw"></i></a> --}}
                    <form action="{{route('superadmin.coreperson.create')}}" method="GET" class="d-inline-block">
                      <input type="hidden" id="model" name="model" value="{{ Request::segment(3) }} ">
                      <button type="submit" class="btn btn-flat btn-danger btn-inline-block text-capitalize" style="color:#fff">Add {{ $page }} <i class="fas fa-plus fa-fw"></i></button>
                    </form>

                    <a href="{{route('superadmin.modelhastype.index',last(request()->segments()) )}}" class="btn btn-info btn-inline-block text-capitalize"><i class="fas fa-plus fa-fw"></i>
                    </a>
                  </div>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-bordered table-hover">
                    <thead class="thead-dark">                  
                      <tr class="text-center">
                        <th width="10">SN</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Link</th>
                        <th>Post</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($corepersons as $key => $coreperson)
                      <tr class="{{$coreperson->is_active == 1 ? '' : 'table-danger'}} text-center">
                        <td>{{$key + 1}}</td>
                        <td>{{$coreperson->name}}</td>
                        <td>{{$coreperson->address}}</td>
                        {{-- <td>{{$coreperson->email}}</td> --}}
                        <td>{{$coreperson->phone}}</td>
                        <td>{{$coreperson->link}}</td>
                        <td>
                          {{$coreperson->getCorepersonType->type}}
                        </td>
                        <td>
                          <a href="{{ route('superadmin.coreperson.active',$coreperson->id) }}" data-placement="top" title="{{ $coreperson->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                            <i class="nav-icon fas {{ $coreperson->is_active == '1' ? 'fa-check-circle':'fa-times-circle text-danger'}}"></i>
                          </a>
                        </td>
                        <td>
                         <form action="{{route('superadmin.coreperson.edit',$coreperson->id)}}" method="GET" class="d-inline-block">
                          <input type="hidden" id="model" name="model" value="{{ Request::segment(3) }} ">
                          <button type="submit" class="btn btn-xs btn-outline-info"><i class="fas fa-edit"></i></button>
                        </form>

                          <form action='javascript:void(0)' data_url="{{route('superadmin.coreperson.destroy',$coreperson->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
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
                {{-- {!! $corepersons->links() !!} --}}
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
@endpush
