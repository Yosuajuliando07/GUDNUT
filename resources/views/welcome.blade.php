@extends('layouts.Frontend.master')

@section('judul','Homepage')

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')

@include('modal-register')

<main class="mt-5 pt-5">
    <div class="container">
        <section class="card wow fadeIn">
            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    {{-- $loop->first --}}
                    {{-- $loop->last --}}
                    {{-- The $loop variable also contains a variety of other useful properties: --}}
                     @foreach ($sliders as $slide)
                         <li data-target="#carousel-example-1z" data-slide-to="{{ $loop->index }}"  class="{{ $loop->first ? 'active' : '' }}"></li>
                     @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach ($sliders as $slide)
                        <div class="carousel-item {{ $loop->last ? 'active' : '' }}">
                            <img class="d-block w-100" src="{{url ('/upload/slider/'.$slide->gambar) }}" alt="ini slide">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span></a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span></a>
             </div>
          </section>

          <hr class="my-5">

          <section class="text-center my-5">
            <h2 class="h1-responsive font-weight-bold text-center my-5">Produk</h2>
              <div class="row">
                  @foreach ($produks as $produk)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card align-items-center h-100">
                            <div class="view overlay zoom">
                                <img src="{{url ('/upload/produk/'.$produk->gambar_produk) }}" class="card-img-top img-fluid" alt="">
                                <a href="{{ route('produk.detail', ['id' => $produk->id]) }}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <a href="{{ route('showKategori', $produk->kategoriproduk->id) }}" class="grey-text">
                                    <span class="badge badge-pill danger-color">{{ $produk->kategoriproduk->nama }}</span>
                                </a>
                                <h5><strong><a href="#" class="dark-grey-text">{{ $produk->nama_produk }}</a></strong></h5>
                                <h4 class="font-weight-bold teal-text"><strong>@uang($produk->harga)</strong></h4>
                            </div>
                        </div>
                    </div>
               @endforeach
           </div>
      </section>



     {{-- BLOG  --}}
      <section class="text-center my-5">
        <h2 class="h1-responsive font-weight-bold my-5">GudNut Blog</h2>
          <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-0">
                    <div class="view overlay zoom rounded z-depth-2 mb-4">
                        <img class="img-fluid" src="{{url ('/upload/blog/'.$blog->gambar) }}" alt="{{ $blog->judul }}">
                        <a href="{{ route('pageblog.show', ['id' => $blog->id]) }}">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <a href="{{ route('showKategoriblog', ['id' => $blog->kategoriblog->id]) }}" class="text-default">
                        <h6 class="font-weight-bold mb-3"><i class="fas fa-pen-alt"></i>{{ $blog->kategoriblog->nama }}</h6>
                    </a>
                    <h5 class="font-weight-bold mb-3"><strong>{{ $blog->judul }}</strong></h5>
                    <a href="{{ route('pageblog.show', ['id' => $blog->id]) }}" class="btn btn-default">Baca</a>
                </div>
            @endforeach
         </div>
      </section>
    </div >
</main >
@endsection
@push('tambah_js')

@endpush
