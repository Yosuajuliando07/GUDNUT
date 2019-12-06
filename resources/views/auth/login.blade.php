@extends('layouts.logris')

@section('isi')
<body class="login-page">
        <div class="login-box">
            <div class="card">
                <div class="body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="msg">Silahkan Masuk</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input id="login" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                 name="login" value="{{ old('username') ?: old('email') }}" placeholder="Username atau Email" required autofocus>
                                 @if($errors->has('username') || $errors->has('email'))
                                 <div class="text-danger">
                                     {{ $errors->first('username')?: $errors->first('email') }}
                                 </div>
                                 @endif
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input id="password" type="password" class="form-control @error('password')
                                is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                @if($errors->has('password'))
                                <div class="text-danger">
                                {{ $errors->first('password')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-block bg-pink waves-effect" >Masuk</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                    @if (Route::has('register'))
                                <a href="{{ route('register')}}">Daftar</a>
                                @endif
                            </div>
                            <div class="col-xs-6 align-right">
                                    @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Lupa Password?</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
<script src="{{asset('Adminbsb/js/pages/examples/sign-in.js')}}"></script>
</body>
@endsection
