<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>@stack('tab_title') प्रदेश नं. १ सरकारको आधिकारिक पोर्टल</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('/web') }}/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ url('/web') }}/css/style.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ url('/web') }}/css/style.main.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    @stack('css')
</head>

<body>
    {{-- Preloader --}}
    {{-- @include('web.layouts.preloader1') --}}

    <!-- ##### Header Start ##### -->
    <header class="header-area">
        @include('web.layouts.head-top')
        {{-- Top Header --}}
        @include('web.layouts.header')

        {{-- Navbar --}}
        @include('web.layouts.navbar')
    </header>
    <!-- ##### Header End ##### -->

    @yield('content')

    <!-- ##### Footer Start ##### -->
    @include('web.layouts.footer')
    <!-- ##### Footer End ##### -->

    <!-- ##### Js ##### -->
    <script src="{{ url('/web') }}/js/jquery/jquery-2.2.4.min.js"></script>

    <script src="{{ url('/web') }}/js/bootstrap/popper.min.js"></script>
    <script src="{{ url('/web') }}/js/bootstrap/bootstrap.min.js"></script>
    <script src="{{ url('/web') }}/js/jquery.marquee-1.4.0.min.js"></script>
    <script src="{{ url('/web') }}/js/plugins/plugins.js"></script>
    <script src="{{ url('/web') }}/js/active.js"></script>
    

    @stack('js')
</body>

</html>