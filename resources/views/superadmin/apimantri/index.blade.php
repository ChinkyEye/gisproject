@extends('superadmin.main.app')
@push('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"/>
@endpush
@section('content')
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
            <div class="card-header">
              <div class="row">
                <div class="col-md-2">
                  <a href="{{route('superadmin.apimantri.create')}}" class="btn btn-flat btn-danger btn-block text-capitalize" style="color:#fff">Add Mantri<i class="fas fa-plus fa-fw"></i></a>
                </div>
              </div>
            </div>
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center" id="apimantri" class="sortable">
                    @foreach($datas as $key => $data)
                    <tr id="{{$data->id}}" class="{{$data->is_active == 1 ? '' : 'table-danger'}}">
                      <td>{{$key + 1}}</td>
                      <td>{!! $data->name !!}</td>
                      @if($contains = Str::contains($data->image, ['http://', 'https://']))
                      <td>
                       <img src="{{ $data->image == null ? asset('images/no-image-user.png') : $data->image  }}" alt="" class="responsive" width="50" height="50">
                      </td>
                      @else
                      <td>
                       <img src="{{ $data->image == null ? asset('images/no-image-user.png') : asset('images/mantri').'/'. $data->image  }}" alt="" class="responsive" width="50" height="50">
                      </td>

                      @endif
                      <td>{{$data->post}}</td>
                      <td>{{$data->ministry}}</td>
                      @if($contains = Str::contains($data->image, ['http://', 'https://']))
                      <td>

                      </td>
                      @else
                      <td>
                        <form action='javascript:void(0)' data_url="{{route('superadmin.apimantri.destroy',$data->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
                          <input type='hidden' name='_token' value='".csrf_token()."'>
                          <input name='_method' type='hidden' value='DELETE'>
                          <button class='btn btn-xs btn-outline-danger' type='submit' ><i class='fa fa-trash'></i></button>
                        </form>

                      </td>

                      @endif

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

