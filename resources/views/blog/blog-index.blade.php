@extends('layouts.Frontend.master')

@section('judul','List Blog')

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
        <span class="navbar-brand">Kategori : </span>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

       @include('blog.sidebar-list-kategori')

      </nav>

          <hr class="my-5">

          <!--Section: Cards-->
          <section class="text-center">

            <!--Grid row-->
            <div class="row mb-4 wow fadeIn">

            @foreach ($blogs as $blog)
            <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <!--Card-->
                <div class="card h-100">

                  <!--Card image-->
                  <div class="view overlay zoom">
                  <img src="{{url ('/upload/blog/'.$blog->gambar)}}" class="card-img-top" alt="{{$blog->judul}}">
                    <a href="{{route('pageblog.show', ['id' => $blog->id])}}">
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>

                  <!--Card content-->
                  <div class="card-body">
                    <!--Title-->
                  <h4 class="card-title">{{$blog->judul}}</h4>
                    <!--Text-->
                    {{-- <p class="card-text">{!!str_limit( $blog->artikel,'70')!!}</p> --}}
                    <a href="{{route('pageblog.show', ['id' => $blog->id])}}"
                      class="btn btn-default">Baca
                      {{-- <i class="fas fa-play ml-2"></i> --}}
                    </a>
                  </div>

                </div>
                <!--/.Card-->

              </div>
              <!--Grid column-->

              @endforeach

            </div>
            <!--Grid row-->

            <!--Pagination-->
            <nav class="d-flex justify-content-center wow fadeIn">
              <ul class="pagination pg-blue">
                {{ $blogs->links() }}
              </ul>
            </nav>
            <!--Pagination-->

          </section>
          <!--Section: Cards-->

        </div>
      </main>
      <!--Main layout-->

@endsection
@push('tambah_js')

@endpush
