  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link collapsed" href="{{('/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>



      <!-- End Components Nav -->
      @can('lapangan')
      <li class="nav-item ">
        <a class="nav-link collapsed" href="{{url('/cariprogres')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Progres Proyek</span>
        </a>
      </li>
      @endcan

      @can('admin')
      <li class="nav-item ">
        <a class="nav-link collapsed" href="{{url('/proyek')}}">
          <i class="bi bi-building"></i>
          <span>Proyek</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="{{url('/bukukas')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Buku Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item ">
            <a class="nav-link collapsed" href="{{url('/bukukas')}}">
              <i class="bi bi-menu-button-wide"></i>
              <span>Buku Kas Umum</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapse" data-bs-target="#jenis-kas" data-bs-toggle="collapse" href="#jenis-kas">
              <i class="bi bi-menu-button-wide"></i><span>Jenis Kas</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="jenis-kas" class="nav-content collapse" data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{url('/bukumaterial')}}">
                  <i class="bi bi-circle"></i><span>Buku Material</span>
                </a>
              </li>
              <li>
                <a href="{{url('/bukuoperasional')}}">
                  <i class="bi bi-circle"></i><span>Buku Operasional</span>
                </a>
              </li>
              <li>
                <a href="{{url('/bukuaset')}}">
                  <i class="bi bi-circle"></i><span>Buku Aset</span>
                </a>
              </li>
              <li>
                <a href="{{url('/bukuupah')}}">
                  <i class="bi bi-circle"></i><span>Buku Upah</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a class="nav-link collapsed" href="{{url('/rekap')}}">
              <i class="bi bi-menu-button-wide"></i>
              <span>Rekap Buku Kas</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link collapsed" href="{{url('/pengajuan')}}">
              <i class="bi bi-menu-button-wide"></i>
              <span>Laporan Pengajuan</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/dmbukumaterial')}}">
              <i class="bi bi-circle"></i><span>Buku Material</span>
            </a>
          </li>
          <li>
            <a href="{{url('/dmbukuoperasional')}}">
              <i class="bi bi-circle"></i><span>Buku Operasional</span>
            </a>
          </li>
          <li>
            <a href="{{url('/dmbukuaset')}}">
              <i class="bi bi-circle"></i><span>Buku Aset</span>
            </a>
          </li>
          <li>
            <a href="{{url('/dmbukuupah')}}">
              <i class="bi bi-circle"></i><span>Buku Upah</span>
            </a>
          </li>

        </ul>
      </li>
      @endcan

      @can('supervisor')
      <li class="nav-item ">
        <a class="nav-link collapsed" data-bs-target="#components-na2" data-bs-toggle="collapse" href="{{url('/bukukas')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Buku Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-na2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item ">
            <a class="nav-link collapsed" href="{{url('/bukukas')}}">
              <i class="bi bi-menu-button-wide"></i>
              <span>Buku Kas Umum</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Jenis Kas</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{url('/bukumaterial')}}">
                  <i class="bi bi-circle"></i><span>Buku Material</span>
                </a>
              </li>
              <li>
                <a href="{{url('/bukuoperasional')}}">
                  <i class="bi bi-circle"></i><span>Buku Operasional</span>
                </a>
              </li>
              <li>
                <a href="{{url('/bukuaset')}}">
                  <i class="bi bi-circle"></i><span>Buku Aset</span>
                </a>
              </li>
              <li>
                <a href="{{url('/bukuupah')}}">
                  <i class="bi bi-circle"></i><span>Buku Upah</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      <li class="nav-item ">
        <a class="nav-link collapsed" href="{{url('/laporan')}}">
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
          <button type="submit" class="nav-link collapsed" style="border: none ;">
            <i class=" bi bi-box-arrow-right"></i>Sign Out
          </button>
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