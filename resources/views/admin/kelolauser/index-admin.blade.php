@extends('layouts.backend.master')

@section('judul','List Admin')

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
                    <a href="{{route('admin.create')}}" class="btn bg-teal waves-effect">
                        <i class="material-icons">add_circle_outline</i>
                        <span class="icon-name">Tambah</span>
                        </a>
                        <h2 class="align-center">
                            LIST ADMINISTRATOR
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID</th>
                                        <th class="align-center">NAMA</th>
                                        <th class="align-center">DETAIL</th>
                                        <th class="align-center">EDIT</th>
                                        <th class="align-center">HAPUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID</th>
                                        <th class="align-center">NAMA</th>
                                        <th class="align-center">DETAIL</th>
                                        <th class="align-center">EDIT</th>
                                        <th class="align-center">HAPUS</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach ($users as $user)
                                    <?php $no++ ;?>
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{$user->id}}</td>
                                      <td class="font-bold">
                                            <img src="{{url ('/upload/profil/'.$user->gambar)}}" class="img-circle myborder1 myavatars" alt="{{$user->nama}}" />

                                    {{$user->nama}}
                                     </td>
                                      <td class="align-center"><a href="{{route('admin.show', ['id' => $user->id])}}" class="btn bg-teal waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail"><i class="glyphicon glyphicon-zoom-in"></i></a></td>


                                      @if ($user->id == 1)
                                      <td class="align-center">
                                        <button class="btn btn-default waves-effect" disabled="disabled"><i class="glyphicon glyphicon-edit"></i></button>
                                  </td>
                                      <td class="align-center">
                                            <button class="btn btn-default waves-effect" disabled="disabled"><i class="glyphicon glyphicon-trash"></i></button>
                                      </td>
                                      @else
                                      <td class="align-center"><a href="{{route('admin.edit', ['id' => $user->id])}}" class="btn bg-indigo waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                                      </td>
                                      <td class="align-center">
                                        <form action="{{ route('admin.destroy', ['id' => $user->id]) }}" method="POST"data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn bg-deep-orange waves-effect" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
                                    </td>
                                      @endif
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
