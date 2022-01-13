<nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto " href=" {{ url('/', [])  }}  ">Beranda</a></li>
      <li><a class="nav-link scrollto " href="{{ url('form-daftar', []) }}">Pendaftaran</a></li>
      @if (\Auth::guard('mahasiswa')->check())
      <li><a class="nav-link scrollto " href="{{ url('mahasiswa/beranda', []) }}">Beranda</a></li>
          
      @else
      <li><a class="nav-link scrollto " href="{{ url('mahasiswa/beranda', []) }}">Login</a></li>
      @endif
            <li><a class="nav-link scrollto" href="{{ url('#', []) }}">Jurusan</a></li>
      @if (\Auth::guard('mahasiswa')->check())
      <li><a class="nav-link scrollto" href="{{ url('logout', []) }}">Logout</a></li>
      @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>