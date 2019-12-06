@extends('layouts.backend.master')

@section('judul','List Slide')

@push('tambah_css')

@endpush

@section('isi')
<div class="container-fluid">
<!-- Hover Rows -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="{{route('slider.create')}}" class="btn bg-teal waves-effect">
                    <i class="material-icons">add_circle_outline</i><span class="icon-name">Tambah</span></a>
                    <h2 class="align-center">Slide</h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID</th>
                                <th>SLIDE</th>
                                <th>KETERANGAN</th>
                                <th>STATUS</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach($sliders as $slide)
                                <?php $no++ ;?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $slide->id }}</td>
                                    <td width="300px" height="100px">
                                        <img class="img-responsive thumbnail" src="{{url ('/upload/slider/'.$slide->gambar)}}">
                                    </td>
                                    <td>{{ $slide->keterangan }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if($slide->status == true)
                                            <button type="button" class="btn bg-green waves-effect">Aktif</button>
                                            <button type="button" class="btn bg-green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            @else
                                            <button type="button" class="btn bg-blue-grey waves-effect waves-effect">Non-Aktif</button>
                                            <button type="button" class="btn bg-blue-grey waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            @endif
                                            <ul class="dropdown-menu">
                                                @if($slide->status == true)
                                                <li><a href="{{ route('slider.nonaktif', ['id' => $slide->id]) }}" class=" waves-effect waves-block ">Non-Aktif</a></li>
                                                @else
                                                <li><a href="{{ route('slider.aktif', ['id' => $slide->id]) }}" class=" waves-effect waves-block">Aktif</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="{{ route('slider.edit', ['id' => $slide->id]) }}">
                                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="glyphicon glyphicon-edit"></i></button></a>
                                    </td>
                                    <td>
                                    <form action="{{ route('slider.destroy', ['id' => $slide->id]) }}" method="POST" data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
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
        <!-- #END# Hover Rows -->
    </div>
@endsection
@push('tambah_js')
<script src="{{asset('Adminbsb/js/pages/ui/tooltips-popovers.js')}}"></script>
@endpush
