<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/inventory_logo_speed_box.svg') }}"
                    alt="Logo" class="app-brand-img">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('barang.*') || request()->routeIs('kategori.*') || request()->routeIs('inventory.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="Master Data">Master Data</div>
            </a>
            <ul class="menu-sub {{ request()->routeIs('barang.*') || request()->routeIs('kategori.*') || request()->routeIs('inventory.*') ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}" class="menu-link">
                        <div data-i18n="Manajemen Kategori">Manajemen Kategori</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                    <a href="{{ route('barang.index') }}" class="menu-link">
                        <div data-i18n="Manajemen Barang">Manajemen Barang</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('inventory.*') ? 'active' : '' }}">
                    <a href="{{ route('inventory.index') }}" class="menu-link">
                        <div data-i18n="Manajemen Inventori">Manajemen Inventori</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
            <a href="{{ route('transaksi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="Transaksi">Transaksi</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('laporan-transaksi.*') || request()->routeIs('laporan.stok') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>
            <ul class="menu-sub {{ request()->routeIs('laporan.*') ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('laporan-transaksi.*') ? 'active' : '' }}">
                    <a href="{{ route('laporan-transaksi.index') }}" class="menu-link">
                        <div data-i18n="Laporan Transaksi">Laporan Transaksi</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('laporan.stok') ? 'active' : '' }}">
                    <a href="{{ route('laporan.stok') }}" class="menu-link">
                        <div data-i18n="Laporan Inventori">Laporan Inventori</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('managemen-user.*') ? 'active' : '' }}">
            <a href="{{ route('managemen-user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="Management Pengguna">Management Pengguna</div>
            </a>
        </li>
    </ul>
</aside>