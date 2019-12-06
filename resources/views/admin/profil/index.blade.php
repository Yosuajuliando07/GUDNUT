@extends('layouts.backend.master')

@section('judul','Profil Admin')

@push('tambah_css')
@endpush
@section('isi')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 class="align-center">
                        PROFIL
                    </h2>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="true">
                                <i class="material-icons">account_circle</i>Profil
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                                <i class="material-icons">settings</i>Edit
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#messages_with_icon_title" data-toggle="tab" aria-expanded="false">
                                <i class="material-icons">lock_outline</i> Ganti Password
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home_with_icon_title">
                                <div class="profile-card">
                                        <div class="profile-header">&nbsp;</div>
                                        <div class="profile-body">
                                                <div class="image-area">
                                                    <form action="{{route('admin.foto.profil.update')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <img id="preview" src="{{url ('/upload/profil/'.Auth::user()->gambar)}}" alt="{{Auth::user()->nama}}" height="250" width="250">
                                                        <input type="hidden" name="nama" value="{{Auth::user()->nama}}">
                                                        <input type="file" name="gambar" id="image" style="display: none;"/><br>
                                                        <a href="javascript:gantiFoto()" class="col-teal">
                                                        <i class="material-icons">camera_alt</i></a>
                                                    <p class="align-center">Ubah Foto Profil</p>
                                                    <button type="submit" class="btn btn-primary btn-sm waves-effect">Simpan</button>
                                                    </form>
                                                    </div>
                                             </div>


                                        <div class="profile-footer">
                                                <div class="card-about-me">
                                                        <div class="body">
                                                            <ul>
                                                                <li>
                                                                    <div class="title">
                                                                        Nama
                                                                    </div>
                                                                    <div class="content">
                                                                            {{Auth::user()->nama}}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="title">
                                                                        Username
                                                                    </div>
                                                                    <div class="content">
                                                                            {{Auth::user()->username}}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                        <div class="title">
                                                                            Email
                                                                        </div>
                                                                        <div class="content">
                                                                                {{Auth::user()->email}}
                                                                        </div>
                                                                    </li>
                                                                <li>
                                                                    <div class="title">
                                                                        No Telepon
                                                                    </div>
                                                                    <div class="content">
                                                                            {{Auth::user()->no_hp}}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="title">
                                                                        Tanggal Lahir
                                                                    </div>
                                                                    <div class="content">
                                                                            {{Auth::user()->tgl_lahir}}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                        <div class="title">
                                                                            Jenis Kelamin
                                                                        </div>
                                                                        <div class="content">
                                                                                {{Auth::user()->jenis_kelamin}}
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                            <div class="title">
                                                                               Alamat
                                                                            </div>
                                                                            <div class="content">
                                                                                    {{Auth::user()->alamat}}
                                                                            </div>
                                                                        </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                        </div>




                                    </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">


                        <form action="{{route('admin.profil.update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label ">
                                        <label for="nama">Nama</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="{{Auth::user()->nama}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label ">
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" value="{{Auth::user()->username}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email">E-Mail</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukan E-Mail" value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="no_hp">No Telepon</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukan No Handphone" value="{{Auth::user()->no_hp}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="tgl_lahir">Tanggan Lahir</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukan Umur Anda" value="{{Auth::user()->tgl_lahir}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label ">
                                                    <label for="username">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                        <input type="radio" name="jenis_kelamin" id="perempuan" class="with-gap" value="Perempuan" {{ (Auth::user()->jenis_kelamin == 'Perempuan') ? "checked" : "" }}>
                                                        <label for="perempuan" class="m-l-20">Perempuan</label>
                                                        <input type="radio" name="jenis_kelamin" id="laki_laki" class="with-gap" value="Laki - Laki" {{ (Auth::user()->jenis_kelamin == 'Laki - Laki') ? "checked" : "" }}>
                                                        <label for="laki_laki">Laki - Laki</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label ">
                                                    <label for="username">Alamat</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                        <textarea name="alamat" rows="2" class="form-control no-resize">{{Auth::user()->alamat}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">

                        <form action="{{route('admin.update.password')}}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_lama">Password Lama</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="old_password" id="password_lama" class="form-control" placeholder="Masukan Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_baru">Password Baru</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" id="password_baru" class="form-control" placeholder="Masukan Password Baru">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="konfirmasi_password">Konfirmasi Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" name="password_confirmation" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">simpan</button>
                                        <a href="">Lupa Password?</a>
                                    </div>
                                </div>

                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@push('tambah_js')
{{-- gambar --}}
<script>
    function gantiFoto() {
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
