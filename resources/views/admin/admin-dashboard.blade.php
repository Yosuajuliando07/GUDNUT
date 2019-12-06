@extends('layouts.backend.master')

@section('judul','Admin Dashboard')

@push('tambah_css')
@endpush
@section('isi')
<div class="container-fluid">
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">shop</i>
                    </div>
                    <div class="content">
                        <div class="text">PRODUK</div>
                        <div class="number count-to" data-from="0" data-to="{{$produks->count()}}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">dvr</i>
                    </div>
                    <div class="content">
                        <div class="text">BLOG</div>
                    <div class="number count-to" data-from="0" data-to="{{$blogs->count()}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">comment</i>
                    </div>
                    <div class="content">
                        <div class="text">KOMENTAR BLOG</div>
                    <div class="number count-to" data-from="0" data-to="{{$komentars->count()}}" data-speed="1000" data-fresh-interval="20"></div>
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
                       {{-- <div><b class="h2">  </b></div> --}}
                       <div class="number count-to" data-from="0" data-to="{{$users->count()}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Produk</th>
                                        <th>Unit</th>
                                </thead>
                                <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($kategoriproduks as $kategoriproduk)
                                        <?php $no++ ;?>
                                    <tr>
                                    <td>{{$no}}</td>
                                        <td>{{$kategoriproduk->nama}}</td>
                                        <td>
                                            @if ($kategoriproduk->produk()->where('stok', true)->count() > 0)
                                            <span class="label bg-green">{{$kategoriproduk->produk()->where('stok', true)->count()}}</span>
                                            @else
                                            <span class="label label-danger">{{$kategoriproduk->produk()->where('stok', true)->count()}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">

                        <div class="body" >
                                {{-- @php
                                $sliders = DB::table('sliders')->where('status', true)->get();
                                @endphp --}}
                                <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel" >
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @foreach ($sliders as $slide)
                                        <li data-target="#carousel-example-generic_2" data-slide-to="{{ $loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        @foreach ($sliders as $slide)
                                        <div class="item {{$loop->last ? 'active' : ''}}">
                                            <img src="{{url ('/upload/slider/'.$slide->gambar)}}" />
                                            {{-- <div class="carousel-caption">
                                                <h3>{{($slide->keterangan)}}</h3>
                                            </div> --}}
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>




                </div>
            </div>
            <!-- #END# Browser Usage -->
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
