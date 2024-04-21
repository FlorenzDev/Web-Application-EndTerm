<?php
session_start();
include('../models/db.php');
include('../controller/userdata.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $connect->prepare("SELECT user_id, user_password FROM culture_users WHERE user_username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['user_password'];

        if (password_verify($password, $storedPassword)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            header('Location: ../view/selection_page.php');
            exit();
        } else {
            header('Location: ../login.php?error=invalidCredentials');
            exit();
        }
    } else {
        header('Location: ../login.php?error=noUser');
        exit();
    }
} else {
    header('Location: ../login.php?error=notPost');
    exit();
}
