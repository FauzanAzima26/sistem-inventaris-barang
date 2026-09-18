<footer class="landing-footer bg-body footer-text">
    <div class="footer-top position-relative overflow-hidden z-1">
        <img
            src="../../assets/img/front-pages/backgrounds/footer-bg-light.png"
            alt="footer bg"
            class="footer-bg banner-bg-img z-n1"
            data-app-light-img="front-pages/backgrounds/footer-bg-light.png"
            data-app-dark-img="front-pages/backgrounds/footer-bg-dark.png" />
        <div class="container">
            <div class="row gx-0 gy-6 g-lg-10">
                <!-- Kolom 1: Profil Sistem Internal -->
                <div class="col-lg-5">
                    <a href="{{ url('/') }}" class="app-brand-link mb-6">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/inventory_logo_speed_box.svg') }}"
                                alt="Logo" class="app-brand-img">
                        </span>
                        <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">INV-SYS</span>
                    </a>
                    <p class="footer-text footer-logo-description mb-6">
                        Sistem Informasi Manajemen Inventaris Barang Aset Perusahaan Terintegrasi v2.0.
                    </p>
                    <div class="small text-muted">
                        <i class="bx bx-check-shield text-success me-1"></i> Mode Koneksi Aman Terenkripsi SSL Aktif
                    </div>
                </div>

                <!-- Kolom 2: Pintasan Navigasi Sistem -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h6 class="footer-title mb-6">Navigasi Utama</h6>
                    <ul class="list-unstyled">
                        <li class="mb-4">
                            <a href="{{ route('login') }}" class="footer-link">Dasbor Aplikasi</a>
                        </li>
                        <li class="mb-4">
                            <a href="#landingFeatures" class="footer-link">SOP & Alur Kerja</a>
                        </li>
                        <li class="mb-4">
                            <a href="#landingFunFacts" class="footer-link font-small">Statistik Gudang</a>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 3: Pusat Bantuan Internal & IT Support -->
                <div class="col-lg-4 col-md-6">
                    <h6 class="footer-title mb-6">IT Support & Dokumentasi</h6>
                    <ul class="list-unstyled">
                        <li class="mb-4">
                            <a href="#" class="footer-link d-flex align-items-center">
                                📑 Unduh Buku Panduan Staf (PDF)
                            </a>
                        </li>
                        <li class="mb-4 text-muted small">
                            Kendala sistem? Hubungi IT Support Perusahaan:<br>
                            📧 <span class="text-primary">helpdesk@perusahaan.com</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Hak Cipta Bawah -->
    <div class="footer-bottom py-3 py-md-5">
        <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
            <div class="mb-2 mb-md-0">
                <span class="footer-bottom-text">©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </span>
                <span class="fw-medium text-white">Divisi Logistik & Aset Internal Perusahaan.</span>
                <span class="footer-bottom-text"> Hak Cipta Dilindungi.</span>
            </div>
        </div>
    </div>
</footer>