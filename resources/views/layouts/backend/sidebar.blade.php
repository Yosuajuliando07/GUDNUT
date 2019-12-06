<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="align-center">
                <div class="image">
                    <img src="{{url ('/upload/profil/'.Auth::user()->gambar)}}" class="avatarheader" alt="{{ Auth::user()->nama }}"/>
                    <h5 class="name font-bold col-cyan">{{ Auth::user()->username }}</h5>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                @if (Auth::check() && Auth::user()->role->id == 1)
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/profil*') ? 'active' : '' }}">
                    <a href="{{ route('admin.profil') }}">
                        <i class="material-icons">person</i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="{{ Request::is('slider*') ? 'active' : '' }}">
                    <a href="{{ route('slider.index') }}">
                        <i class="material-icons">photo_library</i>
                        <span class="icon-name">Kelola Slider</span>
                    </a>
                </li>
                <li class="{{ Request::is('kategoriblog*') ? 'active' : '' }}">
                    <a href="{{route('kategoriblog.index')}}">
                        <i class="material-icons">view_list</i>
                        <span class="icon-name">Kategori Blog</span>
                    </a>
                </li>
                <li class="{{ Request::is('blog*') ? 'active' : '' }}">
                    <a href="{{route('blog.index')}}">
                        <i class="material-icons">dvr</i>
                        <span class="icon-name">Kelola Blog</span>
                    </a>
                </li>
                <li class="{{ Request::is('kelola*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">supervisor_account</i>
                        <span>Kelola Users</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li class="{{ Request::is('kelola/admin*') ? 'active' : '' }}">
                            <a href="{{route('admin.index')}}" class=" waves-effect waves-block">ADMINISTRATOR (Level 1)</a>
                        </li>
                        <li class="{{ Request::is('kelola/penjual*') ? 'active' : '' }}">
                            <a href="{{route('penjual.index')}}" class=" waves-effect waves-block">PENJUAL (Level 2)</a>
                        </li>
                        <li class="{{ Request::is('kelola/pelanggan*') ? 'active' : '' }}">
                            <a href="{{route('pelanggan.index')}}" class=" waves-effect waves-block">PELANGGAN (Level 3)</a>
                         </li>
                        </ul>
                    </li>
                    <li class="header">MARKETPLACE</li>
                    <li class="{{ Request::is('displayorder*') ? 'active' : '' }}">
                        <a href="{{ route('displayorder.index')}}">
                            <i class="material-icons">assignment</i>
                            <span class="icon-name">Konfirmasi Order</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('kategoriproduk*') ? 'active' : '' }}">
                    <a href="{{ route('kategoriproduk.index')}}">
                        <i class="material-icons">today</i>
                        <span class="icon-name">Kategori Produk</span>
                    </a>
                </li>
                <li class="{{ Request::is('displayproduk*') ? 'active' : '' }}">
                    <a href="{{route('displayproduk.index')}}">
                        <i class="material-icons">shopping_basket</i>
                        <span class="icon-name">Produk Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </a>
                </li>

                @else
                <li class="{{ Request::is('penjual/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('penjual.dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{ Request::is('penjual/profil*') ? 'active' : '' }}">
                    <a href="{{route('penjual.profil')}}">
                        <i class="material-icons">person</i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="{{ Request::is('produk*') ? 'active' : '' }}">
                    <a href="{{route('produk.index')}}">
                        <i class="material-icons">shopping_basket</i>
                        <span class="icon-name">Produk</span>
                    </a>
                </li>
                <li class="{{ Request::is('kelolaorder*') ? 'active' : '' }}">
                        <a href="{{route('kelolaorder.index')}}">
                            <i class="material-icons">assignment</i>
                            <span class="icon-name">Orders</span>
                        </a>
                    </li>
                <li>
                <a href="{{ route('logout')}}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            <span>Logout</span>
                            <form  id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 - 2020 <a href="javascript:void(0);">Gudang Nutrisi</a>
                    {{-- AdminBSB - Material Design --}}
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>
