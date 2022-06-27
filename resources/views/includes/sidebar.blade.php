  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item bg-dark">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>



      <!-- End Components Nav -->

      @can('admin')
      <li class="nav-item bg-dark">
        <a class="nav-link collapsed" href="{{url('proyek')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Proyek</span>
        </a>
      </li>
      <li class="nav-item bg-dark">
        <a class="nav-link collapsed" href="{{url('bukukas')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Buku Kas Umum</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Jenis Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/bukumaterial">
              <i class="bi bi-circle"></i><span>Buku Material</span>
            </a>
          </li>
          <li>
            <a href="/bukuoperasional">
              <i class="bi bi-circle"></i><span>Buku Operasional</span>
            </a>
          </li>
          <li>
            <a href="/bukuaset">
              <i class="bi bi-circle"></i><span>Buku Aset</span>
            </a>
          </li>
          <li>
            <a href="/bukuupah">
              <i class="bi bi-circle"></i><span>Buku Upah</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item bg-dark">
        <a class="nav-link collapsed" href="{{url('rekap')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Rekap Buku Kas</span>
        </a>
      </li>
      <li class="nav-item bg-dark">
        <a class="nav-link collapsed" href="{{url('pengajuan')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Laporan Pengajuan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dmbukumaterial">
              <i class="bi bi-circle"></i><span>Buku Material</span>
            </a>
          </li>
          <li>
            <a href="/dmbukuoperasional">
              <i class="bi bi-circle"></i><span>Buku Operasional</span>
            </a>
          </li>
          <li>
            <a href="/dmbukuaset">
              <i class="bi bi-circle"></i><span>Buku Aset</span>
            </a>
          </li>
          <li>
            <a href="/dmbukuupah">
              <i class="bi bi-circle"></i><span>Buku Upah</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      @can('supervisor')
      <li class="nav-item bg-dark">
        <a class="nav-link collapsed" href="{{url('bukukas')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Buku Kas Umum</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Jenis Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/bukumaterial">
              <i class="bi bi-circle"></i><span>Buku Material</span>
            </a>
          </li>
          <li>
            <a href="/bukuoperasional">
              <i class="bi bi-circle"></i><span>Buku Operasional</span>
            </a>
          </li>
          <li>
            <a href="/bukuaset">
              <i class="bi bi-circle"></i><span>Buku Aset</span>
            </a>
          </li>
          <li>
            <a href="/bukuupah">
              <i class="bi bi-circle"></i><span>Buku Upah</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item bg-dark">
        <a class="nav-link collapsed" href="{{url('laporan')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Laporan Rekap</span>
        </a>
      </li>
      @endcan

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="\profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @auth
      <li class="nav-item">
        <form action="/logout" method="POST">
          @csrf
          <a class="nav-link collapsed">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </form>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link collapsed" href="\login">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>
      @endauth
      <!-- End Login Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->