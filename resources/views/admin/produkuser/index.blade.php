@extends('layouts.backend.master')

@section('judul','Produk Users')

@push('tambah_css')
 <!-- JQuery DataTable Css -->
 <link href="{{asset('Adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('isi')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="align-center">
                            PRODUK USERS
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID</th>
                                        <th>USERS</th>
                                        <th>GAMBAR</th>
                                        <th>NAMA PRODUK</th>
                                        <th>STOK</th>
                                        <th>HARGA</th>
                                        <th class="align-center">DETAIL</th>
                                        <th class="align-center">EDIT</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID</th>
                                        <th>USERS</th>
                                        <th>GAMBAR</th>
                                        <th>NAMA PRODUK</th>
                                        <th>STOK</th>
                                        <th>HARGA</th>
                                        <th class="align-center">DETAIL</th>
                                        <th class="align-center">EDIT</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach ($produks as $produk)
                                    <?php $no++ ;?>
                                    <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$produk->id}}</td>
                                    {{-- <td>{{$produk->user->nama}}</td> --}}
                                    <td class="font-bold">



                                        <img src="{{url ('/upload/profil/'.$produk->user->gambar)}}" class="img-circle myborder1 myavatars" alt="{{$produk->user->nama}}" />

                                        {{$produk->user->nama}}
                                    </td>
                                    <td class="align-center">
                                        <img class="thumbnail" src="{{url ('/upload/produk/'.$produk->gambar_produk)}}"  width="90px" height="60px" >
                                    </td>
                                      <td>{{$produk->nama_produk}}</td>
                                      {{-- <td>{{$produk->kategoriproduk->nama}}</td> --}}
                                      <td>
                                            @if ($produk->stok == true)
                                                <p class="font-bold col-teal">Tersedia</p>
                                            @else
                                            <p class="font-bold col-pink">Kosong</p>
                                            @endif
                                            </td>
                                      <td>@uang($produk->harga)</td>
                                      <td class="align-center"><a href="{{route('displayproduk.show', ['id' => $produk->id])}}" class="btn bg-teal waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail"><i class="glyphicon glyphicon-zoom-in"></i></a></td>
                                      <td class="align-center">
                                        <form action="{{route('displayproduk.destroy', ['id' => $produk->id])}}" method="POST" data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn bg-deep-orange waves-effect" type="submit"><i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                       </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection
@push('tambah_js')
<script src="{{asset('Adminbsb/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('Adminbsb/js/pages/ui/tooltips-popovers.js')}}"></script>
<script src="{{asset('Adminbsb/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('Adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
@endpush
