@extends('layouts.Frontend.master')

@section('judul','Shop Keranjang')

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')

@include('modal-register')
<main class="mt-5 pt-5 mb-5">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <section id="ecommerce" class="text-center">
                    @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message')}}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                        </ul>
                        @endif



                        <div class="row">


                            <div class="col-md-12 my-3 text-left">

                                <div class="card">
                                    <div class="card-body">
                                            @if (Cart::count() > 0)

                                        <div class="table-responsive">

                                            <table class="table product-table">


                                                <thead class="mdb-color lighten-5">
                                                    <tr>
                                                        <th></th>
                                                        <th class="font-weight-bold">
                                                            <strong>Produk</strong>
                                                        </th>
                                                        <th class="font-weight-bold">
                                                            <strong>Berat</strong>
                                                        </th>
                                                        <th></th>
                                                        <th class="font-weight-bold">
                                                            <strong>Harga</strong>
                                                        </th>
                                                        <th class="font-weight-bold">
                                                            <strong>QTY</strong>
                                                        </th>
                                                        <th class="font-weight-bold">
                                                            <strong>Jumlah</strong>
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>



                                                <tbody>
                                                        @foreach (Cart::content() as $item)

                                                    <tr>
                                                        <th scope="row">
                                                                <a href="{{route('produk.detail', ['id' => $item->model->id])}}">
                                                              <img src="{{url ('/upload/produk/'.$item->model->gambar_produk)}}" alt="" class="img-fluid" width="80px">
                                                        </th>
                                                        <td class="font-weight-bold">

                                                                <a href="{{route('produk.detail', ['id' => $item->model->id])}}">
                                                                <strong>{{$item->model->nama_produk}}</strong>


                                                        </td>
                                                        <td>

                                                            {{$item->weight * $item->qty}}<small>(gram)</small>


                                                        </td>
                                                        <td></td>
                                                        <td>

                                                            @uang($item->model->harga)

                                                        </td>
                                                        <td>
                                                                <form action="{{route('keranjang.update', $item->rowId)}}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                            <input name="qty" value="{{$item->qty}}" min="1" type="number" aria-label="Search" class="form-control" style="width: 100px" >
                                                            <input type="submit" class="btn btn-sm btn btn-default btn-rounded" size="1" value="update">
                                                        </form>
                                                        </td>
                                                        <td class="font-weight-bold">
                                                            <strong>

                                                                    @uang($item->subtotal)

                                                            </strong>
                                                        </td>
                                                        <td>
                                                                <form action="{{route('keranjang.destroy', $item->rowId)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">X
                                                        </button>
                                                    </form>


                                                        </td>
                                                    </tr>


                                                    @endforeach


                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td>
                                                            <h4 class="mt-2">
                                                                <strong>SubTotal</strong>
                                                            </h4>
                                                        </td>
                                                        <td class="text-right">
                                                            <h4 class="mt-2">
                                                                <strong>Rp{{Cart::subtotal()}}</strong>
                                                            </h4>
                                                        </td>
                                                        <td colspan="3" class="text-right">
                                                            <a href="{{route('checkout.index')}}" class="btn btn-primary btn-rounded waves-effect waves-light">Lanjutkan Pembayaran
                                                                <i class="fas fa-angle-right right"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    @else
                                                    <h3 class="text-center">Keranjang Kosong</h3>
                                                    <h6 class="text-center"><a href="{{route('shop.index')}}">Kembali Ke Halaman Shop</a></h6>




                                                    @endif
                                                </tbody>


                                            </table>

                                        </div>


                                    </div>

                                </div>

                            </div>


                        </div>
                    </section>

                </div>
            </div>
        </div>
</main>

@endsection
@push('tambah_js')
@endpush
