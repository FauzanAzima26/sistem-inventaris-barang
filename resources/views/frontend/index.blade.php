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

    <style>
        /* Additional styling for better appearance */
        .index-page {
            font-family: 'Inter', sans-serif;
        }

        .hero {
            padding: 6rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .summary {
            padding: 5rem 0;
            background-color: #ffffff;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #343a40;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .card-body {
            padding: 2rem 1.5rem;
        }

        .card i {
            margin-bottom: 1rem;
        }

        .card h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #495057;
        }

        .card .fs-4 {
            font-size: 2.2rem !important;
        }

        .btn-primary {
            padding: 0.8rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn-outline-primary {
            padding: 0.8rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer .sitename {
            color: #fff;
            font-weight: 700;
        }

        .footer p {
            margin-bottom: 0.5rem;
        }

        .footer .text-secondary {
            color: #adb5bd !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero {
                padding: 4rem 0;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .card-body {
                padding: 1.5rem 1rem;
            }

            .btn-primary, .btn-outline-primary {
                width: 100%;
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }

            .section-title h2 {
                font-size: 1.75rem;
            }

            .card .fs-4 {
                font-size: 1.8rem !important;
            }
        }
    </style>
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
        <section id="hero" class="hero section light-background">
            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Selamat Datang di<br><span class="text-primary">Sistem Inventaris
                                Barang</span></h1>
                        <p data-aos="fade-up" data-aos-delay="100" class="lead">
                            Kelola data barang, kategori, supplier, dan transaksi dengan mudah. Pantau stok dan
                            aktivitas keluar-masuk
                            barang secara real-time.
                        </p>
                        <div class="d-flex gap-3 mt-4" data-aos="fade-up" data-aos-delay="200">
                            <a href="#menu" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-seam me-2"></i> Lihat Data Barang
                            </a>
                            <a href="#laporan" class="btn btn-outline-primary btn-lg">
                                <i class="bi bi-graph-up-arrow me-2"></i> Lihat Laporan
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 text-center" data-aos="zoom-out" data-aos-delay="300">
                        <img src="assets/img/undraw_logistics_8vri.svg" class="img-fluid animated"
                            alt="Dashboard Inventaris" style="max-height: 400px;">
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- ======= Ringkasan Data Section ======= -->
        <section id="summary" class="summary section">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center mb-5">
                    <h2>Ringkasan Data Inventaris</h2>
                    <p class="text-muted">Informasi penting terkait kondisi sistem inventaris saat ini.</p>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card text-center shadow-sm border-0 h-100">
                            <div class="card-body py-5">
                                <i class="bi bi-box-seam fs-1 text-primary mb-3 d-block"></i>
                                <h5 class="fw-semibold mb-2">Total Barang</h5>
                                <p class="display-6 fw-bold mb-0 text-dark">125</p>
                                <small class="text-muted">Item tersedia</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card text-center shadow-sm border-0 h-100">
                            <div class="card-body py-5">
                                <i class="bi bi-tags fs-1 text-success mb-3 d-block"></i>
                                <h5 class="fw-semibold mb-2">Kategori</h5>
                                <p class="display-6 fw-bold mb-0 text-dark">8</p>
                                <small class="text-muted">Kategori aktif</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="card text-center shadow-sm border-0 h-100">
                            <div class="card-body py-5">
                                <i class="bi bi-truck fs-1 text-warning mb-3 d-block"></i>
                                <h5 class="fw-semibold mb-2">Supplier</h5>
                                <p class="display-6 fw-bold mb-0 text-dark">15</p>
                                <small class="text-muted">Mitra supplier</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="card text-center shadow-sm border-0 h-100">
                            <div class="card-body py-5">
                                <i class="bi bi-arrow-left-right fs-1 text-danger mb-3 d-block"></i>
                                <h5 class="fw-semibold mb-2">Transaksi</h5>
                                <p class="display-6 fw-bold mb-0 text-dark">320</p>
                                <small class="text-muted">Transaksi tercatat</small>
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
        <div class="container text-center py-4">
            <p class="mb-2">© <strong class="sitename">Inventaris</strong> 2025. All Rights Reserved</p>
            <p class="small text-secondary mb-0">Dikelola oleh Tim Sistem Inventaris</p>
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

    <script>
        // Initialize AOS animations
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        });
    </script>
</body>

</html>
