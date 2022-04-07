<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>@stack('tab_title') Pradesh</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('/web') }}/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ url('/web') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('/web') }}/css/style.main.css">

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

    @include('web.layouts.slider')

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