<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $title = 'Reset Password';
    require_once '../parts/head.php';
?>
<link rel="stylesheet" href="../cssfiles/S-P-D-A-C.page.css">
</head>
<body>
<section class="login-bg bg-bg">
    <div class="goback">
        <button class="btn btn-custom" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
    </div>
    <div class="forgot col-12 col-md-6 col-lg-4">      
        <div class=" d-flex align-items-center login-head">
            <h1 class="h2 text-shadow color-white Kaushan-font">Reset Password</h1><img style="margin-left:10px;" src="../img/logo.png">
        </div>
        <?php

            $selector = $_GET['selector'];
            $validator = $_GET['validator'];
            if (empty($selector) || empty($validator)) {
                echo "Could not validate your request!";
                exit();
            } else {
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
        ?>
                <form action="../includes/include-reset-password.php" method="post" class="login-form">
                    <div class="top"></div>
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <div class="mb-3 padding-top-1 d-flex flex-direction-column">
                        <input type="password" class="form-control password" id="password" autocomplete="none"
                        name="password" placeholder="Password">
                    </div>
                    <div class="mb-3 d-flex flex-direction-column">
                        <input type="password" class="form-control password" id="password" autocomplete="none"
                        name="confirmpassword" placeholder="Confirm Password">
                    </div>
                    <div class="mb-3 log margin-top-20">
                        <button type="submit" name="reset-password-submit" 
                        class="btn-white-2 btn btn-primary brand-bg-color btn-create-account">
                            Reset Password
                        </button>
                    </div>
                </form>
        <?php
                }else {
                    echo'none';
                }
            }
        ?>
    </div>
    </section>
    <script src="../js/goback.js"></script>
</body> 
</html>