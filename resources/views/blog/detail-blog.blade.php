@extends('layouts.Frontend.master')

@section('judul','Blog')

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')

@include('modal-register')

<!--Main layout-->
<main class="mt-5 pt-5">
        <div class="container">

          <!--Section: Post-->
          <section class="mt-4">

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-8 mb-4">

                <!--Featured Image-->
                <div class="card mb-4 wow fadeIn">

                  <img src="{{url ('/upload/blog/'.$blogs->gambar)}}" class="img-fluid" alt="">
                        <!-- Card footer -->
                        <div class="card-footer white">   {{-- <img src="{{url ('storage/profil/alternatif.png')}}" class="img-circle myborder1 myavatars" alt="{{$user->nama}}"/> --}}
                                <div class="avatar ">

                                    <img src="{{url ('/upload/profil/'.$blogs->user->gambar)}}" alt="{{$blogs->user->nama}}" class="img-fluid z-depth-1 rounded-circle " height="70" width="70">

                                        <span class="text-muted">Ditulis oleh <a href="">{{$blogs->user->nama}}</a></span>
                                </div>



                 </div>
                </div>
                <!--/.Featured Image-->




                <!--Card-->
                <div class="card mb-4 wow fadeIn">

                  <!--Card content-->
                  <div class="card-body">
                    <blockquote class="blockquote">
                      <p class="mb-0 h5 text-center" >{{$blogs->judul}}</p>
                      <small class="text-muted">Diposting pada {{ $blogs->created_at->toFormattedDateString() }}</small>

                    </blockquote>
                    <p>{!! $blogs->artikel !!}</p>



                  </div>

                </div>
                <!--/.Card-->


                {{-- Comments --}}
                <div class="card card-comments mb-3 wow fadeIn">
                  <div class="card-header font-weight-bold">{{ $blogs->komentar()->count()}} komentar</div>
                  <div class="card-body">

                @if ($blogs->komentar()->count() > 0)


                    @foreach ($blogs->komentar as $kom)
                    <div class="media d-block d-md-flex mt-4">

                        <img class="img-fluid z-depth-1 rounded-circle" src="{{url ('/upload/profil/'.$kom->user->gambar)}}" alt="{{$kom->user->nama}}">

                      <div class="media-body text-center text-md-left ml-md-3 ml-0">
                        <h5 class="mt-0 font-weight-bold">{{$kom->user->nama}}
                          <a href="" class="pull-right">
                            {{-- <i class="fas fa-reply"></i> --}}
                          </a>
                        </h5>
                        <small class="text-muted">{{$kom->created_at->diffForHumans()}}</small>
                       <br>
                       {{$kom->komentar}}
                      </div>
                    </div>
                    @endforeach

                    @else
                    <p>Belum Ada Komentar</p>
                    @endif

                  </div>
                </div>
                <!--/.Comments-->








                <!--Reply-->
                <div class="card mb-3 wow fadeIn">
                  <div class="card-header font-weight-bold">Ada pertanyaan atau komentar?</div>
                  <div class="card-body">


                    @guest
                     <p class="text-center">Untuk menambahkan komentar, Anda harus login terlebih dahulu!!
                     <a href="{{route('login')}}">
                         </a> </p>

                    @else
                    <!-- Default form reply -->
                    <form method="POST" action="{{route('tambah.komentar', $blogs->id)}}">
                    @csrf
                      <!-- Comment -->
                      <div class="form-group">
                      <label for="replyFormComment">Komentar</label>
                        <textarea name="komentar" class="form-control" id="replyFormComment" rows="5"></textarea>
                      </div>
                      <div class="text-center mt-4">
                        <button class="btn btn-info btn-md" type="submit">Kirim Komentar</button>
                      </div>
                    </form>
                    <!-- Default form reply -->
                    @endguest

                  </div>
                </div>
                <!--/.Reply-->

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-4 mb-4">



                <!--Card-->
                <div class="card mb-4 wow fadeIn">

                  <div class="card-header">Postingan Menarik Lainnya</div>

                  <!--Card content-->
                  <div class="card-body ">
                    @php
                    $blogs = DB::table('blogs')->inRandomOrder()->take(10)->get();
                    @endphp
                    @foreach ($blogs as $blog)
                    <ul class="list-unstyled">
                      <li class="media">

                            <div class="view overlay">
                                    <img class="d-flex mr-3 rounded" height="50" width="60" src="{{url ('/upload/blog/'.$blog->gambar)}}" alt="{{$blog->judul}}">
                                    <a href="{{route('pageblog.show', ['id' => $blog->id])}}">
                                    <div class="mask waves-effect waves-light rgba-white-slight"></div>
                                          </a>
                            </div>


                         </a>
                        <div class="media-body">
                          <a href="{{route('pageblog.show', ['id' => $blog->id])}}">
                          <h5 class="mt-0 mb-1 font-weight-bold">{{$blog->judul}}</h5>
                          </a>
                          {!!str_limit( $blog->artikel,'80')!!}
                        </div>
                      </li>
                    </ul>
                    @endforeach

                  </div>

                </div>
                <!--/.Card-->

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

          </section>
          <!--Section: Post-->

        </div>
      </main>
      <!--Main layout-->

@endsection
@push('tambah_js')

@endpush
