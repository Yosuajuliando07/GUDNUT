<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'GudNut') }} |
    @yield ('judul')
  </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="{{asset('Frontend/fontawesomev5/css/all.css')}}" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('Frontend/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('Frontend/css/style.min.css')}}" rel="stylesheet">

  <!-- Favicon-->
  <link rel="icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
  {{-- TOAST --}}

  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  @stack('tambah_css')
</head>

<body>
  @include('layouts.Frontend.header')

  @yield('isi')

  @include('layouts.Frontend.footer')



  <!-- JQuery -->
  @stack('tambah_js')
  <script type="text/javascript" src="{{asset('Frontend/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('Frontend/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('Frontend/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('Frontend/js/mdb.min.js')}}"></script>
  <!-- Initializations -->

  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>
</html>


