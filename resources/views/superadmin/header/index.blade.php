@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header"></section>
<section class="content">
  <div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif
    <a href="{{route('superadmin.header.create')}}" class="btn btn-sm btn-info text-capitalize rounded-0">Add {{ $page }} </a>
    <div class="card">
      <div class="table-responsive">
        <table class="table table-bordered table-hover m-0 w-100 table-sm">
          <thead class="bg-dark">
            <tr class="text-center">
              <th width="10">SN</th>
              <th width="10">Name</th>
              <th width="10">Image</th>
              <th width="150">Slogan</th>
              <th width="10">Status</th>
              <th width="10">Action</th>
            </tr>
          </thead> 
          <tbody>
            @foreach($headers as  $key => $header)
            <tr class="text-center">
              <td>{{$key + 1}}</td>
              <td class="text-left">{{$header->name}}</td>
              <td><img src="{{ asset('images/logo') . '/' . $header->image }}" alt="" class="responsive" width="50" height="50"></td>
              <td>{{$header->slogan}}</td>
              <td>
                <a href="{{ route('superadmin.header.active',$header->id) }}" data-placement="top" title="{{ $header->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                  <i class="nav-icon fas {{ $header->is_active == '1' ? 'fa-check-circle':'fa-times-circle text-danger'}}"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('superadmin.header.edit',$header->id) }}" class="btn btn-xs btn-outline-info" title="Update"><i class="fas fa-edit"></i></a>
                <form action='javascript:void(0)' data_url="{{route('superadmin.header.destroy',$header->id)}}" method='post' class='d-inline-block'  data-placement='top' title='Permanent Delete' onclick='myFunction(this)'>
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
      
      
    </section>
    @endsection
    @push('javascript')
    <script>
      function myFunction(el) {
        const url = $(el).attr('data_url');
        console.log(url);
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
