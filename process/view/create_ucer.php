<?php
//Database config
//DO NOT CHANGE
include('../models/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script>
        function validateForm() {
            var password = document.forms["registrationForm"]["password"].value;
            var confirmPassword = document.forms["registrationForm"]["confirmPassword"].value;
            if (password != confirmPassword) {
                alert("Passwords do not match");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <?php
    include('../view/nav-bar.php')
    ?>
    <div class="form-container">
        <div class="form-box">
            <div class="info1">
                <form name="registrationForm" method="POST" action="../controller/new_user.php" onsubmit="return validateForm()">
                    <input class="box" type="text" name="username" placeholder="Enter username">
                    <input class="box" type="password" name="password" placeholder="Enter password">
                    <input class="box" type="password" name="confirmPassword" placeholder="Confirm Password">
                    <input class="box" type="number" name="contactNo" placeholder="Enter Contact number">
            </div>
            <div class="info2">
                <input style="width: 34%;" class="box" type="text" name="fname" placeholder="Enter First Name">
                <input style="width: 34%;" class="box" type="text" name="lname" placeholder="Enter Last Name">
                <input class="box" type="email" name="emailAdd" placeholder="Enter Email">
                <input class="box" type="text" name="address" placeholder="Full Address">
            </div>
        </div>
    </div>
    <div class="register-container">
        <div class="register-button">
            <button type="submit">Register</button>
        </div>
        </form>
    </div>
</body>

</html>