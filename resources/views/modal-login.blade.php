<form method="POST" action="{{ route('login') }}">
@csrf
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>LOGIN</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <!--Body-->
                <div class="md-form mb-5">
                    <input type="text" id="Form-email1" class="form-control validate  {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                      <label for="Form-email1">Email atau Username</label>
                      @if($errors->has('username') || $errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('username')?: $errors->first('email') }}
                        </div>
                      @endif
                    </div>
                <div class="md-form pb-3">
                    <input type="password" id="Form-pass1" class="form-control validate  @error('password') is-invalid @enderror" name="password" required  autocomplete="current-password">
                      <label for="Form-pass1">Password</label>
                      @if($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password')}}
                        </div>
                      @endif
                      {{-- @if (Route::has('password.request'))
                        <p class="font-small blue-text d-flex justify-content-end">Lupa <a href="{{ route('password.request') }}" class="blue-text ml-1"> Password?</a></p>
                      @endif --}}
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-default btn-block btn-rounded z-depth-1a">Masuk</button>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">Tidak Punya Akun?
                    @if (Route::has('register'))
                    <a href="{{ route('register')}}" class="blue-text ml-1">Daftar</a>
                    @endif
                </p>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
</form>
<!-- Modal -->
