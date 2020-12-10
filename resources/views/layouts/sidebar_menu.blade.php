<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda </a>
      <li><a><i class="fa fa-users"></i> Penulis <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('penulis.tambah')}}">Tambah Penulis</a></li>
          <li><a href="{{route('penulis.index')}}">List Penulis</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-building"></i> Penerbit <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('penerbit.tambah')}}">Tambah Penerbit</a></li>
          <li><a href="{{route('penerbit.index')}}">List Penerbit</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-list"></i> Kategori <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('kategori.tambah')}}">Tambah Kategori</a></li>
          <li><a href="{{route('kategori.index')}}">List Kategori</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-book"></i> Buku <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('buku.tambah')}}">Tambah Buku</a></li>
          <li><a href="{{route('buku.index')}}">List Buku</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-tasks"></i> Peminjaman <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('pinjam.tambah')}}">Tambah Peminjaman</a></li>
          <li><a href="{{route('pinjam.index')}}">List Peminjaman</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>


