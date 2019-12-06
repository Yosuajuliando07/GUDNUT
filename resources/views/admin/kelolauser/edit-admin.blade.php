@extends('layouts.backend.master')

@section('judul','Form Edit Admin')

@push('tambah_css')
@endpush

@section('isi')
<div class="container-fluid">
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Edit Admin
                            </h2>
                        </div>
                        <div class="body">
                                <form action="{{ route('admin.update', ['id' => $users->id]) }}" method="POST">
                                 @csrf
                                 @method('PUT')

                                <label for="nama">Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input name="nama" type="text" id="nama" class="form-control" value="{{$users->nama}}">
                                    </div>
                                </div>

                                <label for="username">Usernname</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="username" type="text" id="username" class="form-control" value="{{$users->username}}">
                                    </div>
                                </div>


                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="email" type="email"  id="email" class="form-control" value="{{$users->email}}">
                                    </div>
                                </div>

                                <label for="no_hp">No Telepon</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="no_hp" type="number" id="no_hp" class="form-control" value="{{$users->no_hp}}">
                                    </div>
                                </div>

                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="tgl_lahir" type="date" id="tgl_lahir" class="form-control" value="{{$users->tgl_lahir}}">
                                    </div>
                                </div>


                                <label for="alamat">Alamat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="alamat" name="alamat" cols="30" rows="1" class="form-control">{{$users->alamat}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                        <div class="form-line">
                                            <input type="radio" name="jenis_kelamin" id="perempuan" class="with-gap" value="Perempuan" {{ ($users->jenis_kelamin == 'Perempuan') ? "checked" : "" }}>
                                                <label for="perempuan" class="m-l-20">Perempuan</label>
                                                <input type="radio" name="jenis_kelamin" id="laki_laki" class="with-gap" value="Laki - Laki" {{ ($users->jenis_kelamin == 'Laki - Laki') ? "checked" : "" }}>
                                            <label for="laki_laki">Laki - Laki</label>
                                        </div>
                                 </div>

                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="password" type="password" id="password" class="form-control" placeholder="Masukan Password">
                                    </div>
                                </div>
                                <input name="role_id" type="hidden" value="1">
                                <a href="{{route('admin.index')}}" type="submit" class="btn bg-teal waves-effect">Kembali</a>
                                <button type="submit" class="btn bg-teal waves-effect">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
 </div>
@endsection
@push('tambah_js')

<!-- Input Mask Plugin Js -->
<script src="{{asset('Adminbsb/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('Adminbsb/js/pages/forms/advanced-form-elements.js')}}"></script>
@endpush
