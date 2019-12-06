<!--Modal: Login / Register Form-->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs md-tabs tabs-2 aqua-gradient lighten-3" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                    Daftar Pelanggan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-store-alt mr-1"></i>
                    Akun Penjualan</a>
                </li>
              </ul>
            <!-- Tab panels -->
            <div class="tab-content">

            <!--Panel 7-->
            <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <input type="hidden" name="role_id" value="3">
                        <!--Body-->
                        <div class="modal-body mb-1">
                            <div class="md-form form-sm mb-5">
                            <i class="fas fa-user-edit prefix"></i>
                            <input type="text" id="namaForm1" class="form-control form-control-sm validate @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                            <label for="namaForm1">Nama</label>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="md-form form-sm mb-5">
                            <i class="fas fa-user-circle prefix"></i>
                            <input type="text" id="usernameForm1" class="form-control form-control-sm validate @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                            <label for="usernameForm1">Username</label>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-envelope prefix"></i>
                            <input type="email" id="emailForm1" class="form-control form-control-sm validate  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label data-error="Format_Email_@" for="emailForm1">E-Mail</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-phone prefix"></i>
                            <input type="number" id="no_hpForm1" class="form-control form-control-sm validate @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">
                            <label data-error="Format_Nomor" for="no_hpForm1">No Telepon<small> (min 12)</small></label>

                            @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-map-marker-alt prefix"></i>
                            <textarea id="alamatForm1" class="md-textarea form-control @error('alamat') is-invalid @enderror" rows="1" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat"></textarea>
                            <label for="alamatForm1">Alamat</label>

                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-user prefix"></i>
                            <input type="date" id="umurForm1" class="form-control form-control-sm validate @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir">
                            <label data-error="tidak_boleh_0" for="umurForm1">Tanggal Lahir</label>

                            @error('umur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="text-center mb-5  @error('jenis_kelamin') is-invalid @enderror">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="RB_1_Form1" type="radio" class="custom-control-input" name="jenis_kelamin" value="Laki - Laki">
                                <label class="custom-control-label" for="RB_1_Form1">Laki - Laki</label>
                            </div>
                                <!-- Default inline 2-->
                                <div class="custom-control custom-radio custom-control-inline">
                                <input id="RB_2_Form1" type="radio" class="custom-control-input" name="jenis_kelamin" value="Perempuan">
                                <label class="custom-control-label" for=RB_2_Form1>Perempuan</label>
                            </div>
                            @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-lock prefix"></i>
                            <input id="passwordForm1" type="password" class="form-control form-control-sm validate @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="passwordForm1">Password<small> (min 6)</small></label>

                            @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        </div>

                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-lock prefix"></i>
                                <input id="password-confirm_Form1" type="password" class="form-control form-control-sm validate" name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm_Form1">Konfirmasi Password</label>
                        </div>

                        <div class="text-center mt-2">
                        <button type="submit" class="btn btn-default">DAFTAR<i class="fas fa-sign-in ml-1"></i></button>
                        </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-center text-md-right mt-1">
                            <p>Sudah Punya Akun?<a href="{{route('login')}}" class="blue-text">&nbsp;Masuk</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info btn-sm waves-effect ml-auto" data-dismiss="modal">X</button>
                        </div>
                    </form>
                    </div>
                    <!--/.Panel 8-->









                <!--Panel 8-->
                <div class="tab-pane fade" id="panel8" role="tabpanel">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="role_id" value="2">
                <!--Body-->
                <div class="modal-body mb-1">
                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-user-edit prefix"></i>
                        <input type="text" id="namaForm2" class="form-control form-control-sm validate @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                            <label for="namaForm2">Nama</label>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-user-circle prefix"></i>
                        <input type="text" id="usernameForm2" class="form-control form-control-sm validate @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                        <label for="usernameForm2">Username</label>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="emailForm2" class="form-control form-control-sm validate  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label data-error="Format_Email_@" for="emailForm2">E-Mail</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-phone prefix"></i>
                        <input type="number" id="no_hp_Form2" class="form-control form-control-sm validate @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">
                        <label data-error="Format_Nomor" for="no_hp_Form2">No Telepon<small> (min 12)</small></label>

                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-map-marker-alt prefix"></i>
                        <textarea id="alamatForm2" class="md-textarea form-control @error('alamat') is-invalid @enderror" rows="1" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat"></textarea>
                        <label for="alamatForm2">Alamat</label>

                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-user prefix"></i>
                        <input type="date" id="umurForm2" class="form-control form-control-sm validate @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir">
                        <label data-error="tidak_boleh_0" for="umurForm2">Tangga Lahir</label>

                        @error('umur')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="text-center mb-5  @error('jenis_kelamin') is-invalid @enderror">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="RB_1_Form2" type="radio" class="custom-control-input" name="jenis_kelamin" value="Laki - Laki">
                            <label class="custom-control-label" for="RB_1_Form2">Laki - Laki</label>
                        </div>
                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                            <input id="RB_2_Form2" type="radio" class="custom-control-input" name="jenis_kelamin" value="Perempuan">
                            <label class="custom-control-label" for=RB_2_Form2>Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="md-form form-sm mb-4">
                        <i class="fas fa-lock prefix"></i>
                        <input id="passwordForm2" type="password" class="form-control form-control-sm validate @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="passwordForm2">Password<small> (min 6)</small></label>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>

                    <div class="md-form form-sm mb-4">
                        <i class="fas fa-lock prefix"></i>
                            <input id="password-confirm_Form2" type="password" class="form-control form-control-sm validate" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm_Form2">Konfirmasi Password</label>
                    </div>

                    <div class="text-center mt-2">
                    <button type="submit" class="btn btn-default">DAFTAR<i class="fas fa-sign-in ml-1"></i></button>
                    </div>
                 </div>
                <!--Footer-->
                <div class="modal-footer">
                    <div class="options text-center text-md-right mt-1">
                    <p>Sudah Punya Akun?<a href="{{route('login')}}" class="blue-text">&nbsp;Masuk</a></p>
                    </div>
                    <button type="button" class="btn btn-outline-info btn-sm waves-effect ml-auto" data-dismiss="modal">X</button>
                </div>
                 </form>
                </div>
                <!--/.Panel 8-->

              </div>

            </div>
          </div>
          <!--/.Content-->
        </div>
      </div>
      <!--Modal: Login / Register Form-->


