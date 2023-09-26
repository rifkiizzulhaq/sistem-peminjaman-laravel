<nav class="navbar-vertical navbar">
  <div class="nav-scroller">
    <!-- Brand logo -->
    <a class="navbar-brand" href="./index.html">
      <h4 class="text-white">SISLAB POLINDRA</h4>
    </a>
    <!-- Navbar nav -->
    <ul class="navbar-nav flex-column" id="sideNavbar">
      <li class="nav-item">
        <a class="nav-link has-arrow" href="/dashboard">
          <i data-feather="home" class="nav-icon icon-xs me-2"></i>
            Dashboard
        </a>
      </li>

      <!-- Nav item -->
      <li class="nav-item">
        <div class="navbar-heading">MASTER DATA</div>
      </li>

      <!-- Nav item -->
      @if (Auth::User()->role == 'SuperAdmin')
      <li class="nav-item">
        <a
          class="nav-link has-arrow collapsed"
          href="#!"
          data-bs-toggle="collapse"
          data-bs-target="#navPages"
          aria-expanded="false"
          aria-controls="navPages"
          >
          <i data-feather="layers" class="nav-icon icon-xs me-2"> </i>
              Pengguna
        </a>
        @endif
        <div id="navPages" class="collapse" data-bs-parent="#sideNavbar">
          <ul class="nav flex-column">
            @if (Auth::User()->role == 'SuperAdmin')
            <li class="nav-item">
              <a class="nav-link has-arrow" href="{{route('admin')}}">
                admin
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link has-arrow" href="{{route('mahasiswa')}}">
                mahasiswa
              </a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Nav item -->
      @if (Auth::User()->role == 'Admin')
      <li class="nav-item">
        <a class="nav-link has-arrow" href="{{ route('item') }}">
          <i data-feather="package" class="nav-icon icon-xs me-2"> </i>
            Barang
        </a>
      </li>
      @endif
      @if (Auth::User()->role == 'mahasiswa')
      <li class="nav-item">
        <a class="nav-link has-arrow" href="{{ route('index') }}">
          <i data-feather="package" class="nav-icon icon-xs me-2"> </i>
            LAB
        </a>
      </li>
      @endif
      @if (Auth::User()->role == 'mahasiswa')
      <li class="nav-item">
        <a class="nav-link has-arrow" href="{{ route('myCart') }}">
          <i data-feather="package" class="nav-icon icon-xs me-2"> </i>
            Keranjang Peminjaman
        </a>
      </li>
      @endif
      <!-- Nav item -->
      @if (Auth::User()->role == 'Admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.request_pinjaman') }}">
          <i data-feather="sidebar" class="nav-icon icon-xs me-2"> </i>
            Persetujuan Peminjaman
        </a>
      </li>
      @endif
      @if (Auth::User()->role == 'Admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.peminjaman') }}">
          <i data-feather="sidebar" class="nav-icon icon-xs me-2"> </i>
            Status Peminjaman
        </a>
      </li>
      @endif
      @if (Auth::User()->role == 'mahasiswa')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('peminjaman') }}">
          <i data-feather="sidebar" class="nav-icon icon-xs me-2"> </i>
            Status Peminjaman
        </a>
      </li>
      @endif
      <!-- Nav item -->
      @if (Auth::User()->role == 'Admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pengembalian') }}">
          <i data-feather="sidebar" class="nav-icon icon-xs me-2"> </i>
            Pengembalian
        </a>
      </li>
      @endif
    </ul>
  </div>
</nav>
