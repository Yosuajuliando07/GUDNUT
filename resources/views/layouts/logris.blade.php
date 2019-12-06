<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GudNut') }}</title>

    <!-- Favicon-->
    <link rel="icon" href="{{asset('Adminbsb//favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('Adminbsb/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('Adminbsb/plugins/node-waves/waves.css" rel="stylesheet')}}" />

    <!-- Animation Css -->
    <link href="{{asset('Adminbsb/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('Adminbsb/css/style.css')}}" rel="stylesheet">
</head>
@yield('isi')
</html>
