@extends('layouts.Frontend.master')

@section('judul','Order')

@push('tambah_css')
@endpush

@section('isi')

@include('modal-login')
<main class="mt-5 pt-5">
    <div class="container">
        <ul class="nav nav-tabs md-tabs nav-justified" id="myTabEx" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="home-tab-ex" data-toggle="tab" href="#home-ex" role="tab" aria-controls="home-ex" aria-selected="true">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-ex" data-toggle="tab" href="#profile-ex" role="tab" aria-controls="profile-ex" aria-selected="false">History</a>
            </li>
        </ul>
        <div class="tab-content pt-5" id="myTabContentEx">
            <div class="tab-pane fade active show" id="home-ex" role="tabpanel" aria-labelledby="home-tab-ex">
                @if (Auth::user()->order()->count() > 0)
                <div class="col-lg-12 col-md-12 mb-4">
                    <table class="table">
                        <thead class="grey lighten-2">
                            <tr>
                                <th scope="col"><p class="h6">Nama Penerima</p></th>
                                <th scope="col"><p class="h6">Status Kirim</p></th>
                                <th scope="col"><p class="h6">Kota Pengiriman</p></th>
                                <th scope="col"><p class="h6">Total Bayar</p></th>
                                <th scope="col"><p class="h6">Konfirmasi Terima Barang</p></th>
                                <th scope="col"><p class="h6">Verifikasi Bukti Pembayaran</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->nama_penerima}}</td>
                                @if ($order->order_detail->status_brg_dikirim == true)
                                        <td class="text-success">Sedang Dikirm</td>
                                @else
                                        <td class="text-danger">Belum Dikirim</td>
                                @endif
                                <td>{{$order->kota->nama_kota}}</td>
                                <td>Rp{{$order->total_bayar}}</td>
                                @if ($order->status_brg_sampai == false)
                                <td class="text-center">
                                    <a href="{{ route ('barangsamsampai', ['id' => $order->order_detail->id]) }}" class="btn btn-light-green btn-sm"><i class="fas fa-check-circle"></i></a>
                                </td>
                                @endif
                                <td class="text-center">
                                        <a href="{{ route ('order.show', ['id' => $order->id]) }}" class="btn btn-blue darken-1 btn-sm"><i class="fas fa-arrow-alt-circle-up"></i></a>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>


         <div class="tab-pane fade" id="profile-ex" role="tabpanel" aria-labelledby="profile-tab-ex">
                <div class="col-lg-12 col-md-12 mb-4">
                        <table class="table">
                            <thead class="grey lighten-2">
                                <tr>
                                    <th scope="col"><p class="h6">Produk</p></th>
                                    <th scope="col"><p class="h6">Jumlah</p></th>
                                    <th scope="col"><p class="h6">Total Bayar</p></th>
                                    <th scope="col"><p class="h6">Diterima Pada</p></th>
                                    <th scope="col"><p class="h6">Kota Pengiriman</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat_transaksi as $rowRT)
                                <tr>
                                 <td>{{$rowRT->order_detail->produk->nama_produk}}</td>
                                 <td>{{$rowRT->order_detail->qty}}</td>
                                 <td>Rp{{$rowRT->total_bayar}}</td>
                                   <td >{{$rowRT->updated_at->toFormattedDateString()}}</td>
                                   <td>{{$rowRT->kota->nama_kota}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                            </div>

            @else
            <a href="{{route('shop.index')}}">
            <h6 class="text-center">Silahkan Pilih Produk</h6>
          </a>
            @endif


            </div>
        </div>




    </div>
</div>
</main>
@endsection
@push('tambah_js')
@endpush
