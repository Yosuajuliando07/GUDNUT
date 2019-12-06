@extends('layouts.backend.master')

@section('judul','Tambah Produk')

@push('tambah_css')

<!-- Bootstrap Select Css -->
<link href="{{asset('Adminbsb/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
{{-- untuk preview langsung gambar --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endpush
@section('isi')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 class="align-center">
                       Tambah Produk
                    </h2>
                </div>
                <div class="body">
                <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="stok" type="hidden" value="1">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="nama_produk" name="nama_produk" class="form-control">
                            <label class="form-label" for="nama_produk">Nama Produk</label>
                        </div>
                    </div>

                    <div class="row clearfix align-center">
                        <div class="col-sm-12 ">
                            <div class="form-group">
                                <img id="preview" src="{{url ('/upload/produk/default.png')}}" width="372px" height="400px"/><br/>
                                <input type="file" name="gambar_produk" id="image" style="display: none;"/><br>
                                @if($errors->has('gambar_produk'))
                                <div class="text-danger">
                                    {{ $errors->first('gambar_produk') }}
                                </div>
                                @endif
                            <div class="text-center">
                                <a href="javascript:ambilGambar()" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float font-bold col-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ambil Gambar">
                                    <i class="material-icons">publish</i></a>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="berat" name="berat" class="form-control">
                                    <label class="form-label" for="berat">Berat Produk <small>(Gram)</small></label>
                                </div>
                            </div>
                        </div>


                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="harga" name="harga" class="form-control">
                                <label class="form-label" for="harga">Harga (Rp)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="deskripsi_produk" rows="2" class="form-control" placeholder="Deskripsi Produk"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line ">
                                    <label for="kota">Kota Asal Produk</label>
                                    <select name="kota_asal_produk" id="kota" class="form-control show-tick" title="-- Pilih Kota Asal--" data-live-search="true">
                                        @foreach ($kotas as $kota)
                                         <option value="{{$kota->id}}">{{$kota->nama_kota}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-line">
                                <textarea name="alamat_lengkap_produk" rows="4" class="form-control no-resize" placeholder="Alamat Lengkap Produk"></textarea>
                            </div>
                        </div>
                    </div>

                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line ">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control show-tick" title="-- Pilih Kategori --" data-live-search="true">
                                    @foreach ($kategoriproduks as $kategori)
                                     <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <a href="{{route('produk.index')}}" type="submit" class="btn bg-teal waves-effect">Kembali</a>
                        <button type="submit" class="btn bg-teal waves-effect">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection
@push('tambah_js')
<!-- Select Plugin Js -->
<script src="{{asset('Adminbsb/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

{{-- uang --}}
{{-- <script type="text/javascript">
$(document).ready(function(){
    $('.uang').mask('000.000.000', {reverse:true});
});
</script> --}}
{{-- gambar --}}
<script>
    function ambilGambar() {
        $('#image').click();
    }
    $('#image').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
        else
            alert("Silakan pilih file gambar(jpg, jpeg, png).")
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            };
        }
    }
</script>
@endpush
