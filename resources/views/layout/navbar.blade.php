<aside class="main-sidebar sidebar" background-color: white>
    <!-- Brand Logo -->
    <a  class="brand-link">
      <img src="{{ asset('adminlte/dist/img/tinfo3.jpg')}}" alt="" class="brand-image" style="opacity: .8">
      <span class="brand-text">Presensi TI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->username}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <!-- Tampilan Admin -->
        @if (auth()->check() && auth()->user()->role == "admin")
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dosen.index')}}" class="nav-link {{ (Route::currentRouteName() == 'dosen.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mahasiswa.index')}}" class="nav-link {{ (Route::currentRouteName() == 'mahasiswa.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tahun_ajar.index')}}" class="nav-link {{ (Route::currentRouteName() == 'tahun_ajar.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tahun Ajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kelas.index')}}" class="nav-link {{ (Route::currentRouteName() == 'kelas.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('matakuliah.index')}}" class="nav-link {{ (Route::currentRouteName() == 'matakuliah.index') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                  <p>Matakuliah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('prodi.index')}}" class="nav-link {{ (Route::currentRouteName() == 'prodi.index') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                  <p>Prodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('jadwal.index')}}" class="nav-link {{ (Route::currentRouteName() == 'jadwal.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('rekapabsensi.index')}}" class="nav-link {{ (Route::currentRouteName() == 'rekapabsensi.index') ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rekapitulasi Absensi</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        <!-- Tampilan Dosen -->
        @elseif(auth()->check() && auth()->user()->role == "dosen")
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('absensi.create')}}" class="nav-link {{ (Route::currentRouteName() == 'absensi.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ambil Absensi</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('absensi.index')}}" class="nav-link {{ (Route::currentRouteName() == 'absensi.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>

        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
