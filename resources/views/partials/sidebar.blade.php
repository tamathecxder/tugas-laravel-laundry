<!-- Sidebar -->
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Sumber Jaya Laundry</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="{{ request()->routeIs('home') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                    href="/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @can('isAdmin')
                <li class="nav-item">
                    <a class="{{ request()->routeIs('outlet.index') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                        href="{{ route('outlet.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Data Outlet</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->routeIs('paket.index') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                        href="{{ route('paket.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Data Paket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->routeIs('member.index') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                        href="{{ route('member.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Data Member</span>
                    </a>
                </li>
            @endcan

            @can('isKasir')
                <li class="nav-item">
                    <a class="{{ request()->routeIs('main-transaksi.index') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                        href="{{ route('main-transaksi.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Main Transaksi</span>
                    </a>
                </li>
            @endcan

            @can('isAdmin')
                <li class="nav-item">
                    <a class="{{ request()->routeIs('main-transaksi.index') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                        href="{{ route('main-transaksi.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Main Transaksi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="{{ request()->routeIs('penjemputan.index') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                        href="{{ route('penjemputan.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Penjemputan</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a class="{{ request()->routeIs('laporan.index') ? 'active bg-gradient-primary' : '' }} nav-link text-white"
                    href="{{ route('laporan.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Generate Laporan</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('barang_inventaris.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Barang Inventaris</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('penggunaan_barang.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Penggunaan Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('absensi.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Absensi Kerja</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Simulasi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('simulasi.sorting') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Simulasi Sorting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('simulasi.test') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Test 2 Sorting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('simulasi.gaji-karyawan') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Simulasi Gaji Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('simulasi.transaksi-barang') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Simulasi transaksi barang</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Uji Kompetensi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('ujikom.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Simulasi Penjualan Aksesoris</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- Endsidebar -->
