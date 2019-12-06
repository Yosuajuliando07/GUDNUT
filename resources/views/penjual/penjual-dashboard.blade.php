@extends('layouts.backend.master')
@section('judul', 'Dashboard')

@push('tambah_css')
@endpush
@section('isi')
<div class="container-fluid">
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">shop</i>
                    </div>
                    <div class="content">
                        <div class="text">My Produk</div>
                        <div class="number count-to" data-from="0" data-to="{{Auth::user()->produk()->count()}}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">Order</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">comment</i>
                    </div>
                    <div class="content">
                        <div class="text">KOMENTAR BLOG</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <div class="content">
                        <div class="text">USERS</div>

                       <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="align-center">
                            PRODUK
                            {{-- <small>All pictures taken from <a href="https://unsplash.com/" target="_blank">unsplash.com</a></small> --}}
                        </h2>
                    </div>
                    <div class="body">
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            @foreach ($produks as $produk)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <a href="{{route('produk.show', ['id' => $produk->id])}}" data-sub-html="Demo Description">
                                    <img class="img-responsive thumbnail" src="{{url ('/upload/produk/'.$produk->gambar_produk)}}" height="128">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('tambah_js')
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('Adminbsb/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('Adminbsb/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('Adminbsb/plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('Adminbsb/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('Adminbsb/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('Adminbsb/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('Adminbsb/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('Adminbsb/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('Adminbsb/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('Adminbsb/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
<script src="{{asset('Adminbsb/js/pages/index.js')}}"></script>
@endpush
