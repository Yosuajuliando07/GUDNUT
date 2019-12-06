@extends('layouts.backend.master')

@section('judul','Detail Produk Users')

@push('tambah_css')

@endpush

@section('isi')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{{route('displayorder.index')}}" class="btn bg-teal waves-effect">
                        <i class="material-icons">keyboard_backspace</i>
                        <span class="icon-name">Kembali</span>
                        </a>
                        <a href="{{ route ('order.disetujui', ['id' => $order_details->id]) }}" class="btn btn-info pull-right">
                                <i class="material-icons">check_circle</i>
                                <span>Konfirmasi</span>
                        </a>
                        <h2 class="align-center">
                           DETAIL ORDERAN
                        </h2>
                    </div>



                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <img class="img-thumbnail" src="{{url ('/upload/buktipembayaran/'.$order_details->buktipembayaran->gambar)}}"  width="630px" height="300px">
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="card-about-me">
                                    <div class="body">
                                        <ul>
                                            <li>
                                                <div class="title">
                                                    Nama Penerima
                                                </div>
                                                <div class="content">
                                                    {{$order_details->order->nama_penerima}}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">
                                                   Produk
                                                </div>

                                                    <a href="{{route('displayproduk.show', ['id' => $order_details->produk->id])}}">
                                                            <div class="content">
                                                        {{$order_details->produk->nama_produk}}
                                                    </div>
                                                    </a>

                                            </li>
                                            <li>
                                                <div class="title">
                                                    Jumlah
                                                </div>
                                                <div class="content">
                                                    {{$order_details->qty}}
                                                </div>
                                            </li>
                                            <li>
                                                        <div class="title">
                                                            Rute Pengiriman
                                                        </div>
                                                        <div class="content">
                                                           Dari {{$order_details->produk->kota->nama_kota}} ke
                                                            {{$order_details->order->kota->nama_kota}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Total Pembayaran
                                                        </div>
                                                        <div class="content">
                                                            {{$order_details->order->total_bayar}}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                  </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>

        </div>
@endsection
@push('tambah_js')
@endpush
