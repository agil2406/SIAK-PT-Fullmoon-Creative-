  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{Request::is('dashboard') ? '' : 'collapsed'}}" href="{{('/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>



      <!-- End Components Nav -->
      @can('lapangan')
      <li class="nav-item ">
        <a class="nav-link {{Request::is('cariprogres') ? '' : 'collapsed'}}" href="{{url('/cariprogres')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Progres Proyek</span>
        </a>
      </li>
      @endcan

      @can('admin')

      <li class="nav-item ">
        <a class="nav-link {{Request::is('proyek') ? '' : 'collapsed'}}" href="{{url('/proyek')}}">
          <i class="bi bi-building"></i>
          <span>Proyek</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="{{url('/kas')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Buku Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{Request::is('bukukas','rekap','pengajuan') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li class="nav-item ">
            <a class="nav-link collapsed {{Request::is('bukukas') ? 'active' : ''}}" href="{{url('/bukukas')}}" id="kasumum">
              <i class="bi bi-menu-button-wide"></i>
              <span>Buku Kas Umum</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link collapsed {{Request::is('rekap') ? 'active' : ''}}" href="{{url('/rekap')}}">
              <i class="bi bi-menu-button-wide"></i>
              <span>Rekap Buku Kas</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link collapsed {{Request::is('pengajuan') ? 'active' : ''}}" href="{{url('/pengajuan')}}">
              <i class="bi bi-menu-button-wide"></i>
              <span>Laporan Pengajuan</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#jenis-kas" data-bs-toggle="collapse" href="#jenis-kas">
          <i class="bi bi-menu-button-wide"></i><span>Jenis Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="jenis-kas" class="nav-content collapse {{Request::is('bukumaterial','bukuaset','bukuoperasional','bukuupah') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/bukumaterial')}}" class="nav-link collapsed  {{Request::is('bukumaterial') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Material</span>
            </a>
          </li>
          <li>
            <a href="{{url('/bukuoperasional')}}" class="nav-link collapsed  {{Request::is('bukuoperasional') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Operasional</span>
            </a>
          </li>
          <li>
            <a href="{{url('/bukuaset')}}" class="nav-link collapsed  {{Request::is('bukuaset') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Aset</span>
            </a>
          </li>
          <li>
            <a href="{{url('/bukuupah')}}" class="nav-link collapsed  {{Request::is('bukuupah') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Upah</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse {{Request::is('dmbukumaterial','dmbukuaset','dmbukuoperasional','dmbukuupah') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/dmbukumaterial')}}" class="nav-link collapsed  {{Request::is('dmbukumaterial') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Material</span>
            </a>
          </li>
          <li>
            <a href="{{url('/dmbukuoperasional')}}" class="nav-link collapsed  {{Request::is('dmbukuoperasional') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Operasional</span>
            </a>
          </li>
          <li>
            <a href="{{url('/dmbukuaset')}}" class="nav-link collapsed  {{Request::is('dmbukuaset') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Aset</span>
            </a>
          </li>
          <li>
            <a href="{{url('/dmbukuupah')}}" class="nav-link collapsed  {{Request::is('dmbukuupah') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Upah</span>
            </a>
          </li>

        </ul>
      </li>
      @endcan

      @can('supervisor')
      <li class="nav-item ">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="{{url('/kas')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Buku Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{Request::is('bukukas','rekap','pengajuan') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li class="nav-item ">
            <a class="nav-link collapsed {{Request::is('bukukas') ? 'active' : ''}}" href="{{url('/bukukas')}}" id="kasumum">
              <i class="bi bi-menu-button-wide"></i>
              <span>Buku Kas Umum</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#jenis-kas" data-bs-toggle="collapse" href="#jenis-kas">
          <i class="bi bi-menu-button-wide"></i><span>Jenis Kas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="jenis-kas" class="nav-content collapse {{Request::is('bukumaterial','bukuaset','bukuoperasional','bukuupah') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/bukumaterial')}}" class="nav-link collapsed  {{Request::is('bukumaterial') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Material</span>
            </a>
          </li>
          <li>
            <a href="{{url('/bukuoperasional')}}" class="nav-link collapsed  {{Request::is('bukuoperasional') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Operasional</span>
            </a>
          </li>
          <li>
            <a href="{{url('/bukuaset')}}" class="nav-link collapsed  {{Request::is('bukuaset') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Aset</span>
            </a>
          </li>
          <li>
            <a href="{{url('/bukuupah')}}" class="nav-link collapsed  {{Request::is('bukuupah') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Buku Upah</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{Request::is('laporan') ? '' : 'collapsed'}}" href="{{url('/laporan')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Laporan Rekap</span>
        </a>
      </li>

      @endcan

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link {{Request::is('profile') ? '' : 'collapsed'}}" href="\profile">
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
        <a class="nav-link collapsed " href="\login">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>
      @endauth
      <!-- End Login Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->