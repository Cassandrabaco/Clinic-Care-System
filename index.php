<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Strength Checker</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-XXXXXXX" crossorigin="anonymous" />
<link rel="stylesheet" href="../cssfiles/S-P-D-A-C.page.css">

</head>
<body>

<div class="password-container">
    <input type="password" id="password" name="password" oninput="checkPasswordStrength()">
    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
</div>

<div id="password-strength"></div>

<script src="../js/password-checker.js"></script>


</body>
</html>
