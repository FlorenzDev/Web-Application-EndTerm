<?php
if (isset($_SESSION['user_id']) || $row['user_username'] == 1) {
    $user_id = $_SESSION['user_id'];

    // getting all of the data from database using session 
    $data_id_query = $connect->prepare("SELECT * FROM culture_users WHERE user_id = ?");
    $data_id_query->bind_param("i", $user_id);
    $data_id_query->execute();
    $data_id_result = $data_id_query->get_result();
    if ($data_id_result->num_rows > 0) {
        $row = $data_id_result->fetch_assoc();
        $_SESSION['user_username'] = $row['user_username'];
        $_SESSION['data_id'] = $row['data_id'];
        $_SESSION['password'] = $row['user_password'];
    } else {
        // No matching user found
        header('location: ../view/login.php');
        echo "No user found with the given user ID message from dashboard.";
    }
} else {
    header('location: ../view/login.php');
    echo "User ID not found in session.";
}
