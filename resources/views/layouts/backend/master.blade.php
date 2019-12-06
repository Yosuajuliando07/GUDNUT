<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'GudNut') }} |
        @yield ('judul')
     </title>

    <!-- Favicon-->
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
     {{-- untuk toast --}}
     <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

     <!-- Bootstrap Core Css -->
     <link href="{{asset('Adminbsb/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

     <!-- Waves Effect Css -->
     <link href="{{asset('Adminbsb/plugins/node-waves/waves.css')}}" rel="stylesheet" />

     <!-- Animation Css -->
     <link href="{{asset('Adminbsb/plugins/animate-css/animate.css')}}" rel="stylesheet" />

     <!-- Morris Chart Css-->
     <link href="{{asset('Adminbsb/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

     <!-- Custom Css -->
     <link href="{{asset('Adminbsb/css/style.css')}}" rel="stylesheet">

     <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
     <link href="{{asset('Adminbsb/css/themes/all-themes.css')}}" rel="stylesheet" />
     @stack('tambah_css')
</head>
<body class="theme-teal">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-teal">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

{{--------------------------------------------------- header----------------------------------------------}}
@include('layouts.backend.header')
{{--------------------------------------------------- end_header----------------------------------------------}}

{{--------------------------------------------------- header----------------------------------------------}}
@include('layouts.backend.sidebar')
{{--------------------------------------------------- end_header----------------------------------------------}}
<section class="content">
@yield('isi')
</section>
    <!-- Jquery Core Js -->
    <script src="{{asset('Adminbsb/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('Adminbsb/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('Adminbsb/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('Adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('Adminbsb/plugins/node-waves/waves.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('Adminbsb/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('Adminbsb/js/demo.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
   <script>
  //alert
     @if ($errors->any())
       @foreach($errors->all() as $error)
        toastr.error('{{$error}}', 'Error',{
             closeButton:true,
             progressBar:true,
             positionClass: "toast-bottom-right",
          });
       @endforeach
       @endif
  </script>
@stack('tambah_js')
</body>
</html>
