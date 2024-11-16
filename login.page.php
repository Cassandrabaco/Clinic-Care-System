<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $title = 'Login';
    require_once '../parts/head.php';
    
    //require_once ('../includes/include-functions.php');
?>
<link rel="stylesheet" href="../cssfiles/S-P-D-A-C.page.css">
</head>
<body>
    <section class="login-bg d-flex justify-content-center align-items-center">
        <div class="login col-12 col-md-6 col-lg-4">      
            <div class="headed">
            <div class="goback-login">
                <button class="btn btn-custom" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
            </div>
            <div class="login-head">
                <h1 class="h2 text-shadow color-white Kaushan-font">Login<img style="margin-left:10px;" src="../img/logo.png"></h1>
            </div>
            </div>
            <form action="../includes/include-login.php" method="post" autocomplete="none" class="login-form" id="logIn">
            <div class="top"></div>
                <div class="mb-3 padding-top-1 d-flex flex-direction-column">
                    <!--<label for="email" class="form-label">Email</label>-->
                    <?php
                        if (isset($_GET['email'])) {
                            $email = $_GET['email'];
                            echo '<input type="email" class="form-control email-1" id="email-1" autocomplete="none" placeholder="Email"
                            name="email" value="'.$email.'">';
                        } else {
                            echo '<input type="email" class="form-control email-1" id="email-1" autocomplete="none" placeholder="Email or Username"
                            name="email">';
                        }
                    ?>
                </div>
                <div class="mb-3 d-flex flex-direction-column login-password-container">
                    <!--<label for="password" class="form-label">Password</label>-->
                    <?php
                        if (isset($_GET['password'])) {
                            $password = $_GET['password'];
                            echo '<input type="password" class="form-control password" id="password-login" autocomplete="none"
                            name="password" placeholder="Password" value="'.$password.'">';
                        } else {
                            echo '<input type="password" class="form-control password" id="password-login" autocomplete="none"
                            name="password" placeholder="Password">';
                        }
                        ?>
                    <i class="fas fa-eye toggle-password-login color-black" onclick="toggleLoginPasswordVisibility()"></i>
                    <script src="../js/password-checker.js"></script>
                </div> 
                
                <div class="mb d-flex justify-flex-end">

                    <p class="forgot-password"><a class="color-white text-shadow" href="resetpassword.page.php">Forgot Password?</a></p>
                </div>
                <div class="mb-3 log">
                    <button type="submit" name="submit" class="btn-white btn btn-primary brand-bg-color btn-create-account">Login</button>
                </div>
            </form>
            <script src="../js/goback.js"></script>
            <div class="here text-center mt-3">
                <p class="here-1 color-white text-shadow">Don’t have account yet? <a href="signup.page.php" class="color-white text-shadow"> Sign up Here.</a></p>
                <div class="text-align-center">
                    <?php
                        if(isset($_GET["password"])) {
                            if($_GET["password"] == "updatedsuccesssfully") {
                                echo "<p class='geeen-font'>Password reset Succesfully.</p>";
                            }
                        }
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (!isset($_GET['error'])) {
                            exit();
                        }
                        else $checkLogin = $_GET['error'];

                            if ($checkLogin == "emptinput") {
                                echo "<p class='red-font'>Please Fill in all fields.</p>";
                                exit();
                            }
                            elseif ($checkLogin == "invalidemail") {
                                echo "<p class='red-font'>Invalid E-mail.</p>";
                                exit();
                            }
                            elseif ($checkLogin == "invalidpassword") {
                                echo "<p class='red-font'>Invalid Password.</p>";
                                exit();
                            }
                            elseif ($checkLogin == "wrongpassword") {
                                echo "<p class='red-font'>Wrong Password.</p>";
                                exit();
                            }
                            elseif ($checkLogin == "nouser") {
                                echo "<p class='red-font'>Account doesn't exist.</p>";
                                exit();
                            }

                    ?>
            </div>
        </div>
        </div>
    </section>
</body> 
</html>
