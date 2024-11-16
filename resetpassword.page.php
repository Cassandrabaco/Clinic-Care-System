<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $title = 'Reset Password';
    require_once '../parts/head.php';
    
    //require_once ('../includes/include-functions.php');
?>
<link rel="stylesheet" href="../cssfiles/S-P-D-A-C.page.css">
</head>
<body>
    <section class="login-bg d-flex justify-content-center align-items-center">
        <div class="goback">
            <button class="btn btn-custom" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
        </div>
        <div class="forgot col-12 col-md-6 col-lg-4">      
            <div class=" d-flex align-items-center login-head">
                <h1 class="h2 text-shadow color-white Kaushan-font">Reset Password</h1><img style="margin-left:10px;" src="../img/logo.png">
            </div>
            <form action="../includes/include-forgot-password.php" method="post" autocomplete="off" class="login-form" id="logIn">
            <div class="top"></div>

                <div class="mb-3 padding-top-1 d-flex flex-direction-column">
                    <input type="email" class="form-control email-1" id="email-1" autocomplete="none" placeholder="Email" autocomplete="none" name="email">
                </div>
                <div class="mb-3 log ">
                    <button type="submit" name="forgot-password-submit" class="btn-white-2 btn btn-primary brand-bg-color btn-create-account">
                        Reset Password
                    </button>
                </div>
            </form>
            
            <div class="here text-center mt-3">
                <div class="text-align-center">
                    <?php
                        if(isset($_GET["reset"])) {
                            if($_GET["reset"] == "success") {
                                echo "<p class='geeen-font'>check your E-mail.</p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body> 
</html>