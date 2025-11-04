<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets_frontend/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets_frontend/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('backend.template.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <main>
            @yield('content')
        </main>
    </div>
    <script src="../assets_frontend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets_frontend/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets_frontend/js/sidebarmenu.js"></script>
    <script src="../assets_frontend/js/app.min.js"></script>
    <script src="../assets_frontend/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets_frontend/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets_frontend/js/dashboard.js"></script>
</body>

</html>
