<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pradesh-1 | Super Admin</title>
  {{-- <title>Digital Database System | Super Admin</title> --}}
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->

  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"> --}}


  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @stack('style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper" id="app">
    @include('superadmin.main.header')
    @include('superadmin.main.sidebar')
    <div class="content-wrapper">
      <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
       @if(Session::has('alert-' . $msg))
       <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
       @endif
       @endforeach
     </div>
      @yield('content')
    </div>
    @include('superadmin.main.footer')

  </div>
  <!-- ./wrapper -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  @stack('javascript')

</body>
</html>
