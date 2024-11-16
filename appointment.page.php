<!DOCTYPE html>
<html lang="en">

<head>
<?php
    $title = 'Appointment';
    require_once '../parts/head.php';
    $id = $_SESSION['accId'] ?? '';
    if($id) {
    require_once '../includes/appointment-functions.php';

    //require_once ('../includes/include-ajax.php');
    } else {
        header('location: ../index.php');
    }
?> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../cssfiles/S-P-D-A-C.page.css">
    <link rel="stylesheet" href="../calendar-appointment/evo-calendar.min.css">
    <link rel="stylesheet" href="../calendar-appointment/style.css">
</head>
<body>
    <section class="appointment-bg d-flex justify-content-center align-items-start">
        <div class="appointment col-12 col-md-6 col-lg-4">
            <div class="headed">
                <div class="goback-login">
                    <button class="btn btn-custom" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
                </div>
                <div class="appointment-head">
                    <h1 class="h2 text-shadow color-white Kaushan-font-black">Appointment<img style="margin-left:30px;" src="../img/logo.png"></h1>
                </div>
            </div>
            <form action="../includes/include-appointment.php" method="post" id="appointment">
                <!--beginning of step 1-->
                <div class="form-step active-step" id="step-1">
                    <div class="top">
                        <div class="text-align-center">
                            <?php
                            require_once '../calendar-appointment/include-calendar.php';
                            include '../includes/error-handling-appointment.php';
                            ?>
                        </div>
                        <div class="title-appoint d-flex justify-content-space-between">
                            <p class="title-name color-white text-shadow">Requestor's Information</p>
                            <p class="tiny color-white text-shadow">(Optional)</p>
                        </div>
                    </div>
                    <div class="d-flex padding-top-1 w-100 justify-content-space-between req-name">
                        <div class="mb-3 d-flex flex-direction-column d-flex flex-direction-column">
                            <label for="requestorfirstname" class="color-white text-shadow">First Name</label>
                            <?php
                            if (isset($_GET['requestorfirstname'])) {
                                $requestorFirstName = $_GET['requestorfirstname'];
                                echo '<input type="text" class="requestorfirstname form-control" id="requestorfirstname" name="requestorfirstname"
                                    autocomplete="none" value="' . $requestorFirstName . '">';
                            } else {
                                echo '<input type="text" class="requestorfirstname form-control" id="requestorfirstname" name="requestorfirstname"
                                    placeholder="First Name" autocomplete="none" value="' . $requestorFirstName . '">';
                            }
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="requestormiddlename" class="color-white text-shadow">Middle Name</label>
                            <?php
                            if (isset($_GET['requestormiddlename'])) {
                                $requestorMiddleName = $_GET['requestormiddlename'];
                                echo '<input type="text" class="requestormiddlename form-control" id="requestormiddlename" name="requestormiddlename"
                                    autocomplete="none" value="' . $requestorMiddleName . '"  placeholder="(Optional)">';
                            } elseif ($requestorEmail = $_SESSION['emailId'] ?? '') {
                                echo '<input type="text" class="requestormiddlename form-control" id="requestormiddlename" name="requestormiddlename"
                                    placeholder="(Optional)" autocomplete="none" value="' . $requestorMiddleName . '">';
                            }
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="requestorlastname" class="color-white text-shadow">Last Name</label>
                            <?php
                            if (isset($_GET['requestorlastname'])) {
                                $requestorLastName = $_GET['requestorlastname'];
                                echo '<input type="text" class="requestorlastname form-control" id="requestorlastname" name="requestorlastname"
                                    autocomplete="none" value="' . $requestorLastName . '">';
                            } else {
                                echo '<input type="text" class="requestorlastname form-control" id="requestorlastname" name="requestorlastname"
                                    placeholder="Last Name" autocomplete="none" value="' . $requestorLastName . '">';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3 appointment-flex">
                        <label for="requestoremail" class="color-white text-shadow">Requestor's Email :</label>
                        <?php
                        if (isset($_GET['requestoremail'])) {
                            $requestorEmail = $_GET['requestoremail'];
                            echo '<input type="email" class="form-control email-3" id="requestoremail" autocomplete="none"
                                    autocomplete="none" name="requestoremail" value="' . $requestorEmail . '">';
                        } else {
                            echo '<input type="email" class="form-control email-3" id="requestoremail" autocomplete="none"
                                    placeholder="example@gmail.com" autocomplete="none" name="requestoremail" value="' . $requestorEmail . '">';
                        }
                        ?>
                    </div>
                    <div class="mb-3 appointment-flex">
                        <label for="requestorphonenumber" class="color-white text-shadow">Requestor's Phone number
                            :</label>
                        <?php
                        if (isset($_GET['requestorphonenumber'])) {
                            $requestorPhoneNumber = $_GET['requestorphonenumber'];
                            echo '<input type="tel" class="form-control number" id="requestorphonenumber" autocomplete="none"
                                maxlength="11" pattern="[0-9]{11}" name="requestorphonenumber" value="' . $requestorPhoneNumber . '">';
                        } else {
                            echo '<input type="tel" class="form-control number" id="requestorphonenumber" autocomplete="none"
                                maxlength="11" pattern="[0-9]{11}" placeholder="Phone Number" name="requestorphonenumber"
                                value="' . $requestorPhoneNumber . '">';
                        }
                        ?>
                    </div>
                    <div class="mb-3 appointment-flex">
                        <label for="requestoralterphonenumber" class="color-white text-shadow">Requestor's Alternative
                            number :</label>
                        <p class="optionlangako text-align-baseline text-shadow">(Optional)</p>
                        <?php
                        if (isset($_GET['requestoralterphonenumber'])) {
                            $requestorAlterPhoneNumber = $_GET['requestoralterphonenumber'];
                            echo '<input type="tel" class="form-control number" id="requestoralterphonenumber" autocomplete="none"  placeholder="(Optional)"
                                maxlength="11" pattern="[0-9]{11}" name="requestoralterphonenumber" value="' . $requestorAlterPhoneNumber . '">';
                        } else {
                            echo '<input type="tel" class="form-control number" id="requestoralterphonenumber" autocomplete="none"
                                maxlength="11" pattern="[0-9]{11}" placeholder="Alternative Phone Number" name="requestoralterphonenumber">';
                        }
                        ?>
                    </div>
                    <div class="d-flex flex-direction-row b-n align-items-flex-end margin-top-20">
                        <div>
                            <p class="color-white text-shadow steps">Step 1 of 5</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-nexts next-step color-white text-shadow">Next</button>
                        </div>
                    </div>
                </div>
                <!--end of step 1-->

                <!--beginning of step 2-->
                <div class="form-step" id="step-2">
                    <div class="top">
                        <div class="text-align-center">
                            <?php
                            include '../includes/error-handling-appointment.php';
                            ?>
                        </div>
                        <div class="title-appoint">
                            <p class="title-name color-white text-shadow">Patient's Information</p>
                            <p class="tiny color-white text-shadow">(Required)</p>
                        </div>
                    </div>
                    <div class="d-flex padding-top-1 w-100 patient-name">
                        <div class="mb-3 d-flex flex-direction-column d-flex flex-direction-column">
                            <label for="patientfirstname" class="color-white text-shadow">First Name</label>
                            <?php
                            if (isset($_GET['patientfirstname'])) {
                                $patientFirstName = $_GET['patientfirstname'];
                                echo '<input type="text" class="patientfirstname form-control" id="patientfirstname" name="patientfirstname"
                                    placeholder="First Name" autocomplete="none" value="' . $patientFirstName . '">';
                            } else {
                                echo '<input type="text" class="patientfirstname form-control" id="patientfirstname" name="patientfirstname"
                                    placeholder="First Name" autocomplete="none">';
                            }
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="patientmiddlename" class="color-white text-shadow">Middle Name</label>
                            <?php
                            if (isset($_GET['patientmiddlename'])) {
                                $patientMiddleName = $_GET['patientmiddlename'];
                                echo '<input type="text" class="patientmiddlename form-control" id="patientmiddlename" name="patientmiddlename"
                                    placeholder="(Optional)" value="' . $patientMiddleName . '">';
                            } else {
                                echo '<input type="text" class="patientmiddlename form-control" id="patientmiddlename" name="patientmiddlename"
                                    placeholder="(Optional)">';
                            }
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="patientlastname" class="color-white text-shadow">Last Name</label>
                            <?php
                            if (isset($_GET['patientlastname'])) {
                                $patientLastName = $_GET['patientlastname'];
                                echo '<input type="text" class="patientlastname form-control" id="patientlastname" name="patientlastname"
                                    placeholder="Last Name" autocomplete="none" value="' . $patientLastName . '">';
                            } else {
                                echo '<input type="text" class="patientlastname form-control" id="patientlastname" name="patientlastname"
                                    placeholder="Last Name" autocomplete="none">';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="gen-der">
                        <label for="patientgender" class="color-white text-shadow">Sex:</label>
                        <?php
                        if (isset($_GET['patientgender']) && $_GET['patientgender'] == 'male') {
                            echo '<input type="radio" id="male" name="patientgender" class="form-label" value="male" checked="checked">';
                        } else {
                            echo '<input type="radio" id="male" name="patientgender" class="form-label" value="male">';
                        }
                        ?>
                        <label for="male" class="form-gen color-white text-shadow">Male</label>
                        <?php
                        if (isset($_GET['patientgender']) && $_GET['patientgender'] == 'female') {
                            echo '<input type="radio" id="female" name="patientgender" class="form-label" value="female" checked="checked">';
                        } else {
                            echo '<input type="radio" id="female" name="patientgender" class="form-label" value="female">';
                        }
                        ?>
                        <label for="female" class="form-gen color-white text-shadow">Female</label>
                    </div>
                    <div class="d-flex w-100 b-n">
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="patientbirthday" class="color-white text-shadow">Birth Date</label>
                            <?php
                            if (isset($_GET['patientbirthday'])) {
                                $patientBirthDay = $_GET['patientbirthday'];
                                echo '<input type="date" class="form-control bday" id="patientbirthday" name="patientbirthday" autocomplete="none"
                                    value="' . $patientBirthDay . '">';
                            } else {
                                echo '<input type="date" class="form-control bday" id="patientbirthday" name="patientbirthday" autocomplete="none">';
                            }
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="patientemail" class="color-white text-shadow">Email</label>
                            <?php
                            if (isset($_GET['patientemail'])) {
                                $patientEmail = $_GET['patientemail'];
                                echo '<input type="email" class="form-control patientemail-3" id="patientemail" autocomplete="none"
                                    placeholder="example@gmail.com" autocomplete="none" name="patientemail" value="' . $patientEmail . '">';
                            } else {
                                echo '<input type="email" class="form-control patientemail-3" id="patientemail" autocomplete="none"
                                    placeholder="example@gmail.com" autocomplete="none" name="patientemail">';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="d-flex w-100 b-n">
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="patientphonenumber" class="color-white text-shadow">Patient's Phone
                                number</label>
                            <?php
                            if (isset($_GET['patientphonenumber'])) {
                                $patientPhoneNumber = $_GET['patientphonenumber'];
                                echo '<input type="text" class="form-control number" id="patientphonenumber" autocomplete="none"
                                    maxlength="11" pattern="[0-9]{11}" placeholder="Phone Number" name="patientphonenumber" value="' . $patientPhoneNumber . '">';
                            } else {
                                echo '<input type="text" class="form-control number" id="patientphonenumber" autocomplete="none"
                                    maxlength="11" pattern="[0-9]{11}" placeholder="Phone Number" name="patientphonenumber">';
                            }
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="patientalterphonenumber" class="color-white text-shadow">Alternative Patient's
                                number</label>
                            <?php
                            if (isset($_GET['patientalterphonenumber'])) {
                                $patientAlterPhoneNumber = $_GET['patientalterphonenumber'];
                                echo '<input type="text" class="form-control number" id="patientalterphonenumber" autocomplete="none"
                                    maxlength="11" pattern="[0-9]{11}" placeholder="(Optional)" name="patientalterphonenumber" value="' . $patientAlterPhoneNumber . '">';
                            } else {
                                echo '<input type="text" class="form-control number" id="patientalterphonenumber" autocomplete="none"
                                    maxlength="11" pattern="[0-9]{11}" placeholder="(Optional)" name="patientalterphonenumber">';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3 d-flex flex-direction-column addresses">
                        <label for="patientaddress" class="color-white text-shadow">Patient's Address</label>
                        <?php
                        if (isset($_GET['patientaddress'])) {
                            $patientAddress = $_GET['patientaddress'];
                            echo '<input type="text" class="form-control address-1" name="patientaddress" id="patientaddress"
                                name="patientaddress" placeholder="Street/Drive/Building Number" autocomplete="none" value="' . $patientAddress . '">';
                        } else {
                            echo '<input type="text" class="form-control address-1" name="patientaddress" id="patientaddress"
                                name="patientaddress" placeholder="Street/Drive/Building Number" autocomplete="none">';
                        }
                        ?>
                    </div>
                    <div class="d-flex w-100 b-n">
                        <div class="mb-3 d-flex flex-direction-column margin-right">
                            <label for="city" class="color-white text-shadow">City</label>
                            <?php
                            if (isset($_GET['city'])) {
                                $city = $_GET['city'];
                                echo '<select name="city" id="city" class="city form-control scrollable-container" placeholder="City">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($city)) < 1)) {
                                    echo '<option value="">N/A</option>';
                                } else {
                                    echo '<option value="' . $city . '">' . $city . '</option>';
                                }
                            } else {
                                echo '<select name="city" id="city" class="city form-control scrollable-container">
                                    <option value="">N/A</option>';
                            }
                            echo getCityOptions(isset($_POST['city']) ? $_POST['city'] : null) . '</select>';
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="province" class="color-white text-shadow">Province</label>
                            <?php
                            if (isset($_GET['province'])) {
                                $province = $_GET['province'];
                                echo '<select name="province" id="province" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($province)) < 1)) {
                                    echo '<option value="">N/A</option>';
                                } else {
                                    echo '<option value="' . $province . '">' . $province . '</option>';
                                }
                            } else {
                                echo '<select name="province" id="province" class="city form-control scrollable-container">
                                    <option value="">N/A</option>';
                            }
                            echo getProvinceOptions(isset($_POST["province"]) ? $_POST["province"] : null) . '</select>';
                            ?>
                        </div>
                    </div>



                    <div class="d-flex w-100 b-n flex-direction-row">
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="zip" class="color-white text-shadow">Postal</label>
                            <?php
                            if (isset($_GET['zip'])) {
                                $zip = $_GET['zip'];
                                echo '<input type="text" class="zip form-control" id="zip" name="zip"
                                        pattern="[0-9]{4}" placeholder="Postal Code" maxlength="4" value="' . $zip . '" autocomplet="off">';
                            } else {
                                echo '<input type="text" class="zip form-control" id="zip" name="zip"
                                        pattern="[0-9]{4}" placeholder="Postal Code" maxlength="4" autocomplete="off">';
                            }
                            ?>
                        </div>
                        <div class="mb-3 d-flex flex-direction-column">
                            <label for="country" class="color-white text-shadow">Country</label>
                            <?php
                            if (isset($_GET['country'])) {
                                $country = $_GET['country'];
                                echo '<select name="country" id="country" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($country)) < 1)) {
                                    echo '<option value="">N/A</option>';
                                } else {
                                    echo '<option value="' . $country . '">' . $country . '</option>';
                                }
                            } else {
                                echo '<select name="country" id="country" class="city form-control scrollable-container">
                                    <option value="">N/A</option>';
                            }
                            echo getCountryOptions(isset($_POST['country']) ? $_POST['country'] : null) . '</select>';
                            ?>
                        </div>
                    </div>

                    <div class="maritalstat">
                        <label for="maritalstatus" class="color-white text-shadow">Marital Status :</label>
                        <?php
                        if (isset($_GET['maritalstatus']) && $_GET['maritalstatus'] == 'single') {
                            echo '<input type="radio" id="single" name="maritalstatus" value="single" class="form-label margin-right-5px margin-left-5px" checked="checked">';
                        } else {
                            echo '<input type="radio" id="single" name="maritalstatus" value="single" class="form-label margin-right-5px margin-left-5px">';
                        }
                        ?>
                        <label for="single" class="form-marital margin-right color-white text-shadow">Single</label>
                        <?php
                        if (isset($_GET['maritalstatus']) && $_GET['maritalstatus'] == 'married') {
                            echo '<input type="radio" id="married" name="maritalstatus" value="married" class="form-label margin-right-5px" checked="checked">';
                        } else {
                            echo '<input type="radio" id="married" name="maritalstatus" value="married" class="form-label margin-right-5px">';
                        }
                        ?>
                        <label for="married" class="form-marital margin-right color-white text-shadow">Married</label>
                        <?php
                        if (isset($_GET['maritalstatus']) && $_GET['maritalstatus'] == 'widowed') {
                            echo '<input type="radio" id="widowed" name="maritalstatus" value="widowed" class="form-label margin-right-5px" checked="checked">';
                        } else {
                            echo '<input type="radio" id="widowed" name="maritalstatus" value="widowed" class="form-label margin-right-5px">';
                        }
                        ?>
                        <label for="widowed" class="form-marital margin-right color-white text-shadow">Widowed</label>
                        <?php
                        if (isset($_GET['maritalstatus']) && $_GET['maritalstatus'] == 'divorced') {
                            echo '<input type="radio" id="divorced" name="maritalstatus" value="divorced" class="form-label margin-right-5px" checked="checked">';
                        } else {
                            echo '<input type="radio" id="divorced" name="maritalstatus" value="divorced" class="form-label margin-right-5px">';
                        }
                        ?>
                        <label for="divorced" class="form-marital margin-right color-white text-shadow">Divorced</label>
                    </div>

                    <div class="d-flex flex-direction-column">
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
                            <label for="etnicity" class="etnicity color-white text-shadow margin-right">Etnicity
                                :</label>
                            <?php
                            if (isset($_GET['etnicity'])) {
                                $etnicity = $_GET['etnicity'];
                                echo '<select name="etnicity" id="etnicity" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($etnicity)) < 1)) {
                                    echo '<option value="">N/A</option>';
                                } else {
                                    echo '<option value="' . $etnicity . '">' . $etnicity . '</option>';
                                }
                            } else {
                                echo '<select name="etnicity" id="etnicity" class="city form-control scrollable-container">
                                    <option value="">N/A</option>';
                            }
                            echo getEtnicityOptions(isset($_POST['etnicity']) ? $_POST['etnicity'] : null) . '</select>';
                            ?>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
                            <label for="height" class="height color-white text-shadow">Height (cm) :</label>
                            <?php
                            if (isset($_GET['height'])) {
                                $height = $_GET['height'];
                                echo '<input type="text" class="height form-control scrollable-container" id="height" name="height"
                                    placeholder="Height" pattern="[0-9]{3}" maxlength="3" value="' . $height . '">';
                            } else {
                                echo '<input type="text" class="height form-control scrollable-container" id="height" name="height"
                                    pattern="[0-9]{3}" placeholder="Height" maxlength="3">';
                            }
                            ?>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n w-100">
                            <label for="weight" class="weight color-white text-shadow">Weight (kg) :</label>
                            <?php
                            if (isset($_GET['weight'])) {
                                $weight = $_GET['weight'];
                                echo '<input type="text" class="weight form-control scrollable-container" id="weight" name="weight"
                                    placeholder="Weight" pattern="[0-9]{2}" maxlength="2" value="' . $weight . '">';
                            } else {
                                echo '<input type="text" class="weight form-control scrollable-container" id="weight" name="weight"
                                    pattern="[0-9]{2}" placeholder="Weight" maxlength="2">';
                            }
                            ?>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n w-100">
                            <label for="citizenship"
                                class="citizenship color-white text-shadow margin-right">Citizenship :</label>
                            <?php
                            if (isset($_GET['citizenship'])) {
                                $citizenShip = $_GET['citizenship'];
                                echo '<select name="citizenship" id="citizenship" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($etnicity)) < 1)) {
                                    echo '<option value="">N/A</option>';
                                } else {
                                    echo '<option value="' . $citizenShip . '">' . $citizenShip . '</option>';
                                }
                            } else {
                                echo '<select name="citizenship" id="citizenship" class="city form-control scrollable-container">
                                    <option value="">N/A</option>';
                            }
                            echo getCitizenshipOptions(isset($_POST['citizenship']) ? $_POST['citizenship'] : null) . '</select>';
                            ?>
                        </div>
                    </div>
                    <div class="d-flex flex-direction-row b-n align-items-flex-end margin-top-20">
                        <div>
                            <p class="color-white text-shadow steps">Step 2 of 5</p>
                        </div>
                        <div>
                            <button type="button"
                                class="btn btn-prevs prev-step color-white text-shadow">Previous</button>
                            <button type="button" class="btn btn-nexts next-step color-white text-shadow">Next</button>
                        </div>
                    </div>
                </div>
                <!--end of step 2-->

                <!--Beginning of step 3-->
                <div id="form1">
                    <div class="form-step" id="step-3">
                        <div class="top">
                            <div class="text-align-center">
                                <?php
                                include '../includes/error-handling-appointment.php';
                                ?>
                            </div>
                            <div class="title-appoint">
                                <p class="title-name color-white text-shadow">Ocular History</p>
                                <p class="tiny color-white text-shadow">(Required)</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-direction-column">
                            <div>
                                <label for="ocularhistory" class="color-white text-shadow margin-bottom">
                                    Please check any of the following that you currently have :
                                </label>
                                <p class="tiny color-white text-shadow margin-bottom">(You can select multiple)</p>
                            </div>
                            <div class="checkboxes">
                                <div class="d-flex roww flex-direction-column">
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        $urlParams = $_SERVER['QUERY_STRING'];
                                        parse_str($urlParams, $queryParams);
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Burning Eyes')) {
                                                echo '<input type="checkbox" id="burningeyes" name="ocularhistory[]" value="Burning Eyes" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="burningeyes" name="ocularhistory[]" value="Burning Eyes" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="burningeyes" name="ocularhistory[]" value="Burning Eyes" class="form-label">';
                                        }
                                        ?>
                                        <label for="burningeyes" class="form-oh color-white text-shadow">Burning
                                            Eyes</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Double Vision')) {
                                                echo '<input type="checkbox" id="doublevision" name="ocularhistory[]" value="Double Vision" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="doublevision" name="ocularhistory[]" value="Double Vision" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="doublevision" name="ocularhistory[]" value="Double Vision" class="form-label">';
                                        }
                                        ?>
                                        <label for="doublevision" class="form-oh color-white text-shadow">Double
                                            Vision</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Redness')) {
                                                echo '<input type="checkbox" id="redness" name="ocularhistory[]" value="Redness" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="redness" name="ocularhistory[]" value="Redness" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="redness" name="ocularhistory[]" value="Redness" class="form-label">';
                                        }
                                        ?>
                                        <label for="redness" class="form-oh color-white text-shadow">Redness</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Glare')) {
                                                echo '<input type="checkbox" id="glare" name="ocularhistory[]" value="Glare" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="glare" name="ocularhistory[]" value="Glare" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="glare" name="ocularhistory[]" value="Glare" class="form-label">';
                                        }
                                        ?>
                                        <label for="glare" class="form-oh color-white text-shadow">Glare</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Dryness')) {
                                                echo '<input type="checkbox" id="dryness" name="ocularhistory[]" value="Dryness" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="dryness" name="ocularhistory[]" value="Dryness" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="dryness" name="ocularhistory[]" value="Dryness" class="form-label">';
                                        }
                                        ?>
                                        <label for="dryness" class="form-oh color-white text-shadow">Dryness</label>
                                    </div>
                                </div>

                                <div class="d-flex roww flex-direction-column">
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Headaches')) {
                                                echo '<input type="checkbox" id="headaches" name="ocularhistory[]" value="Headaches" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="headaches" name="ocularhistory[]" value="Headaches" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="headaches" name="ocularhistory[]" value="Headaches" class="form-label">';
                                        }
                                        ?>
                                        <label for="headaches" class="form-oh color-white text-shadow">Headaches</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Soreness')) {
                                                echo '<input type="checkbox" id="soreness" name="ocularhistory[]" value="Soreness" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="soreness" name="ocularhistory[]" value="Soreness" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="soreness" name="ocularhistory[]" value="Soreness" class="form-label">';
                                        }
                                        ?>
                                        <label for="soreness" class="form-oh color-white text-shadow">Soreness</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Eye Injury')) {
                                                echo '<input type="checkbox" id="eyeinjury" name="ocularhistory[]" value="Eye Injury" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="eyeinjury" name="ocularhistory[]" value="Eye Injury" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="eyeinjury" name="ocularhistory[]" value="Eye Injury" class="form-label">';
                                        }
                                        ?>
                                        <label for="eyeinjury" class="form-oh color-white text-shadow">Eye
                                            Injury</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Itching Eyes')) {
                                                echo '<input type="checkbox" id="itchingeyes" name="ocularhistory[]" value="Itching Eyes" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="itchingeyes" name="ocularhistory[]" value="Itching Eyes" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="itchingeyes" name="ocularhistory[]" value="Itching Eyes" class="form-label">';
                                        }
                                        ?>
                                        <label for="itchingeyes" class="form-oh color-white text-shadow">Itching
                                            Eyes</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Eye Strain')) {
                                                echo '<input type="checkbox" id="eyestrain" name="ocularhistory[]" value="Eye Strain" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="eyestrain" name="ocularhistory[]" value="Eye Strain" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="eyestrain" name="ocularhistory[]" value="Eye Strain" class="form-label">';
                                        }
                                        ?>
                                        <label for="eyestrain" class="form-oh color-white text-shadow">Eye
                                            Strain</label>
                                    </div>
                                </div>

                                <div class="d-flex roww flex-direction-column">
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Eye Surgery')) {
                                                echo '<input type="checkbox" id="eyesurgery" name="ocularhistory[]" value="Eye Surgery" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="eyesurgery" name="ocularhistory[]" value="Eye Surgery" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="eyesurgery" name="ocularhistory[]" value="Eye Surgery" class="form-label">';
                                        }
                                        ?>
                                        <label for="eyesurgery" class="form-oh color-white text-shadow">Eye
                                            Surgery</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Watery Eyes')) {
                                                echo '<input type="checkbox" id="wateryeyes" name="ocularhistory[]" value="Watery Eyes" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="wateryeyes" name="ocularhistory[]" value="Watery Eyes" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="wateryeyes" name="ocularhistory[]" value="Watery Eyes" class="form-label">';
                                        }
                                        ?>
                                        <label for="wateryeyes" class="form-oh color-white text-shadow">Watery
                                            Eyes</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Reading Difficulty')) {
                                                echo '<input type="checkbox" id="readingdifficulty" name="ocularhistory[]" value="Reading Difficulty" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="readingdifficulty" name="ocularhistory[]" value="Reading Difficulty" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="readingdifficulty" name="ocularhistory[]" value="Reading Difficulty" class="form-label">';
                                        }
                                        ?>
                                        <label for="readingdifficulty" class="form-oh color-white text-shadow">Reading
                                            Difficulty</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['ocularhistory'])) {
                                            $ocularhistory = $queryParams['ocularhistory'];
                                            if (checkOcularHistory($ocularhistory, 'Spots in Vision')) {
                                                echo '<input type="checkbox" id="spotsinvision" name="ocularhistory[]" value="Spots in Vision" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="spotsinvision" name="ocularhistory[]" value="Spots in Vision" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="spotsinvision" name="ocularhistory[]" value="Spots in Vision" class="form-label">';
                                        }
                                        ?>
                                        <label for="spotsinvision" class="form-oh color-white text-shadow">Spots in
                                            Vision</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        $checkAny = isset($queryParams['ocularhistory']) && !empty($queryParams['ocularhistory']);
                                        ?>
                                        <input type="checkbox" id="noneoftheaboveoh" name="ocularhistory" value="N/A"
                                            class="form-label" <?php if (!$checkAny || checkOcularHistory($ocularhistory, 'N/A')) {
                                                echo 'checked';
                                            }
                                            ?> disabled>
                                        <label for="noneoftheabove" class="form-oh color-white text-shadow">None of the
                                            Above</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-direction-row b-n align-items-flex-end margin-top-20">
                            <div>
                                <p class="color-white text-shadow steps">Step 3 of 5</p>
                            </div>
                            <div>
                                <button type="button"
                                    class="btn btn-prevs prev-step color-white text-shadow">Previous</button>
                                <button type="button"
                                    class="btn btn-nexts next-step color-white text-shadow text-shadow">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of step 3-->

                <!--Beginning of step 4-->
                <div id="form2">
                    <div class="form-step" id="step-4">
                        <div class="top">
                            <div class="text-align-center">
                                <?php
                                include '../includes/error-handling-appointment.php';
                                ?>
                            </div>
                            <div class="title-appoint">
                                <p class="title-name color-white text-shadow">History of Family Health</p>
                                <p class="tiny color-white text-shadow">(Required)</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-space-evenly align-items-center flex-direction-column">
                            <div>
                                <label for="familyhealth" class="color-white text-shadow margin-bottom">
                                    Please check any of the following that you currently have :
                                </label>
                                <p class="tiny color-white text-shadow margin-bottom">(You can select multiple)</p>
                            </div>
                            <div class="checkboxes-1">
                                <div class="d-flex roww flex-direction-column">
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        $urlParams = $_SERVER['QUERY_STRING'];
                                        parse_str($urlParams, $queryParams);
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'Lazy Eye')) {
                                                echo '<input type="checkbox" id="lazyeye" name="familyhealth[]" value="Lazy Eye" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="lazyeye" name="familyhealth[]" value="Lazy Eye" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="lazyeye" name="familyhealth[]" value="Lazy Eye" class="form-label">';
                                        }
                                        ?>
                                        <label for="lazyeye" class="form-oh color-white text-shadow">Lazy Eye</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'High Blood Pressure')) {
                                                echo '<input type="checkbox" id="highbloodpressure" name="familyhealth[]" value="High Blood Pressure" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="highbloodpressure" name="familyhealth[]" value="High Blood Pressure" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="highbloodpressure" name="familyhealth[]" value="High Blood Pressure" class="form-label">';
                                        }
                                        ?>
                                        <label for="highbloodpressure" class="form-oh color-white text-shadow">High
                                            Blood Pressure</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'Blindness')) {
                                                echo '<input type="checkbox" id="blindness" name="familyhealth[]" value="Blindness" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="blindness" name="familyhealth[]" value="Blindness" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="blindness" name="familyhealth[]" value="Blindness" class="form-label">';
                                        }
                                        ?>
                                        <label for="blindness" class="form-oh color-white text-shadow">Blindness</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'Glaucoma')) {
                                                echo '<input type="checkbox" id="glaucoma" name="familyhealth[]" value="Glaucoma" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="glaucoma" name="familyhealth[]" value="Glaucoma" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="glaucoma" name="familyhealth[]" value="Glaucoma" class="form-label">';
                                        }
                                        ?>
                                        <label for="glaucoma" class="form-oh color-white text-shadow">Glaucoma</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'Cataracts')) {
                                                echo '<input type="checkbox" id="cataracts" name="familyhealth[]" value="Cataracts" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="cataracts" name="familyhealth[]" value="Cataracts" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="cataracts" name="familyhealth[]" value="Cataracts" class="form-label">';
                                        }
                                        ?>
                                        <label for="cataracts" class="form-oh color-white text-shadow">Cataracts</label>
                                    </div>
                                </div>

                                <div class="d-flex roww flex-direction-column">
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'Retinal Tear')) {
                                                echo '<input type="checkbox" id="retinaltear" name="familyhealth[]" value="Retinal Tear" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="retinaltear" name="familyhealth[]" value="Retinal Tear" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="retinaltear" name="familyhealth[]" value="Retinal Tear" class="form-label">';
                                        }
                                        ?>
                                        <label for="retinaltear" class="form-oh color-white text-shadow">Retinal
                                            Tear</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'Diabetes')) {
                                                echo '<input type="checkbox" id="diabetes" name="familyhealth[]" value="Diabetes" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="diabetes" name="familyhealth[]" value="Diabetes" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="diabetes" name="familyhealth[]" value="Diabetes" class="form-label">';
                                        }
                                        ?>
                                        <label for="diabetes" class="form-oh color-white text-shadow">Diabetes</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        if (isset($queryParams['familyhealth'])) {
                                            $familyhealth = $queryParams['familyhealth'];
                                            if (checkFamilyHealth($familyhealth, 'Macular Degeneration')) {
                                                echo '<input type="checkbox" id="maculardegeneration" name="familyhealth[]" value="Macular Degeneration" class="form-label" checked="checked">';
                                            } else {
                                                echo '<input type="checkbox" id="maculardegeneration" name="familyhealth[]" value="Macular Degeneration" class="form-label">';
                                            }
                                        } else {
                                            echo '<input type="checkbox" id="maculardegeneration" name="familyhealth[]" value="Macular Degeneration" class="form-label">';
                                        }
                                        ?>
                                        <label for="maculardegeneration" class="form-oh color-white text-shadow">Macular
                                            Degeneration</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <?php
                                        $checkAny = isset($queryParams['familyhealth']) && !empty($queryParams['familyhealth']);
                                        ?>
                                        <input type="checkbox" id="noneoftheabovefh" name="familyhealth" value="N/A"
                                            class="form-label" <?php if (!$checkAny || checkFamilyHealth($familyhealth, 'N/A')) {
                                                echo 'checked';
                                            }
                                            ?> disabled>
                                        <label for="noneoftheabove" class="form-oh color-white text-shadow">None of the
                                            Above</label>
                                    </div>
                                    <div class="d-flex flex-direction-row align-items-baseline">
                                        <label for="others" class="form-oh color-white text-shadow margin-right">Others
                                            : </label>
                                        <input type="text" class="otherss form-control" id="others" name="others"
                                            placeholder="(Optional)" autocomplete="none">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-direction-row b-n align-items-flex-end margin-top-20">
                                <div>
                                    <p class="color-white text-shadow steps">Step 4 of 5</p>
                                </div>
                                <div>
                                    <button type="button"
                                        class="btn btn-prevs prev-step color-white text-shadow">Previous</button>
                                    <button type="button"
                                        class="btn btn-nexts next-step color-white text-shadow">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of step 4-->

                <!--Beginning of step 5-->
                <div class="form-step" id="step-5">
                    <div class="top">
                        <div class="text-align-center">
                            <?php
                            include '../includes/error-handling-appointment.php';
                            ?>
                        </div>
                        <div class="title-appoint">
                            <p class="title-name color-white text-shadow">Set an Appointment</p>
                            <p class="tiny color-white text-shadow">(Required)</p>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
                            <label for="clinicbranch" class="color-white text-shadow">Choose Branch :</label>
                            <?php
                            if (isset($_GET['clinicbranch'])) {
                                $clinicbranch = $_GET['clinicbranch'];
                                echo '<select name="clinicbranch" id="clinicbranch" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($clinicbranch)) < 1)) {
                                    echo '<option value="">Choose Clinic Branch</option>';
                                } else {
                                    echo '<option value="' . $clinicbranch . '">' . $clinicbranch . '</option>';
                                }
                            } else {
                                echo '<select name="clinicbranch" id="clinicbranch" class="city form-control scrollable-container">
                                    <option value="">Choose Clinic Branch</option>';
                            }
                            echo getBranchOptions(isset($_POST['clinicbranch']) ? $_POST['clinicbranch'] : null) . '</select>';
                            ?>
                            </select>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
                            <label for="chooseservices" class="color-white text-shadow">Choose Service :</label>
                            <?php
                            if (isset($_GET['chooseservices'])) {
                                $chooseservices = $_GET['chooseservices'];
                                echo '<select name="chooseservices" id="chooseservices" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($chooseservices)) < 1)) {
                                    echo '<option value="">Choose Service</option>';
                                } else {
                                    echo '<option value="' . $chooseservices . '">' . $chooseservices . '</option>';
                                }
                            } else {
                                echo '<select name="chooseservices" id="chooseservices" class="city form-control scrollable-container">
                                    <option value="">Choose Service</option>';
                            }
                            echo getServicesOptions(isset($_POST['chooseservices']) ? $_POST['chooseservices'] : null) . '</select>';
                            ?>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
                            <label for="doctor" class="color-white text-shadow">Choose Doctor :</label>
                            <?php
                            if (isset($_GET['doctor'])) {
                                $doctor = $_GET['doctor'];
                                echo '<select name="doctor" id="doctor" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($doctor)) < 1)) {
                                    echo '<option value="">Choose Doctor</option>';
                                } else {
                                    echo '<option value="' . $doctor . '">' . $doctor . '</option>';
                                }
                            } else {
                                echo '<select name="doctor" id="doctor" class="city form-control scrollable-container">
                                    <option value="">Choose Doctor</option>';
                            }
                            echo getDoctorsOptions(isset($_POST['doctor']) ? $_POST['doctor'] : null) . '</select>';
                            ?>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
                            <label for="appointmentdate" class="color-white text-shadow">Choose Date :</label>
                            <p class=" font-size-1 text-align-baseline text-shadow">(DD - MM - YYYY)</p>
                            <?php
                            if (isset($_GET['appointmentdate'])) {
                                $appointmentdate = $_GET['appointmentdate'];
                                echo '<input type="text" name="appointmentdate" id="selectedDate" class="city form-control scrollable-container" readonly
                                    value="' . $appointmentdate . '">';
                            } else {
                                echo '<input type="text" name="appointmentdate" id="selectedDate" class="city form-control scrollable-container" placeholder="Select date" readonly>';
                            }
                            ?>
                            <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog"
                                aria-labelledby="calendarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title Kaushan-font-black" id="calendarModalLabel">Appointment Date:</h5>
                                        </div>
                                        <div class="modal-body">
                                            <!-- evoCalendar container -->
                                            <div id="calendar" class="evo-calendar event-hide sidebar-hide"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
                            <label for="appointmenttime" class="color-white text-shadow">Choose time :</label>
                            <p class=" font-size-1 text-align-baseline text-shadow">(Select Date first)</p>
                            <?php
                            if (isset($_GET['appointmenttime'])) {
                                $appointmenttime = $_GET['appointmenttime'];
                                echo '<select name="appointmenttime" id="appointmenttime" class="city form-control scrollable-container">';
                                if (!preg_match("/^[a-zA-Z ]*$/", strlen(trim($appointmenttime)) < 1)) {
                                    echo '<option value="">Choose Time</option>';
                                } else {
                                    echo '<option value="' . $appointmenttime . '">' . $appointmenttime . '</option>';
                                }
                            } else {
                                echo '<select name="appointmenttime" id="appointmenttime" class="city form-control scrollable-container">
                                    <option value="">Choose Time</option>';
                            }
                            echo getAppointmentTime(isset($_POST['appointmenttime']) ? $_POST['appointmenttime'] : null) . '</select>';
                            ?>
                        </div>
                        <div class="d-flex flex-direction-row b-n align-items-flex-end margin-top-50">
                            <div>
                                <p class="color-white text-shadow steps">Step 5 of 5</p>
                            </div>
                            <div>
                                <button type="button"
                                    class="btn btn-prevs prev-step color-white text-shadow">Previous</button>
                                <button type="button" class="btn btn-nexts color-white text-shadow" aria-hidden="true"
                                    data-bs-toggle="modal" data-bs-target="#popupmodule">Appoint Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of step 5-->
                <div class="modal fade modal-centered" id="popupmodule" tabindex="-1" aria-labelledby="popupmoduleLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:440px;">
                        <div class="modal-content container-popup">
                            <!--<button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>-->
                            <div class="col text-center">
                                <h5 class="pb-2 fw-bold color-white text-shadow">Are you sure you want to Submit an
                                    Appointment?</h5>
                            </div>
                            <div class="rowww d-flex justify-content-space-between">
                                <div class="col-4">
                                    <button type="submitappointment" name="submitappointment" id="appointment"
                                        class="btn btn-nexts color-white text-shadow w-100 d-flex justify-content-center">Yes</button>
                                </div>
                                <div class="col-4">
                                    <button type="button"
                                        class="btn btn-prevs color-white text-shadow w-100 d-flex justify-content-center"
                                        data-bs-dismiss="modal" aria-label="Close">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/goback.js"></script>
    <script src="../js/checkboxes.js"></script>
    <script src="../js/appointment.steps.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../calendar-appointment/evo-calendar.min.js"></script>
    <script src="../calendar-appointment/calendar.js"></script>
    <script>
        
        $(document).ready(function () {
            let events = [<?php echo $jsCode; ?>];

            $('#calendar').evoCalendar({
                calendarEvents: events,
            });

            // Function to open the modal when input is clicked
            function openCalendar() {
                $('#calendarModal').modal('show');
            }

            // Attach click event listener to the input
            $('#selectedDate').on('click', openCalendar);

            // Listen for clicks on day buttons
            $(document).on('click', '.day', function () {
                // Extract the date value and store it in the input field
                const date = $(this).data('date-val');
                updateSelectedDate(date);
            });

            // Function to update the selected date in the input tag
            function updateSelectedDate(date) {
                $('#selectedDate').val(date);
                $('#calendarModal').modal('hide'); // Close the modal
            }
        });
        $(document).ready(function () {
            // Prevent page refresh on sidebarToggle click
            $('#sidebarToggler').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle sidebar logic here
            });

            // Prevent page refresh on eventListToggle click
            $('#eventListToggler').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle event list logic here
            });
            $('.chevron-arrow-right').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle event list logic here
            });
            $('.chevron-arrow-left').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle event list logic here
            });

        });
    </script>
</body>

</html>