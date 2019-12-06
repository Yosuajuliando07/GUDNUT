@extends('layouts.Frontend.master')

@section('judul','Shop')

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')

@include('modal-register')

  <!--Main layout-->
  <main class="mt-5 pt-4">
        <div class="container dark-grey-text mt-5">

          <!--Grid row-->
          <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 mb-4">

              <img src="{{url ('/upload/produk/'.$produk->gambar_produk)}}" class="img-fluid" alt="{{$produk->nama_produk}}">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4">

              <!--Content-->
              <div class="p-4">
                <div class="mb-3">
                <strong>
                    <a href="" class="avatar mx-auto whit">

                        <img src="{{url ('/upload/profil/'.$produk->user->gambar)}}"  class="img-fluid z-depth-1 rounded-circle " height="60" width="60" alt="avatar image">

                        <span class="dark-grey-text e">{{$produk->user->nama}}</span>
                    </a>
                </strong>
                </div>
                <h3 class="lead font-weight-bold">{{$produk->nama_produk}}</h3>
                <p class="h5 text-danger">@uang($produk->harga)</p>
                <p class="h6">Kategori<a href="{{route('showKategori', $produk->kategoriproduk->id)}}">
                    <span class="badge badge-pill danger-color">{{$produk->kategoriproduk->nama}}</span>
                    </a>
                </p>
                <p class="h6">Stok

            @if ($produk->stok == true)
            <span class="text-default">
                Tersedia
            </span>
            @else
            <span class="text-danger">
                Habis
            </span>
            @endif

                </p>
                <p class="h6">Berat
                    <span class="text-default">
                    {{$produk->berat}} <small>(Gram)</small>
                    </span>
                </p>
                <p class="h6">Deskripsi Produk</p>
                <p>{{$produk->deskripsi_produk}}</p>
                <hr>
                <p class="lead font-weight-bold"><span><i class="fas fa-map-marker-alt"></i></span> Lokasi</p>
               <h6>
                    <strong>{{$produk->kota->nama_kota}}</strong>
                    <small class="text-muted">{{$produk->alamat_lngkp_produk}}</small>
                </h6>

<form class="d-flex justify-content-left" action="{{route('keranjang.store')}}" method="POST">
    @csrf
       <input type="hidden" name="id" value="{{ $produk->id }}">
       <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
       <input type="hidden" name="harga" value="{{ $produk->harga }}">
       <input type="hidden" name="berat" value="{{ $produk->berat }}">
       @if ($produk->stok == true)
       <button type="submit" class="btn btn-default">
        Masukan Keranjang <i class="fas fa-shopping-cart ml-1"></i>
       </button>
       @else
       <button type="button" class="btn btn-default" disabled>Masukan Keranjang<i class="fas fa-shopping-cart ml-1"></i></button>
       @endif

    </form>


            </div>

              <!--Content-->

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

          <hr>

          <!--Grid row-->
          <div class="row d-flex justify-content-center wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 text-center">

              <h4 class="my-4 h4">Produk Lainnya</h4>

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->



        <!-- Grid row -->

        <div class="row">

          <!-- Grid column -->
          {{-- @foreach ($terbaru as $item) --}}

          @foreach ($produks as $produk)
          <div class="col-lg-3 col-md-6 mb-4">
            <!-- Card -->
            <div class="card align-items-center h-100">
              <!-- Card image -->
              <div class="view overlay zoom">
                <img src="{{url ('/upload/produk/'.$produk->gambar_produk)}}" class="card-img-top img-fluid"
                  alt="">
                <a href="{{route('produk.detail', ['id' => $produk->id])}}">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card image -->
              <!-- Card content -->
              <div class="card-body text-center">
                <!-- Category & Title -->
                <a href="{{route('showKategori', $produk->kategoriproduk->id)}}" class="grey-text">
                    <span class="badge badge-pill danger-color">{{$produk->kategoriproduk->nama}}</span>
                </a>
                <h5>
                  <strong>
                    <a href="" class="dark-grey-text">{{$produk->nama_produk}}
                    </a>
                  </strong>
                </h5>
                <h4 class="font-weight-bold teal-text">
                <strong>@uang($produk->harga)</strong>
                </h4>


              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>
          <!-- Grid column -->
          @endforeach
          <!-- Grid column -->


        </div>
        <!-- Grid row -->




        </div>
      </main>
      <!--Main layout-->
@endsection
@push('tambah_js')

@endpush
