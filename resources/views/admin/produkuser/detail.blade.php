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
                    <a href="{{route('displayproduk.index')}}" class="btn bg-teal waves-effect">
                        <i class="material-icons">keyboard_backspace</i>
                        <span class="icon-name">Kembali</span>
                        </a>
                        <h2 class="align-center">
                           DETAIL PRODUK
                        </h2>
                    </div>
                    <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <img class="img-thumbnail" src="{{url ('/upload/produk/'.$produks->gambar_produk)}}" width="630px" height="300px">
                                    <blockquote>
                                    <footer>Diposting pada<cite title="Source Title"> {{$produks->created_at}}</cite></footer>
                                        </blockquote>
                                </div>
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        <div class="card-about-me">
                                            <div class="body">
                                                <ul>
                                                    <li>
                                                        <div class="title">
                                                            Nama Produk
                                                        </div>
                                                        <div class="content">
                                                            {{$produks->nama_produk}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                           Harga
                                                        </div>
                                                        <div class="content">
                                                            @uang($produks->harga)
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Berat
                                                        </div>
                                                        <div class="content">
                                                            {{$produks->berat}} <small>Gram</small>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Stok
                                                        </div>
                                                        <div class="content">
                                                            @if ($produks->stok == true)
                                                            <b>Tersedia</b>
                                                            @else
                                                            <b>Habis</b>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Kategori
                                                        </div>
                                                        <div class="content">
                                                            {{$produks->kategoriproduk->nama}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Kota
                                                        </div>
                                                        <div class="content">
                                                            {{$produks->kota->nama_kota}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Alamat Lengkap
                                                        </div>
                                                        <div class="content">
                                                            {{$produks->alamat_lngkp_produk}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Deskripsi
                                                        </div>
                                                        <div class="content">
                                                            {{$produks->deskripsi_produk}}
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
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                </div>
            </div>
        </div>
@endsection
@push('tambah_js')
@endpush
