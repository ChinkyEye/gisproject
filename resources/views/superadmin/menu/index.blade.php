@extends('superadmin.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <p class="text-danger m-0">Manager List</p>
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
                    <a href="{{route('superadmin.header.create')}}" class="btn btn-flat btn-danger btn-block text-capitalize" style="color:#fff">Add {{ $page }} <i class="fas fa-plus fa-fw"></i></a>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Search by name">
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
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Issued</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

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
