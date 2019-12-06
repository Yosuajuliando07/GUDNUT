   <!-- Collapsible content -->
   <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        @foreach ($kablog as $kategori)
        <li class="nav-item {{ Request::is('pageblog/blog-kategori/'.$kategori->id) ? 'active' : '' }} ">
                {{-- active --}}
          <a class="nav-link" href="{{route('showKategoriblog', $kategori->id)}}">{{$kategori->nama}}
            {{-- <span class="sr-only">(current)</span> --}}
            </a>
        </li>
      @endforeach
    </ul>
    <!-- Links -->
  </div>
  <!-- Collapsible content -->
