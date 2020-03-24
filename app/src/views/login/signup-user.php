<!DOCTYPE html>
<html class="w-100 h-100">
<head>
    <!-- Include Stying -->
    <?php require __DIR__.'/../partials/includes-header.php'; ?>
    <!-- Set Page Title -->
    <title>
        <?php Functions::displayConfig('app_config', 'app_title'); ?> Sign Up User
    </title>
</head>
<body class="w-100 h-100 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <!-- Card -->
                <div class="card card-signin my-5" style="">
                    <div class="card-body">
                        <!-- Card Title -->
                        <h5 class="card-title text-center mt-4 mb-4">
                            <?php Functions::displayConfig('app_config', 'app_title'); ?> Sign Up User
                        </h5>
                        <?php echo $data['error']; ?>
                        <!-- Form -->
                        <form method="POST" class="main-form" action="<?php Functions::displayRootConfig('app_config', 'app_signup_user'); ?>">
                            <?php Functions::csrfToken(); ?>
                            <!-- First Name -->
                            <div class="form-label-group mt-3">
                                <label for="fname-input">Your first name</label>
                                <input type="text" name="fname-input" class="form-control fname-input" placeholder="First name" required autofocus>
                            </div>
                            <!-- Last Name -->
                            <div class="form-label-group mt-3">
                                <label for="lname-input">Your last name</label>
                                <input type="text" name="lname-input" class="form-control lname-input" placeholder="Last name" required>
                            </div>
                            <!-- Email -->
                            <div class="form-label-group mt-3 email-form" >
                                <label for="email-input">Email address</label>
                                <input type="text" name="email-input" class="form-control email-input" placeholder="Email" onKeyUp="checkEmail()" required>
                                <div class="valid-feedback" style="display:none">Perfect! Correct email format.</div>
                                <div class="invalid-feedback" style="display:none">Failed! Incorrect email format.</div>
                                <small class="form-text text-muted">• Must be a working email address.</small>
                                <small class="form-text text-muted">• Confirmation will be sent to this email.</small>
                            </div>
                            <!-- Address -->
                            <div class="form-label-group mt-3">
                                <label for="address-input">Primary addresss</label>
                                <input type="text" name="address-input" class="form-control address-input" placeholder="Address" required>
                            </div>
                            <!-- Username -->
                            <div class="form-label-group mt-3">
                                <label for="username-input">Create username</label>
                                <input type="username" name="username-input" class="form-control username-input" placeholder="Username" required>
                            </div>
                            <!-- Password -->
                            <div class="form-label-group mt-3 password-form">
                                <label for="password-input">Create password</label>
                                <input type="password" name="password-input" class="form-control password-input" placeholder="Password" onKeyUp="checkPassword()" required>
                                <div class="valid-feedback" style="display:none">Great! keep it up.</div>
                                <div class="invalid-feedback" style="display:none">Failed! Follow conditions given.</div>
                                <small class="form-text text-muted">• Should contain atleast 8 characters.</small>
                                <small class="form-text text-muted">• Must be alpha numeric.</small>
                                <small class="form-text text-muted">• Case sensitive.</small>
                            </div>
                            <!-- Confirm Password -->
                            <div class="form-label-group mt-3 password2-form">
                                <label for="password2-input">Confirm password</label>
                                <input type="password" name="password2-input" class="form-control password2-input" placeholder="Confirm password" onKeyUp="confirmPassword()" required>
                                <div class="valid-feedback" style="display:none">Excellent! Password match.</div>
                                <div class="invalid-feedback" style="display:none">Failed! Password did not match.</div>
                            </div>
                            <!-- Sign-up Button -->
                            <button class="btn btn-lg btn-success mt-3 mb-2 btn-block text-uppercase complete-input" type="submit">Complete sign up!</button>
                            <!-- Sign-user page link -->
                            <p class="form-text float-left">
                                <a href="<?php Functions::displayRootConfig('app_config', 'app_login_user') ?>">
                                    <i class="material-icons" style="font-size:20px;vertical-align:top;">
                                        keyboard_backspace
                                    </i>
                                    Go to user sign-in page
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Includes Scripts -->
<?php require __DIR__.'/../partials/includes-footer.php'; ?>
<script type="text/javascript" src="<?php echo Functions::assets('js/login/sign-up.js'); ?>"></script>
</html>