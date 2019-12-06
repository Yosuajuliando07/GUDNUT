@extends('layouts.Frontend.master')

@section('judul','Profil')

@push('tambah_css')

@endpush

@section('isi')

@include('modal-login')
<main class="mt-5 pt-5">
    <div class="container">
        <ul class="nav nav-tabs md-tabs nav-justified" id="myTabEx" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="home-tab-ex" data-toggle="tab" href="#home-ex" role="tab" aria-controls="home-ex" aria-selected="true">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-ex" data-toggle="tab" href="#profile-ex" role="tab" aria-controls="profile-ex" aria-selected="false">Edit Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab-ex" data-toggle="tab" href="#contact-ex" role="tab" aria-controls="contact-ex" aria-selected="false">Ubah Password</a>
            </li>
        </ul>
        <div class="tab-content pt-5" id="myTabContentEx">
            <div class="tab-pane fade active show" id="home-ex" role="tabpanel" aria-labelledby="home-tab-ex">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card testimonial-card">
                            <div class="avatar mx-auto white mt-4">
                                <form action="{{route('pelanggan.foto.profil.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <img id="preview" src="{{url ('/upload/profil/'.Auth::user()->gambar)}}" alt="{{Auth::user()->nama}}" class="rounded-circle img-fluid" height="250" width="250">
                                    <input type="hidden" name="nama" value="{{Auth::user()->nama}}">
                                    <input type="file" name="gambar" id="image" style="display: none;"/><br>
                                    <div class="text-center">
                                        <a href="javascript:gantiProfil()" class="btn-floating btn-lg text-default"><i class="fas fa-camera"></i></a>
                                    </div><br>
                                </div>
                                <div class="text-center mb-5">
                                    <button type="submit" class="btn btn-default btn-sm">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 mb-4">
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col h6">
                                                Nama
                                            </div>
                                            <div class="col">
                                                {{Auth::user()->nama}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col h6">
                                                Username
                                            </div>
                                            <div class="col">
                                                {{Auth::user()->username}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col h6">
                                                E-Mail
                                            </div>
                                            <div class="col">
                                                {{Auth::user()->email}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col h6">
                                                No Telepon
                                            </div>
                                            <div class="col">
                                                {{Auth::user()->no_hp}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col h6">
                                                Tanggal Lahir
                                            </div>
                                            <div class="col">
                                                {{Auth::user()->tgl_lahir}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col h6">
                                                Jenis Kelamin
                                            </div>
                                            <div class="col">
                                                {{Auth::user()->jenis_kelamin}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col h6">
                                                Alamat
                                            </div>
                                            <div class="col">
                                                {{Auth::user()->alamat}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-ex" role="tabpanel" aria-labelledby="profile-tab-ex">
                <div class="justify-content-center">
                    <div class="card">
                        <form method="POST" action="{{route('pelanggan.profil.update')}}" class="card-body" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="md-form mb-5">
                                <input name="nama" type="text" id="nama" class="form-control" value="{{Auth::user()->nama}}">
                                <label for="nama" class="active">Nama</label>
                            </div>
                            <div class="md-form mb-5">
                                <input name="username" type="text" id="username" class="form-control" value="{{Auth::user()->username}}">
                                <label for="username" class="active">Username</label>
                            </div>
                            <div class="md-form mb-5">
                                <input name="email" type="text" id="email" class="form-control" value="{{Auth::user()->email}}">
                                <label for="email" class="active">Email</label>
                            </div>
                            <div class="md-form mb-5">
                                <input name="no_hp" type="text" id="no_hp" class="form-control" value="{{Auth::user()->no_hp}}">
                                <label for="no_hp" class="active">No Telepon</label>
                            </div>
                            <div class="md-form mb-5">
                                <input name="tgl_lahir" type="date" id="tgl_lahir" class="form-control" value="{{Auth::user()->tgl_lahir}}">
                                <label for="tgl_lahir" class="active">Tanggal Lahir</label>
                            </div>
                            <div class="d-block my-3 mb-5">
                                <div class="custom-control custom-radio">
                                    <input id="perempuan" name="jenis_kelamin" type="radio" class="custom-control-input" value="Perempuan" {{ (Auth::user()->jenis_kelamin == 'Perempuan') ? "checked" : "" }}>
                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="laki_laki" name="jenis_kelamin" type="radio" class="custom-control-input" value="Laki - Laki" {{ (Auth::user()->jenis_kelamin == 'Laki - Laki') ? "checked" : "" }}>
                                    <label class="custom-control-label" for="laki_laki">Laki - Laki</label>
                                </div>
                            </div>
                            <div class="md-form mb-5">
                                <textarea name="alamat" id="alamat" class="form-control md-textarea" rows="3">{{Auth::user()->alamat}}</textarea>
                                <label for="alamat" class="active">Alamat</label>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-default btn-lg" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact-ex" role="tabpanel" aria-labelledby="contact-tab-ex">
                <div class="card mb-5">
                    <div class="card-body px-lg-5 pt-0">
                        <form method="POST" action="{{route('pelanggan.update.password')}}" class="text-center" style="color: #757575;" action="#!">
                        @csrf
                        @method('PUT')
                        <div class="md-form mt-5">
                            <input type="password" name="old_password" id="password_lama" class="form-control">
                            <label for="password_lama">Password</label>
                        </div>
                        <div class="md-form mt-3">
                            <input type="password" name="password" id="password_baru" class="form-control">
                            <label for="password_baru">Password Baru</label>
                        </div>
                        <div class="md-form mt-3">
                            <input type="password" name="password_confirmation" id="konfirmasi_password" class="form-control">
                            <label for="konfirmasi_password">Konfirmasi Password</label>
                        </div>
                        <button class="btn btn-outline-info  waves-effect" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
@push('tambah_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function gantiProfil() {
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
