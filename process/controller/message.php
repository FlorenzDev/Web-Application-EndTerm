<?php
session_start();
include('../models/db.php');
include('../models/user_data_class.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $getMessage = new userData($_POST);
    $message = $getMessage->getMessage();
    $data_id = $_SESSION['data_id'];

    $sendMessage = $connect->prepare("INSERT INTO `message` (`user_message`, data_id) VALUES (?,?)");
    $sendMessage->bind_param("si", $message,  $data_id);
    // Execute the prepared statement
    if ($sendMessage->execute()) {
        echo "Message sent successfully";
        header("location: ../view/dashboard.php");
    } else {
        echo "Error: " . $connect->error;
    }

    $sendMessage->close(); // Close the prepared statement
} else {
    echo "Message failed to send";
}
