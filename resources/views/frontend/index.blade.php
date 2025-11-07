<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sistem Inventaris Barang</title>
    <meta name="description" content="Sistem manajemen inventaris untuk memantau stok barang, kategori, dan transaksi.">
    <meta name="keywords" content="Inventaris, Barang, Stok, Kategori, Supplier">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="#hero" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Inventaris</h1><span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#menu">Data Barang</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>
    <!-- End Header -->

    <main class="main">

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero section light-background py-5">
            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Selamat Datang di<br><span class="text-primary">Sistem Inventaris
                                Barang</span></h1>
                        <p data-aos="fade-up" data-aos-delay="100">
                            Kelola data barang, kategori, supplier, dan transaksi dengan mudah. Pantau stok dan
                            aktivitas keluar-masuk
                            barang secara real-time.
                        </p>
                        <div class="d-flex gap-3 mt-3" data-aos="fade-up" data-aos-delay="200">
                            <a href="#menu" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-seam me-2"></i> Lihat Data Barang
                            </a>
                            <a href="#laporan" class="btn btn-outline-primary btn-lg">
                                <i class="bi bi-graph-up-arrow me-2"></i> Lihat Laporan
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 text-center" data-aos="zoom-out">
                        <img src="assets/img/undraw_logistics_8vri.svg" class="img-fluid animated"
                            alt="Dashboard Inventaris">
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- ======= Ringkasan Data Section ======= -->
        <section id="summary" class="summary section py-5">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center mb-5">
                    <h2>Ringkasan Data Inventaris</h2>
                    <p class="text-muted">Informasi penting terkait kondisi sistem inventaris saat ini.</p>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card text-center shadow-sm border-0">
                            <div class="card-body py-4">
                                <i class="bi bi-box-seam fs-1 text-primary"></i>
                                <h5 class="mt-3">Total Barang</h5>
                                <p class="fs-4 fw-bold mb-0 text-dark">125</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card text-center shadow-sm border-0">
                            <div class="card-body py-4">
                                <i class="bi bi-tags fs-1 text-success"></i>
                                <h5 class="mt-3">Kategori</h5>
                                <p class="fs-4 fw-bold mb-0 text-dark">8</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="card text-center shadow-sm border-0">
                            <div class="card-body py-4">
                                <i class="bi bi-truck fs-1 text-warning"></i>
                                <h5 class="mt-3">Supplier</h5>
                                <p class="fs-4 fw-bold mb-0 text-dark">15</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="card text-center shadow-sm border-0">
                            <div class="card-body py-4">
                                <i class="bi bi-arrow-left-right fs-1 text-danger"></i>
                                <h5 class="mt-3">Transaksi</h5>
                                <p class="fs-4 fw-bold mb-0 text-dark">320</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Ringkasan Data Section -->

        @include('frontend._barang')
        @include('frontend._kontak')

    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container text-center py-3">
            <p class="mb-1">© <strong class="sitename">Inventaris</strong> 2025. All Rights Reserved</p>
            <p class="small text-secondary">Dikelola oleh Tim Sistem Inventaris</p>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
