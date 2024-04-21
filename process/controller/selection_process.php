<?php
session_start();
include('../models/db.php');
include('../controller/userdata.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];

echo var_dump($_SESSION);

$id_query = $connect->prepare("SELECT user_id FROM culture_users WHERE user_username = ? AND user_password = ?");
$id_query->bind_param("ss", $username, $password);
$id_query->execute();
$id_result = $id_query->get_result();

if (isset($_GET['loginOwner']) && $_GET['loginOwner'] === 'true') {
    if ($id_result && $id_result->num_rows > 0) {
        $row = $id_result->fetch_assoc();
        echo "User ID: " . $row['user_id'];
        $_SESSION['user_id'] = $row['user_id'];
        header('Location: ../view/owner.php');
        exit();
    } else {
        echo "No user found.";
    }
} elseif (isset($_GET['loginHandler']) && $_GET['loginHandler'] === 'true') {
    if ($id_result && $id_result->num_rows > 0) {
        $row = $id_result->fetch_assoc();
        echo "User ID: " . $row['user_id'];
        $_SESSION['user_id'] = $row['user_id'];
        header('Location: ../view/handler.php');
        exit();
    } else {
        echo "No user found.";
    }
} elseif (isset($_GET['loginAssistant']) && $_GET['loginAssistant'] === 'true') {
    if ($id_result && $id_result->num_rows > 0) {
        $row = $id_result->fetch_assoc();
        echo "User ID: " . $row['user_id'];
        $_SESSION['user_id'] = $row['user_id'];
        header('Location: ../view/dashboard.php');
        exit();
    } else {
        echo "No user found.";
    }
} else {
    echo "No loginOwner or loginHandler parameter found.";
}
