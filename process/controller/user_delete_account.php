<?php
include('../models/db.php');
session_start();
if (!$connect) {
    echo 'Disconnected from DATABASE';
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $delete_action = $_POST['delete_account'];
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }

        $delete_query = $connect->prepare("DELETE FROM culture_users WHERE user_id = ?");
        $delete_query->bind_param("i", $user_id);
        $delete_query->execute();

        if ($delete_query->affected_rows > 0) {
            header('location: ../view/login.php');
        } else {
            echo "Failed to delete data.";
        }
    }
}
