@extends('layouts.backend.master')

@section('judul','Edit Kategori Produk')

@push('tambah_css')

@endpush

@section('isi')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 class="align-center">
                        Edit Kategori Produk
                    </h2>
                </div>
                <div class="body">
                    <form method="POST" action="{{ route('kategoriproduk.update', ['id' => $kategoriproduks->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group form-float">
                        <div class="form-line">
                        <input type="text" id="nama" name="nama" class="form-control" value="{{$kategoriproduks->nama}}">
                            <label class="form-label" for="nama">Nama Kategori Produk</label>
                        </div>
                    </div>
                    <a href="{{route('kategoriproduk.index')}}" type="submit" class="btn bg-teal waves-effect">Kembali</a>
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
