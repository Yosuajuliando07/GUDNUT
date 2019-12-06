@extends('layouts.Frontend.master')

@section('judul','Shop')

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')

@include('modal-register')

 <!--Main layout-->
 <main class="mt-5 pt-5">
     <div class="container">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">
            <!-- Navbar brand -->
            <a href="{{route('shop.index')}}">
                <span class="navbar-brand">Kategori : </span>
            </a>
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                @include('shop.list-kategori')
          </nav>
          <!--/.Navbar-->

          <!--Section: Products v.3-->
          <section class="text-center mb-4">
              <!--Grid row-->
              <div class="row wow fadeIn">

                  @foreach ($produks as $produk)

                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4">
                      <!-- Card -->
                      <div class="card align-items-center h-100">
                          <!-- Card image -->
                          <div class="view overlay zoom">
                              <img src="{{url ('/upload/produk/'.$produk->gambar_produk)}}" class="card-img-top img-fluid" alt="{{$produk->gambar_produk}}">
                              <a href="{{route('produk.detail', ['id' => $produk->id])}}"><div class="mask rgba-white-slight"></div></a>
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
                                <a href="" class="dark-grey-text">{{$produk->nama_produk}}</a>
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
              <!--Grid column-->

             @endforeach

            </div>
            <!--Grid row-->
          </section>
          <!--Section: Products v.3-->

          <!--Pagination-->
          <nav class="d-flex justify-content-center wow fadeIn">
            <ul class="pagination pg-blue">
                {{ $produks->links() }}
            </ul>
          </nav>
          <!--Pagination-->

        </div>
      </main>
      <!--Main layout-->
@endsection
@push('tambah_js')
@endpush
