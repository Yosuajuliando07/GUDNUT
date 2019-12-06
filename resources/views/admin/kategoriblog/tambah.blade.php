@extends('layouts.backend.master')

@section('judul','Form Tambah Kategoriblog')

@push('tambah_css')

@endpush

@section('isi')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 class="align-center">
                        TAMBAH KATEGORI BLOG
                    </h2>
                </div>
                <div class="body">
                    <form method="POST" action="{{route('kategoriblog.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="nama" name="nama" class="form-control">
                            <label class="form-label" for="nama">Nama Kategori Blog</label>
                        </div>
                    </div>
                    <a href="{{route('kategoriblog.index')}}" type="submit" class="btn bg-teal waves-effect">Kembali</a>
                    <button type="submit" class="btn bg-teal waves-effect">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('tambah_js')
@endpush
