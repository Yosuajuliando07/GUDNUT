@extends('layouts.backend.master')

@section('judul','Order')

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
                        KIRIM ORDERAN
                    </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                    <th>NO</th>
                                    <th>NAMA PENERIMA</th>
                                    <th>PRODUK</th>
                                    <th>KOTA TUJUAN</th>
                                    <th>JUMLAH ORDERAN</th>
                                    <th>STATUS KIRIM</th>
                                    <th>DETAIL</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA PENERIMA</th>
                                        <th>PRODUK</th>
                                        <th>KOTA TUJUAN</th>
                                        <th>JUMLAH ORDERAN</th>
                                        <th>TOTAL BAYAR</th>
                                        <th>DETAIL</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach ($order_details as $orderRow)
                                    <?php $no++ ;?>
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{ $orderRow->order->nama_penerima}}</td>
                                      <td>{{ $orderRow->produk->nama_produk }}</td>
                                      <td>{{ $orderRow->order->kota->nama_kota}}</td>
                                      <td>{{ $orderRow->qty}}</td>
                                      @if ($orderRow->status_brg_dikirim == true)
                                      <td>Dikirim</td>
                                      @else
                                      <td>Belum Dikirim</td>
                                      @endif
                                      <td class="align-center"><a href="{{route('kelolaorder.show', ['id' => $orderRow->id])}}" class="btn btn-default waves-effect"><i class="material-icons">search</i></a>
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
