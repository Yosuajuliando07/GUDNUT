<!--Main Navigation-->
<header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">
    <!-- Brand -->
    <a class="navbar-brand waves-effect" href="{{route('home')}}">
        <img src="{{asset('img/logo.png')}}" height="30">
    </a>
        <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left -->
              <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link waves-effect" href="{{route('home')}}">Home
                    {{-- <span class="sr-only">(current)</span> --}}
                </a>
                </li>
                <li class="nav-item {{ Request::is('shop*') ? 'active' : '' }}">
                <a class="nav-link waves-effect" href="{{route('shop.index')}}">Shop</a>
                </li>
                <li class="nav-item {{ Request::is('pageblog*') ? 'active' : '' }}">
                <a class="nav-link waves-effect" href="{{route('pageblog.index')}}">Blog</a>
                </li>
              </ul>


            <form class="form-inline active-pink-4" method="GET" action="{{route('search')}}">
            <input class="form-control form-control-sm mr-2 " type="text" value="{{isset($query) ? $query : ''}}" placeholder="Cari Produk" name="query" aria-label="Search">
            </form>

              <!-- Right -->
              <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                <a href="{{route('keranjang.index')}}" class="nav-link waves-effect text-default">
                    <i class="fas fa-shopping-cart"></i>
                     {{-- @if (Cart::instance('default')->count() > 0 ) --}}
                     {{-- @if (Cart::instance()->count() > 0 ) --}}
                     @if (Cart::content()->count() > 0)
                     <span class="badge red z-depth-1 mr-1"> {{Cart::content()->count()}}
                     </span>
                     @endif
                        {{-- {{Cart::instance()->count() }} --}}

                    {{-- @endif --}}
                  </a>
                </li>

             <!-- Authentication Links -->
             @guest
             <li class="nav-item  mr-2">
                <a href="{{ route('login') }}" class="nav-link waves-effect" data-toggle="modal" data-target="#elegantModalForm">
                  Login
                </a>
            </li>

            @if(Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link border border-light rounded waves-effect"  data-toggle="modal" data-target="#mymodal">
                  Daftar
                </a>
              </li>

              {{-- <div class="text-center">
                    <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Launch
                      Modal LogIn/Register</a>
                  </div> --}}

            @endif
            @else
            <ul class="navbar-nav ml-2 " >
                    <li class="nav-item avatar">
                          <a class="nav-link p-0" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                              <img src="{{url ('/upload/profil/'.Auth::user()->gambar)}}" class="rounded-circle z-depth-0" height="35">
                          <span>{{Auth::user()->nama}}</span>

                           </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink-4">

                        @if (Auth::user()->role->level == 'Pelanggan')
                        <a class="dropdown-item" href="{{route('pelanggan.profil')}}">Profil</a>
                        <a class="dropdown-item" href="{{route('order.index')}}">Order</a>
                        @endif

                          @if (Auth::user()->role->level == 'Penjual')
                          <a class="dropdown-item text-default" href="{{route('penjual.dashboard')}}"><i class="fas fa-arrow-circle-right"></i> Dashboard</a>
                          @endif

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>

                        @endguest
                    </li>
                </ul>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Navbar -->
      </header>
      <!--Main Navigation-->
