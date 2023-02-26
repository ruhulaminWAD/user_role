<!doctype html>
<html lang="en">

<head>
<title>:: HexaBit :: 403</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="HexaBit Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, www.thememakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/assetsLite/css/main.css">
<link rel="stylesheet" href="{{ asset('backend') }}/assetsLite/css/color_skins.css">
</head>

<body class="theme-orange">

<!-- WRAPPER -->
<div id="wrapper" class="auth-main">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="javascript:void(0);"><img src="{{ asset('backend') }}/assets/images/icon-light.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt="">HexaBit</a>
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Documentation</a></li>
                        <li class="nav-item"><a class="nav-link" href="page-login.html">Sign In</a></li> --}}
                    </ul>
                </nav>
            </div>
            <div class="col-lg-8">
                <div class="auth_detail">
                    <h2 class="text-monospace">
                        Everything<br> you need for
                        <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="1500">
                            <div class="carousel-inner">
                                <div class="carousel-item active">your Admin</div>
                                <div class="carousel-item">your Project</div>
                                <div class="carousel-item">your Dashboard</div>
                                <div class="carousel-item">your Application</div>
                                <div class="carousel-item">your Client</div>
                            </div>
                        </div>
                    </h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <ul class="social-links list-unstyled">
                        <li><a class="btn btn-default" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="btn btn-default" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="btn btn-default" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="header">
                        <h3>
                            <span class="clearfix title">
                                <span class="number left">Error</span><span class="text">403 <br/>Forbiddon Error!</span>
                            </span>
                        </h3>
                    </div>
                    <div class="body">
                        <p>You don't have permission to access / on this server.</p>
                        <div class="margin-top-30">
                            <a href="javascript:history.go(-1)" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> <span>Go Back</span></a>
                            <a href="{{ route('home') }}" class="btn btn-primary btn-block"><i class="fa fa-home"></i> <span>Home</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->

<script src="{{ asset('backend') }}/assetsLite/bundles/libscripts.bundle.js"></script>
<script src="{{ asset('backend') }}/assetsLite/bundles/vendorscripts.bundle.js"></script>

<script src="{{ asset('backend') }}/assetsLite/bundles/mainscripts.bundle.js"></script>
</body>
