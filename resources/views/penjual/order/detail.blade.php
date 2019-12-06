@extends('layouts.backend.master')

@section('judul','Detail Produk')

@push('tambah_css')

@endpush

@section('isi')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{{route('kelolaorder.index')}}" class="btn bg-teal waves-effect">
                        <i class="material-icons">keyboard_backspace</i>
                        <span class="icon-name">Kembali</span>
                        </a>
                       <a href="{{route('kirim', ['id' => $order_details->id])}}" class="btn bg-light-blue pull-right">
                                <i class="material-icons">check_circle</i>
                                <span>Terima Dan Kirim</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <div class="card-about-me">
                                        <div class="body">
                                            <ul>
                                                <li>
                                                    <div class="title">
                                                        {{-- <i class="material-icons">library_books</i> --}}
                                                       Produk
                                                    </div>
                                                    <div class="content">
                                                        <img class="thumbnail" src="{{url ('/upload/produk/'.$order_details->produk->gambar_produk)}}"  width="90px" height="60px" >
                                                            <span> {{$order_details->produk->nama_produk}} </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Jumlah
                                                    </div>
                                                    <div class="content">
                                                            {{$order_details->qty}} Unit
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Alamat Tujuan
                                                    </div>
                                                    <div class="content">
                                                      ({{$order_details->order->kota->nama_kota}})
                                                         {{$order_details->order->alamat_lengkap}}

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Catatan
                                                    </div>
                                                    <div class="content">
                                                            {{$order_details->order->catatan}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
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
                                                                No.Telepon
                                                            </div>
                                                            <div class="content">

                                                                    {{$order_details->order->no_hp_penerima}}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">
                                                                E-Mail Penerima
                                                            </div>
                                                            <div class="content">
                                                              {{$order_details->order->email_penerima}}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">
                                                               Dipesan Oleh Akun
                                                            </div>
                                                            <div class="content">
                                                                    {{$order_details->order->user->nama}}
                                                            </div>
                                                        </li>
                                                        <li>
                                                                <div class="title">
                                                                   Tangal Order
                                                                </div>
                                                                <div class="content">
                                                                        {{$order_details->order->created_at}}
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
