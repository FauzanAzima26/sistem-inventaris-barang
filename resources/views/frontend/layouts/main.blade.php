<!doctype html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-wide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../assets/"
    data-template="front-pages-no-customizer"
    data-style="light">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Landing Page - Front Pages | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" />

    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <link rel="stylesheet" href="../../assets/vendor/css/pages/front-page.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/nouislider/nouislider.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="../../assets/vendor/css/pages/front-page-landing.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/front-config.js"></script>
</head>

<body>
    <script src="../../assets/vendor/js/dropdown-hover.js"></script>
    <script src="../../assets/vendor/js/mega-dropdown.js"></script>

    <!-- Navbar: Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">

        @include('frontend.hero_section')

        @include('frontend.ringkasan_gudang')

        @include('frontend.alur_kerja_app')

    </div>

    <!-- / Sections:End -->

    <!-- Footer: Start -->
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
                                <!-- Menggunakan SVG bawaan template Anda -->
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                                </svg>
                            </span>
                            <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">SI-BARANG</span>
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
    <!-- Footer: End -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/nouislider/nouislider.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/front-main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/front-page-landing.js"></script>
</body>

</html>