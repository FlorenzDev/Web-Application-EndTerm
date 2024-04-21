<?php
session_start();
include('../models/db.php');
include('../view/nav-bar-login.php');
include('../controller/data_query.php');
include('../controller/userdata.php');

if (!$connect) {
    echo "Disconneted from database";
} else {
    include('../controller/user-update-process.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../view//user-create.css" />
    <link rel="stylesheet" type="text/css" href="../view//style.css" />

    <title>Document</title>
</head>

<body>
    <p>this is your data ID: <?php echo $row['data_id'] ?> </p>
    <div style="margin-left: 8vw;">
        <form method="post" action="../controller//user_delete_account.php">
            <label for="delete_account">press to delete account</label><br>
            <button type="submit">Delete</button>
        </form>
    </div>
    <div class="form-container">
        <div class="form-box">
            <div class="info1">
                <form method="POST" action="../controller//update_process.php">
                    <label>Username</label><br>
                    <input class="box" type="text" name="username" value="<?php echo $user_username; ?>" placeholder="<?php echo $user_username; ?>" required><br>
                    <label>Password</label><br>
                    <input class="box" type="password" name="password" value="<?php echo $user_password ?>" placeholder="<?php echo $user_password ?>" required><br>
                    <label>Contact</label><br>
                    <input class="box" type="number" name="contactNo" value="<?php echo $user_contact ?>" placeholder="<?php echo $user_contact ?>" required><br>
            </div>
            <div class="info2">
                <label>First Name</label><br>
                <input class="box" type="text" name="fname" value="<?php echo $user_fname ?>" placeholder="<?php echo $user_fname ?>" required><br>
                <label>Last Name</label><br>
                <input class="box" type="text" name="lname" value="<?php echo $user_lname ?>" placeholder="<?php echo $user_lname ?>" required><br>
                <label>Email</label><br>
                <input class="box" type="email" name="emailAdd" value="<?php echo $user_email ?>" placeholder="<?php echo $user_email ?>" required><br>
                <label>Address</label><br>
                <input class="box" type="text" name="address" value="<?php echo $user_address ?>" placeholder="<?php echo $user_address ?>" required><br>
            </div>
        </div>
    </div>

    <div class="register-container">
        <div class="register-button">
            <button type="submit">update</button>
        </div>
        </form> <!-- Close the update form -->
    </div>

</body>

</html>