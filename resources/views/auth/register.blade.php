@extends('layouts.logris')
@section('isi')
<body class="signup-page">
    <div class="signup">
        <form id="daftar" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header align-center">
                        <h2>
                            Daftar Sekarang
                        </h2>
                        <small>Sudah punya akun Gudang Nutrisi?
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}">&nbsp;Masuk</a></small>
                            @endif
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input id="nama" name="nama" type="text" class="form-control date @error('nama') is-invalid @enderror"
                                             value="{{ old('nama') }}" placeholder="Nama" required autofocus>
                                             @if($errors->has('nama'))
                                            <div class="text-danger">
                                               {{ $errors->first('nama')}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_circle</i>
                                        </span>
                                        <div class="form-line">
                                            <input id="username" name="username" type="text" class="form-control date {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                            value="{{ old('username') }}" placeholder="Username" required autofocus>
                                            @if($errors->has('username'))
                                           <div class="text-danger">
                                           {{ $errors->first('username')}}
                                          </div>
                                           @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input id="email" name="email" type="email" class="form-control date @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Email" required autofocus>
                                            @if($errors->has('email'))
                                            <div class="text-danger">
                                            {{ $errors->first('email')}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone</i>
                                        </span>
                                        <div class="form-line">
                                            <input id="no_hp" name="no_hp" type="text" class="form-control date {{ $errors->has('no_hp') ? ' is-invalid' : '' }}"
                                            value="{{ old('no_hp') }}" placeholder="No Telp" required autofocus>
                                            @if($errors->has('no_hp'))
                                           <div class="text-danger">
                                            {{ $errors->first('no_hp')}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control date {{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}"
                                            value="{{ old('tgl_lahir') }}" placeholder="Tanggan Lahir" required autofocus>
                                            @if($errors->has('tgl_lahir'))
                                           <div class="text-danger">
                                            {{ $errors->first('tgl_lahir')}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group align-center @error('jenis_kelamin') is-invalid @enderror">
                                        <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki - Laki" class="with-gap">
                                        <label for="laki-laki">Laki - Laki</label>
                                        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" class="with-gap">
                                        <label for="perempuan" class="m-l-20">Perempuan</label>
                                    </div>
                                 </div>
                                 </div>

                                 <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group align-center @error('role_id') is-invalid @enderror">
                                                <input type="radio" name="role_id" id="pembeli" value="3" class="with-gap">
                                                <label for="pembeli">Pelanggan</label>
                                                <input type="radio" name="role_id" id="penjual" value="2" class="with-gap">
                                                <label for="penjual" class="m-l-20">Penjual</label>
                                            </div>
                                         </div>
                                         </div>

                                 <div class="row clearfix">
                                     <div class="col-md-12">
                                         <div class="input-group">
                                             <span class="input-group-addon">
                                                 <i class="material-icons">location_on</i>
                                                </span>
                                                <div class="form-line">
                                                    <textarea id="alamat" name="alamat"  type="text" rows="1" class="form-control date {{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                                    value="{{ old('alamat') }}" placeholder="Alamat" required autofocus></textarea>
                                                    @if($errors->has('alamat'))
                                                    <div class="text-danger">
                                                    {{ $errors->first('alamat')}}
                                                   </div>
                                                   @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input id="password" name="password" type="password" class="form-control date  @error('password') is-invalid @enderror"
                                                    placeholder="Password" required autocomplete="new-password">
                                                    @if($errors->has('password'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('password')}}
                                                   </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input id="konfirmasi_password" name="password_confirmation" type="password" class="form-control date" placeholder="Konfirmasi Password"
                                                    required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-center">
                                        <button type="submit" class="btn btn-block btn-lg bg-pink waves-effect">DAFTAR</button>
                                        <div class="m-t-25 m-b--5 align-center">
                                        <small >Dengan mendaftar, saya menyetujui
                                           Syarat dan Ketentuan serta Kebijakan Privasi
                                        </small>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Jquery Core Js -->
                <script src="{{asset('Adminbsb/plugins/jquery/jquery.min.js')}}"></script>

                <!-- Bootstrap Core Js -->
                <script src="{{asset('Adminbsb/plugins/bootstrap/js/bootstrap.js')}}"></script>

                <!-- Waves Effect Plugin Js -->
                <script src="{{asset('Adminbsb/plugins/node-waves/waves.js')}}"></script>

                <!-- Validation Plugin Js -->
                <script src="{{asset('Adminbsb/plugins/jquery-validation/jquery.validate.js')}}"></script>

                <!-- Custom Js -->
                <script src="{{asset('Adminbsb/js/admin.js')}}"></script>
                <script src="{{asset('Adminbsb/js/pages/examples/sign-up.js')}}"></script>
</body>
@endsection
