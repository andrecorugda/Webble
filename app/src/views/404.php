<!DOCTYPE html>
<html class="w-100 h-100">
<head>
    <!-- Include Stying -->
    <?php require __DIR__.'./partials/includes-header.php'; ?>
    <!-- Set Page Title -->
    <title>
        <?php displayConfig('app_config', 'app_title'); ?> 404
    </title>
</head>
<body class="w-100 h-100 bg-primary">
    <div class="container pt-5">
        <div class="jumbotron">
            <h1 class="display-3">
                404 | Page not found!
            </h1>
            <p class="lead">You are trying to access a page that is either protected or non-existing.</p>
            <hr class="my-4">
            <p>If you think something is wrong you should contact our support.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" 
                    href="<?php displayRootConfig('app_config', 'app_login_user'); ?>" 
                    role="button">
                    Go back
                </a>
            </p>
        </div>
    </div>
</body>
<!-- Includes Scripts -->
<?php require __DIR__.'./partials/includes-footer.php'; ?>
</html>