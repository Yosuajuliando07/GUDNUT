@extends('layouts.Frontend.master')

@section('judul', $query)

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')

@include('modal-register')

<main class="mt-5 pt-5">
<div class="container">
    <section class="text-center mb-4">

        @if ($produks->count() > 0)
        <div class="alert alert-primary teal lighten-2" role="alert">
            <h3 class="text-white">Pencarian Ditemukan<span class="badge badge-danger">{{ $produks->count()}}</span></h3>
        </div>

        <div class="row wow fadeIn">
            @foreach ($produks as $produk)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card align-items-center">
                        <div class="view overlay zoom">
                            <img src="{{url ('/upload/produk/'.$produk->gambar_produk)}}" class="card-img-top img-fluid" alt="">
                                <a href="{{route('produk.detail', ['id' => $produk->id])}}">
                            <div class="mask rgba-white-slight"></div></a>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{route('showKategori', $produk->kategoriproduk->id)}}" class="grey-text">
                                <span class="badge badge-pill danger-color">{{$produk->kategoriproduk->nama}}</span>
                            </a>
                            <h5><strong><a href="" class="dark-grey-text">{{$produk->nama_produk}}</a></strong></h5>
                            <h4 class="font-weight-bold teal-text">
                                <strong>@uang($produk->harga)</strong>
                            </h4>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>

        @else
            <div class="alert alert-primary teal lighten-2" role="alert">
                <h4 class="text-white">Pencarian Tidak Ditemukan</h3>
            </div>
       @endif
      </section>
    </div>
</main>
@endsection

@push('tambah_js')

@endpush
