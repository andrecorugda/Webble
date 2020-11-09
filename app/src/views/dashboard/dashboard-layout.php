<!DOCTYPE html>
<html>
<head>
    <!-- Include Stying -->
    <?php Functions::includeView('/partials/includes-header.php'); ?>
    <!-- Set Page Title -->
    <title>
        <?php Functions::displayConfig('app_config','app_title'); ?> Dashboard
    </title>
</head>
<body class="w-100 h-100">
    <!-- Navbar -->
    <?php Functions::includeView('/partials/navbar.php'); ?>
    <!-- Container -->
    <div class="wrapper">
        <!-- Page Content -->
        <div class="container-fluid mx-auto">
            <h1 class="w-100 mt-5 text-center">HELLO WEBBLE</h1>
            <h5 class="w-100 mt-5 text-center">Edit this page in app > src > views > dashboard > dashboard-layout.php</h5>
            <h5 class="w-100 mt-5 text-center">
                <i>Rendered by route "/" or "/dashboard"</i>
            </h5>
        </div>
    </div>
    <!-- Include Footer script -->
    <?php Functions::includeView('/partials/includes-footer.php'); ?>
</body>
</html>