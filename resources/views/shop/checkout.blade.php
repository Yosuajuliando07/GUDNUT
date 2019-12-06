@extends('layouts.Frontend.master')

@section('judul','Checkout')

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')

@include('modal-register')

<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <div class="row my-5">

            <div class="col-md-8 mb-4">

                <div class="card">

                    <form class="card-body" action="{{route('checkout.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="md-form ">
                                    <input name="nama_penerima" type="text" id="nama" class="form-control" value="{{Auth::user()->nama}}">
                                    <label for="nama" class="">Nama Penerima</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <div class="md-form">
                                <input name="email_penerima"type="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                                    <label for="email" class="">E-Mail Penerima</label>
                                </div>
                            </div>
                        </div>

                        <div class="md-form mb-5">
                                <input name="no_hp_penerima" type="text" id="no_hp" class="form-control" value="{{Auth::user()->no_hp}}">
                                <label for="no_hp" class="">No Hp Penerima</label>
                        </div>

                        <div class="md-form mb-5">
                            <input name="catatan" type="text" id="catatan" class="form-control" value="" autocomplete="off">
                            <label for="catatan" class="">Catatan</label>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-4">
                            <label for="country">Kota Tujuan</label>
                            <select name="kota_tujuan" class="custom-select d-block w-100" id="country" required="" title="-- Pilih Kota Tujuan--">
                                @foreach ($kotas as $kota)
                                <option value="{{$kota->id}}">{{$kota->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>


                        <div class="form-horizontal">
                                <div class="form-line">
                                        <textarea name="alamat_lengkap" rows="4" class="form-control no-resize" placeholder="Alamat Lengkap Tujuan Pengiriman"></textarea>
                                </div>
                            </div>

                  <hr class="mb-4">
                  <div class="text-center">
                  <button type="submit" class="btn btn-default">Order</button>
                  </div>


                </form>

              </div>


            </div>











            <!--Grid column-->
            <div class="col-md-4 mb-4">
              <!-- Cart -->
              <ul class="list-group mb-3 z-depth-1">

               @foreach ($keranjangs as $keranjang)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">{{$keranjang->model->nama_produk}}</h6>
                    <p class="h5"><span class="badge badge-secondary badge-pill">{{$keranjang->qty}}</span></p>
                  </div>
                  <span><img src="{{url ('/upload/produk/'.$keranjang->model->gambar_produk)}}" alt="" class="img-fluid z-depth-0"  width="70px" height="40px"></span>
                  {{-- <span class="text-muted">{{$item->qty}}</span> --}}
                  <br>
                  <span class="text-muted ">@uang($keranjang->subtotal)</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total</span>
                  <strong class="text-danger">Rp{{$total}}</strong>
                </li>
              </ul>
              <!-- Cart -->

            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->

        </div>
      </main>
      <!--Main layout-->
@endsection
@push('tambah_js')
@endpush
