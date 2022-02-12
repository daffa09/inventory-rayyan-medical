    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
              <span data-feather="user"></span>
              Profile
            </a>
          </li>

        </ul>

      @can('admin')        
        <ul class="nav flex-column unselectable">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pesan*') ? 'active' : '' }}" href="/dashboard/pesan">
              <span data-feather="shopping-cart"></span>
              Pesan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/DataBarang*') ? 'active' : '' }}" href="/dashboard/DataBarang">
              <span data-feather="package"></span>
              Data Barang
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/DataKaryawan*') ? 'active' : '' }}" href="/dashboard/DataKaryawan">
              <span data-feather="users"></span>
              Data karyawan
            </a>
          </li>
          <li class="nav-item has-submenu ">
          <a class="nav-link dropdown-toggle {{ Request::is('dashboard/Laporan*') ? 'active' : '' }}" data-bs-toggle="dropdown" role="button">

            <span data-feather="clipboard"></span>
              Laporan Barang</a>
            <ul class="submenu collapse">

              <li><a class="nav-link {{ Request::is('dashboard/Laporan/BarangMasuk*') ? 'active' : '' }}"  href="/dashboard/Laporan/BarangMasuk">
            <span data-feather="inbox"></span>
                Barang Masuk</a></li>

              <li><a class="nav-link {{ Request::is('dashboard/Laporan/BarangKeluar*') ? 'active' : '' }}" href="/dashboard/Laporan/BarangKeluar">
            <span data-feather="package"></span>
                Barang Keluar</a></li>
            </ul>
        </ul>
      @endcan

      @can('karyawan')
        <ul class="nav flex-column unselectable">
          {{-- akses karyawan --}}
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/stokBarang*') ? 'active' : '' }}" href="/dashboard/stokBarang">
              <span data-feather="grid"></span>
              Data Barang
            </a>
          </li>

          <li class="nav-item has-submenu">
          <a class="nav-link dropdown-toggle {{ Request::is('dashboard/InputBarang*') ? 'active' : '' }}" data-bs-toggle="dropdown" role="button"  name="laporan" id="laporan">

            <span data-feather="archive"></span>
              Input Stok Barang</a>

            <ul class="submenu collapse" for="laporan">

              <li><a class="nav-link {{ Request::is('dashboard/InputBarang/BarangMasuk*') ? 'active' : '' }}"  href="/dashboard/InputBarang/BarangMasuk"  name="laporan" id="laporan">
            <span data-feather="inbox"></span>
                Barang masuk</a></li>

              <li><a class="nav-link {{ Request::is('dashboard/InputBarang/BarangKeluar*') ? 'active' : '' }}" href="/dashboard/InputBarang/BarangKeluar"  name="laporan" id="laporan">
            <span data-feather="package"></span>
                Barang keluar</a></li>
            </ul>
          {{-- akhir akses karaywan --}}
        </ul>
      @endcan

      </div>
    </nav>
    