<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $title = 'Sign Up';
    require_once '../parts/head.php';
    require_once '../includes/include-functions.php';

?>
<link rel="stylesheet" href="../cssfiles/S-P-D-A-C.page.css">
</head>
<body>
    <section class="signup-bg d-flex justify-content-center align-items-start">
        <div class="signup col-12 col-md-6 col-lg-4">      
            <div class="headed">
                <div class="goback-login">
                    <button class="btn btn-custom" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
                </div>
                <div class="login-head">
                    <h1 class="h2 text-shadow color-white Kaushan-font">Sign Up<img style="margin-left:10px;" src="../img/logo.png"></h1>
                </div>
            </div>
            <form action="../includes/include-signup.php" method="post" autocomplete="off" id="signUp">
                <div class="top"></div>
                <div class="text-align-center">
                    <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (isset($_GET['signup'])) {
                            $checkSignup = $_GET['signup'];

                            if ($checkSignup == "emptinput") {
                                echo "<p class='red-font'>Please Fill in all fields.</p>";
                            }
                            elseif ($checkSignup == "invalidfirstname") {
                                echo "<p class='red-font'>Invalid First Name.</p>";
                            }
                            elseif ($checkSignup == "invalidLastname") {
                                echo "<p class='red-font'>Invalid Last Name.</p>";
                            }
                            elseif ($checkSignup == "invalidbirthday") {
                                echo "<p class='red-font'>Invalid Birth Day.</p>";
                            }
                            elseif ($checkSignup == "invalidphonenumber") {
                                echo "<p class='red-font'>Invalid Phone Number.</p>";
                            }
                            elseif ($checkSignup == "invalidemail") {
                                echo "<p class='red-font'>Invalid E-mail.</p>";
                            }
                            elseif ($checkSignup == "invalidgender") {
                                echo "<p class='red-font'>Invalid Gender.</p>";
                            }
                            elseif ($checkSignup == "invalidaddress") {
                                echo "<p class='red-font'>Invalid Address.</p>";
                            }
                            elseif ($checkSignup == "invalidpassword") {
                                echo "<p class='red-font'>Invalid Password.</p>";
                            }
                            elseif ($checkSignup == "passworddoesnotmatch") {
                                echo "<p class='red-font'>Your Password does not match!</p>";
                            }
                            elseif ($checkSignup == "alreadyregistered") {
                                echo "<p class='red-font'>This Account is already registered!</p>";
                            }
                        }
                    ?>
                </div>
                <div class="d-flex padding-top-1 w-100 justify-content-space-between name">
                    <div class="mb-3 d-flex flex-direction-column d-flex flex-direction-column">
                        <label for="firstname" class="color-white text-shadow">First Name</label>
                        <?php
                            if (isset($_GET['firstname'])) {
                                $firstName = $_GET['firstname'];
                                echo '<input type="text" class="firstname form-control" id="firstname" name="firstname" 
                                placeholder="First Name" autocomplete="none" value="'.$firstName.'">';
                            } else{
                                echo '<input type="text" class="firstname form-control" id="firstname" name="firstname" 
                                placeholder="First Name" autocomplete="none">';
                            }
                        ?>
                    </div>
                    <div class="mb-3 d-flex flex-direction-column">
                        <label for="middlename" class="color-white text-shadow">Middle Name</label>
                        <?php
                            if (isset($_GET['middlename'])) {
                                $middleName = $_GET['middlename'];
                                echo '<input type="text" class="middlename form-control" id="middlename" name="middlename" 
                                placeholder="(Optional)" value="'.$middleName.'">';
                            } else{
                                echo '<input type="text" class="middlename form-control" id="middlename" name="middlename" 
                                placeholder="(Optional)">';
                            }
                        ?>
                    </div>
                    <div class="mb-3 d-flex flex-direction-column">
                        <label for="lastname" class="color-white text-shadow" >Last Name</label>
                        <?php
                            if (isset($_GET['lastname'])) {
                                $lastName = $_GET['lastname'];
                                echo '<input type="text" class="lastname form-control" id="lastname" name="lastname" 
                                placeholder="Last Name" autocomplete="none" value="'.$lastName.'">';
                            } else{
                                echo '<input type="text" class="lastname form-control" id="lastname" name="lastname" 
                                placeholder="Last Name" autocomplete="none">';
                            }
                        ?> 
                    </div>  
                </div>                  
                <div class="d-flex w-100 b-n">
                    <div class="mb-3 d-flex flex-direction-column">
                        <label for="birthday" class="color-white text-shadow">Birth Date</label>
                        <?php
                            if (isset($_GET['birthday'])) {
                                $birthDay = $_GET['birthday'];
                                echo '<input type="date" class="form-control bday" id="birthday" name="birthday" autocomplete="none"
                                value="'.$birthDay.'">';
                            } else{
                                echo '<input type="date" class="form-control bday" id="birthday" name="birthday" autocomplete="none">';
                            }
                        ?>
                    </div>
                    <div class="mb-3 d-flex flex-direction-column">
                        <label for="phonenumber" class="color-white text-shadow">Phone number</label>
                        <?php
                            if (isset($_GET['phonenumber'])) {
                                $phoneNumber = $_GET['phonenumber'];
                                echo '<input type="tel" class="form-control number" id="phonenumber" autocomplete="none" maxlength="11"
                                pattern="[0-9]{11}" placeholder="Phone Number" name="phonenumber" value="'.$phoneNumber.'">';
                            } else {
                                echo '<input type="tel" class="form-control number" id="phonenumber" autocomplete="none" maxlength="11"
                                pattern="[0-9]{11}" placeholder="Phone Number" name="phonenumber">';
                            }
                        ?>
                    </div>
                </div>
                <div class="mb-3 d-flex flex-direction-column whole">
                    <label for="email" class="color-white text-shadow">Email</label>
                    <?php
                        if (isset($_GET['email'])) {
                            $email = $_GET['email'];
                            echo '<input type="email" class="form-control email-1" id="email-1" autocomplete="none" placeholder="Email"
                            autocomplete="none" name="email" value="'.$email.'">';
                        } else {
                            echo '<input type="email" class="form-control email-1" id="email-1" autocomplete="none" placeholder="Email"
                            autocomplete="none" name="email">';
                        }
                    ?>
                </div>
                <div class="gen-der">
                    <label for="gender" class="color-white text-shadow">Sex:</label>
                    <?php
                        if (isset($_GET['gender']) && $_GET['gender'] == 'male') {
                                echo '<input type="radio" id="male" name="gender" class="form-label" value="male" checked="checked">';
                            }else{
                                echo '<input type="radio" id="male" name="gender" class="form-label" value="male">';
                            }
                        ?> 
                    <label for="male" class="form-gen color-white text-shadow">Male</label>
                    <?php
                        if (isset($_GET['gender']) && $_GET['gender'] == 'female') {
                                echo '<input type="radio" id="female" name="gender" class="form-label" value="female" checked="checked">';
                            }else{
                                echo '<input type="radio" id="female" name="gender" class="form-label" value="female">';
                            }
                        ?>
                    <label for="female" class="form-gen color-white text-shadow">Female</label>
                </div>
                <div class="mb-3 d-flex flex-direction-column whole password-container">
                    <label for="password" class="color-white text-shadow">Password</label>
                    <?php
                        if (isset($_GET['password'])) {
                            $password = $_GET['password'];
                            echo '<input type="password" class="form-control password" id="password" autocomplete="none"
                            name="password" placeholder="Password" value="'.$password.'" oninput="checkPasswordStrength()">';
                        } else {
                            echo '<input type="password" class="form-control password" id="password" autocomplete="none"
                            name="password" placeholder="Password" oninput="checkPasswordStrength()">';
                        }
                    ?>
                    <i class="fas fa-eye toggle-password color-black" onclick="togglePasswordVisibility()"></i>
                </div>
                <div class="font-size-15 margin-bottom-5" id="password-strength"></div>
                <div class="mb-3 d-flex flex-direction-column whole confirmpassword-container">
                    <label for="confirmpassword" class="color-white text-shadow">Confirm Password</label>
                    <?php
                        if (isset($_GET['confirmpassword'])) {
                            $confirmpassword = $_GET['confirmpassword'];
                            echo '<input type="password" class="form-control confirmpassword" id="confirmpassword" autocomplete="none"
                            name="confirmpassword" placeholder="Confirm Password" value="'.$confirmpassword.'">';
                        } else {
                            echo '<input type="password" class="form-control confirmpassword" id="confirmpassword" autocomplete="none"
                            name="confirmpassword" placeholder="Confirm Password">';
                        }
                    ?>
                    <i class="fas fa-eye toggle-confirmpassword color-black" onclick="toggleConfirmPasswordVisibility()"></i>

                </div>
                <div class="form-group form-check">
                    <label class="form-check-label mb-3 check">
                        <input class="form-check-input text-shadow" type="checkbox" id="yes">
                        <p class="text-shadow click">
                            By checking this box, I agree to the terms and conditions of the website. 
                        </p>
                    </label>
                </div>
                <div class="mb-3 log">
                        <button type="submit" id="signupButton" name="submit" 
                        class="btn-white btn" disabled>Sign Up</button> <!--disabled-->
                    </div>  
                </form>
                <div class="here text-center mt-3">
                    <p class="here-1 color-white text-shadow">Already have an account?<a href="login.page.php" class="brand-color color-white text-shadow"> Log In Here.</a></p>
                </div>
            </form>
        </div>
    </section>
    <script src="../js/password-checker.js"></script>
    <script src="../js/goback.js"></script>
</body>
</html>