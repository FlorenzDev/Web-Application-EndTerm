<?php
if (isset($_SESSION['user_id'])) {
    $user_data = new User_Data($connect);
    $user_id = $_SESSION['user_id'];
    $user_username = $_SESSION['user_username'];
    $user_password = $_SESSION['user_password'];
    $user_contact = $_SESSION['user_contact'];
    $user_email = $_SESSION['user_email'];
    $user_address = $_SESSION['user_address'];
    $user_fname = $_SESSION['user_fname'];
    $user_lname = $_SESSION['user_lname'];
} else {
    echo "Error no table found";
}
