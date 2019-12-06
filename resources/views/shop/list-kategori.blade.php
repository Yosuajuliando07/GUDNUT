 <!-- Collapsible content -->
 <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
    @foreach ($kapro as $kategori)
        <li class="nav-item {{ Request::is('shop/kategori/'.$kategori->id) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('showKategori', $kategori->id)}}">{{$kategori->nama}}
            <span class="sr-only">(current)</span>
        </a>
        </li>
        @endforeach
    </ul>

</div>
      <!-- Collapsible content -->
