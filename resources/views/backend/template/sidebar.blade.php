<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="brand-title d-flex align-items-center gap-2">
                <i class="ti ti-box"></i>
                <span>Inventaris</span>
            </a>

            <button class="btn p-0 d-xl-none sidebartoggler" id="sidebarCollapse" type="button">
                <i class="ti ti-x fs-8"></i>
            </button>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- MASTER DATA -->
                <li
                    class="sidebar-item has-sub {{ request()->routeIs('barang.*') || request()->routeIs('kategori.*') || request()->routeIs('inventori.*') ? 'active' : '' }}">

                    <a class="sidebar-link d-flex align-items-center justify-content-between" href="#"
                        data-toggle="collapse" data-target="#menuMasterData"
                        aria-expanded="{{ request()->routeIs('barang.*') || request()->routeIs('kategori.*') || request()->routeIs('inventori.*') ? 'true' : 'false' }}">

                        <span class="d-flex align-items-center">
                            <i class="ti ti-database"></i>
                            <span class="hide-menu ms-2">Master Data</span>
                        </span>

                        <i class="ti ti-chevron-down transition-fast"></i>
                    </a>

                    <ul id="menuMasterData"
                        class="sidebar-dropdown ps-4 {{ request()->routeIs('barang.*') || request()->routeIs('kategori.*') || request()->routeIs('inventori.*') ? 'show' : '' }}">

                        <li class="sidebar-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                            <a class="sidebar-link d-flex align-items-center" href="{{ route('kategori.index') }}">
                                <i class="ti ti-tags"></i>
                                <span class="ms-2">Manajemen Kategori</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                            <a class="sidebar-link d-flex align-items-center" href="{{ route('barang.index') }}">
                                <i class="ti ti-box"></i>
                                <span class="ms-2">Manajemen Barang</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('inventory.*') ? 'active' : '' }}">
                            <a class="sidebar-link d-flex align-items-center" href="{{ route('inventory.index') }}">
                                <i class="ti ti-package"></i>
                                <span class="ms-2">Inventori</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Transaksi -->
                <li class="sidebar-item {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                    <a class="sidebar-link d-flex align-items-center" href="{{ route('transaksi.index') }}">
                        <i class="ti ti-currency-dollar"></i>
                        <span class="hide-menu ms-2">Transaksi</span>
                    </a>
                </li>

                <!-- LAPORAN -->
                <li class="sidebar-item has-sub">

                    <a class="sidebar-link d-flex align-items-center justify-content-between" href="#"
                        data-toggle="collapse" data-target="#menuLaporan" aria-expanded="false">

                        <span class="d-flex align-items-center">
                            <i class="ti ti-file-text"></i>
                            <span class="hide-menu ms-2">Laporan</span>
                        </span>

                        <i class="ti ti-chevron-down transition-fast"></i>
                    </a>

                    <ul id="menuLaporan" class="collapse sidebar-dropdown ps-4">

                        <li class="sidebar-item">
                            <a class="sidebar-link d-flex align-items-center"
                                href="{{ route('laporan-transaksi.index') }}">
                                <i class="ti ti-receipt"></i>
                                <span class="ms-2">Laporan Transaksi</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('laporan.stok.*') ? 'active' : '' }}">
                            <a class="sidebar-link d-flex align-items-center" href="{{ route('laporan.stok') }}">
                                <i class="ti ti-package"></i>
                                <span class="ms-2">Laporan Stok</span>
                            </a>
                        </li>

                    </ul>
                </li>

                @if (auth()->user()->role == 'admin')
                    <!-- Managemen user -->
                    <li class="sidebar-item {{ request()->routeIs('managemen-user.*') ? 'active' : '' }}">
                        <a class="sidebar-link d-flex align-items-center" href="{{ route('managemen-user.index') }}">
                            <i class="ti ti-users"></i>
                            <span class="hide-menu ms-2">Management Pengguna</span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
