<!DOCTYPE html>
<html class="w-100 h-100">
<head>
    <!-- Include Stying -->
    <?php require __DIR__.'/../partials/includes-header.php'; ?>
    <!-- Set Page Title -->
    <title>
        <?php Functions::displayConfig('app_config', 'app_title'); ?> Sign In User
    </title>
</head>
<body class="w-100 h-100"
      style="background: url('<?php echo Functions::assets('img/nice-bg.jpg') ?>');
                background-size: cover;
                background-position: center;">
    <div class="blur-bg" >
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <!-- Card -->
                <div class="card card-signin my-5 text-white" style="background: none; box-shadow: none;">
                    <div class="card-body">
                        <!-- Card Title -->
                        <h5 class="card-title text-center mt-4 mb-4">
                            <?php Functions::displayConfig('app_config', 'app_title'); ?> Sign In User
                        </h5>
                        <?php echo $data['error']; ?>
                        <!-- Form -->
                        <form method="POST" action="<?php Functions::displayRootConfig('app_config', 'app_login_user'); ?>">
                            <?php Functions::csrfToken(); ?>
                            <!-- Email -->
                            <div class="form-label-group mt-3">
                                <label for="user-input">Username</label>
                                <input type="username" name="user-input" id="user-input" class="form-control" placeholder="Username" required autofocus>
                            </div>
                            <!-- Password -->
                            <div class="form-label-group mt-3">
                                <label for="pass-input">Password</label>
                                <input type="password" name="pass-input" id="pass-input" class="form-control" placeholder="Password" required>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-lg btn-warning mt-4 mb-4 btn-block text-uppercase" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Includes Scripts -->
<?php require __DIR__.'/../partials/includes-footer.php'; ?>
</html>