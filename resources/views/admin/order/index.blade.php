@extends('layouts.backend.master')

@section('judul','Produk')

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
                        KONFIRMASI ORDER
                    </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>NO HP</th>
                                        <th>TOTAL BAYAR</th>
                                        <th>KONFIRMASI</th>
                                        <th>TERIMA BARANG</th>
                                        <th>DETAIL</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>NO HP</th>
                                        <th>TOTAL BAYAR</th>
                                        <th>KONFIRMASI</th>
                                        <th>TERIMA BARANG</th>
                                        <th>DETAIL</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach ($buktipembayarans as $iniRow)
                                    <?php $no++ ;?>
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{ $iniRow->order_detail->order->nama_penerima}}</td>
                                      <td>{{ $iniRow->order_detail->order->email_penerima }}</td>
                                      <td>{{ $iniRow->order_detail->order->no_hp_penerima}}</td>
                                      <td>{{ $iniRow->order_detail->order->total_bayar }}</td>
                                      <td class="align-center">
                                          @if ($iniRow->order_detail->status_bayar == true)
                                            <p class="font-bold col-teal"><i class="material-icons">done</i></p>
                                          @else
                                            <p class="font-bold col-pink"><i class="material-icons">clear</i></p>
                                          @endif

                                      </td>
                                      <td class="align-center">
                                        @if ($iniRow->order_detail->order->status_brg_sampai == true)
                                          <p class="font-bold col-teal"><i class="material-icons">done</i></p>
                                        @else
                                          <p class="font-bold col-pink"><i class="material-icons">clear</i></p>
                                        @endif

                                    </td>
                                      <td class="align-center"><a href="{{route('displayorder.show', ['id' => $iniRow->order_detail->id])}}" class="btn btn-default waves-effect"><i class="material-icons">search</i></a>
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
<script src="{{asset('Adminbsb/js/pages/ui/modals.js')}}"></script>
<script src="{{asset('Adminbsb/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('Adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
@endpush
