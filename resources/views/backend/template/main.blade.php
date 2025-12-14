<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inventaris</title>
    <link rel="stylesheet" href="../assets_frontend/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <style>
        .brand-title {
            font-size: 1.4rem;
            /* ukuran teks */
            font-weight: 700;
            color: #4f7cff;
            /* biru seperti di gambar */
            text-decoration: none;
        }

        .brand-title i {
            font-size: 1.6rem;
            /* ukuran ikon */
        }

        .brand-logo {
            padding: 1rem 1.25rem;
            /* jarak atas bawah */
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('backend.template.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                @include('backend.template.navbar')
            </header>
            <!--  Header End -->
            @yield('content')
        </div>

    </div>
    <script src="../assets_frontend/libs/jquery/dist/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="../assets_frontend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets_frontend/js/sidebarmenu.js"></script>
    <script src="../assets_frontend/js/app.min.js"></script>
    <script src="../assets_frontend/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets_frontend/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets_frontend/js/dashboard.js"></script>

    <!-- Tambahkan ini di paling bawah layout (main.blade.php) sebelum </body> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    @stack('scripts')

</body>

</html>
