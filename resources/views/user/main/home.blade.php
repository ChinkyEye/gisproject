@extends('user.main.app')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Profile</h1>
      </div>

    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3" v-for="(profile, index) in allprofile" :key="profile.id">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
              alt="User profile picture" src="{{asset('images/no-image-user.png')}}">
            </div>

            <h3 class="profile-username text-center text-capitalize">{{$datas->name}}</h3>
            <div class="d-block text-center text-muted">
              <span>email:{{$datas->email}}</span>
              {{-- <br> --}}
              {{-- <span>student_code:</span> --}}
            </div>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Address</b> <a class="float-right">{{$datas->address}}</a>
              </li>
              <li class="list-group-item">
                <b>Contact No:</b> <a class="float-right">{{$datas->phone}}</a>
              </li>
              <li class="list-group-item">
                <b>Register Date</b> <a class="float-right">{{$datas->date_np}}</a>
              </li>
              <li class="list-group-item text-center mt-2">
                <a href="{{ route('user.userhasdetail.create',$datas->id)}}" class="btn btn-xs btn-outline-info" title="Update further data"><i class="fas fa-plus"></i></a>
              </li>
            </ul>
          </div>
        </div>

        {{-- <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Parent</h3>
          </div>

          <div class="card-body">
            <strong><i class="fas fa-user mr-1"></i> Father Name</strong>
            <p class="text-muted">
              ....
            </p>
            <hr> 
            <strong><i class="fas fa-user mr-1"></i> Mother Name</strong>
            <p class="text-muted">
              .....
            </p>
            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
            <p class="text-muted">.....</p>
            <hr>
          </div>
        </div> --}}
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-hover">
                <thead>                  
                  <tr class="text-center">
                    <th>Website Link</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($datas->getUserDetail != null)
                  <tr class="text-center">
                    <td>{{$datas->getUserDetail->website_link}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
