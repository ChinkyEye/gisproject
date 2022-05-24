@extends('superadmin.main.app')
@push('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"/>
@endpush
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<div>
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
                  <a href="{{route('superadmin.mantralaya.create')}}" class="btn btn-flat btn-danger btn-block text-capitalize" style="color:#fff">Add {{$page}} <i class="fas fa-plus fa-fw"></i></a>
                </div>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead class="thead-dark" style="text-align: center">                  
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center" id="directories" class="sortable">
                    @foreach($datas as $key => $data)
                    <tr id="{{$data->id}}" class="{{$data->is_active == 1 ? '' : 'table-danger'}}">
                      <td>{{$key + 1}}</td>
                      <td>{{$data->getUserDetail->name}}</td>
                      <td>{{$data->getUserDetail->address}}</td>
                      <td>{{$data->getUserDetail->email}}</td>
                      <td>{{$data->getUserDetail->phone}}</td>
                      <td>
                        <img src="{{ $data->document == null ? asset('images/no-image-user.png') : asset('images/mantralaya') . '/' . $data->document  }}" alt="" class="responsive" width="50" height="50">
                      </td>
                      <td>
                        <a href="{{ route('superadmin.mantralaya.active',$data->id) }}" data-placement="top" title="{{ $data->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                          <i class="nav-icon fas {{ $data->is_active == '1' ? 'fa-check-circle':'fa-times-circle text-danger'}}"></i>
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('superadmin.mantralaya.edit',$data->id) }}" class="btn btn-xs btn-outline-info" title="Update"><i class="fas fa-edit"></i></a>

                        <form action='javascript:void(0)' data_url="{{route('superadmin.mantralaya.destroy',$data->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                          <input type='hidden' name='_token' value='".csrf_token()."'>
                          <input name='_method' type='hidden' value='DELETE'>
                          <button class='btn btn-xs btn-outline-danger' type='submit' ><i class='fa fa-trash'></i></button>
                        </form>
                       {{--  <a href="{{route('superadmin.mantralaya.changepassword',$data->getUserDetail->id)}}" class="btn btn-xs btn-outline-info" title="Change Password">
                          <i class="fas fa-key"></i>
                        </a> --}}
                        <button type="button" class="btn btn-xs btn-outline-info identifyingClass" data-toggle="modal" data-target="#exampleModal" data-id="{{$data->id}}" title="reset password">
                             <i class="fas fa-key"></i>
                        </button>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{ $datas->links() }}
            </div>
             {{-- model --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="{{ route('superadmin.resetpassword') }}">
                    @csrf

                    <div class="modal-body">
                        <input type="hidden" name="mantralaya_id" id="mantralaya_id" value="" />
                        <div class="form-group">
                          <label for="new_password" class="col-md-4 control-label">New Password</label>
                          <div class="col-md-12">
                            <input id="new_password" type="password" class="form-control" name="new_password" required>
                           {{--  @if ($errors->has('new_password'))
                            <span class="help-block">
                              <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                            @endif --}}
                          </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            {{-- end of model --}}
           
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
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
<script>
  $(function(){
    $("#directories").sortable({
      stop: function(){
        $.map($(this).find('tr'), function(el) {
          var itemID = el.id;
          var itemIndex = $(el).index();
          $.ajax({
            url:"{{route('superadmin.order-directories')}}",
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
  $(function () {
    $(".identifyingClass").click(function () {
      var my_id_value = $(this).attr("data-id");
      $(".modal-body #mantralaya_id").val(my_id_value);
    })
  });
</script>
@endpush
