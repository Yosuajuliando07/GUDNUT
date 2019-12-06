@extends('layouts.backend.master')

@section('judul','List Kategoriproduk')

@push('tambah_css')
<!-- JQuery DataTable Css -->
<link href="{{asset('Adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush


@section('isi')
<div class="container-fluid">
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="{{ route('kategoriproduk.create') }}" class="btn bg-teal btn-sm waves-effect">
                    <i class="material-icons">add_circle_outline</i>
                    <span class="icon-name">TAMBAH</span>
                </a>
                <h2 class="align-center">LIST KATEGORI PRODUK</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID</th>
                                <th>KATEGORI PRODUK</th>
                                <th class="align-center">EDIT</th>
                                <th class="align-center">HAPUS</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>ID</th>
                                <th>KATEGORI PRODUK</th>
                                <th class="align-center">EDIT</th>
                                <th class="align-center">HAPUS</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($kategoriproduks as $kategoriproduk)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$kategoriproduk->id}}</td>
                                <td>
                                    {{$kategoriproduk->nama}}
                                </td>
                                <td class="align-center">
                                    <a href="{{ route('kategoriproduk.edit', ['id' => $kategoriproduk->id]) }}">
                                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="glyphicon glyphicon-edit"></i></button></a>
                                </td>
                                <td class="align-center">
                                    <form action="{{ route('kategoriproduk.destroy', ['id' => $kategoriproduk->id]) }}" method="POST" data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn bg-deep-orange waves-effect" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
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
<!-- #END# Basic Examples -->
</div>
@endsection
@push('tambah_js')
<script src="{{asset('Adminbsb/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('Adminbsb/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('Adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('Adminbsb/js/pages/ui/tooltips-popovers.js')}}"></script>
@endpush
