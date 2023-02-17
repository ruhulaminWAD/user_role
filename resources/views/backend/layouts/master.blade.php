<!doctype html>
<html lang="en">

<head>
    {{-- <title>:: HexaBit :: Home</title> --}}
    <title>Dashboard - Admin | @yield('page_title') </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="HexaBit Bootstrap 4x Admin Template">
    <meta name="author" content="WrapTheme, www.thememakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/charts-c3/plugin.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/toastr/toastr.min.css">
    {{-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assetsLite/css/main.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assetsLite/css/color_skins.css">

    @stack('Backend_style');

</head>

<body class="theme-orange">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('backend') }}/assets/images/icon-light.svg" width="48" height="48" alt="HexaBit">
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        {{-- Header Section --}}
        @include('backend.layouts.include.header')


        {{-- Rightbar Menu Or Template Settings --}}
        @include('backend.layouts.include.template_setting')

        {{-- sidebar manu --}}
        @include('backend.layouts.include.sidebar_manu')


        {{-- Main Content & Body section --}}
        <div id="main-content">
            {{-- @include('backend.layouts.include.main_content') --}}
            @yield('admin_content')
        </div>




    </div>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="{{ asset('backend') }}/assetsLite/bundles/libscripts.bundle.js"></script>
    <script src="{{ asset('backend') }}/assetsLite/bundles/vendorscripts.bundle.js"></script>

    <script src="{{ asset('backend') }}/assetsLite/bundles/c3.bundle.js"></script>
    <script src="{{ asset('backend') }}/assetsLite/bundles/chartist.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/vendor/toastr/toastr.js"></script>

    <script src="{{  asset('backend')  }}/assetsLite/bundles/mainscripts.bundle.js"></script>
    <script src="{{  asset('backend')  }}/assetsLite/js/index.js"></script>
    <script>
        $('.sparkbar').sparkline('html', { type: 'bar' });
    </script>

    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{  asset('backend')  }}/assetsLite/js/sweetalert.js"></script>

    {{-- Toaster Js --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    @stack('Backend_javaScript');


</body>

</html>
