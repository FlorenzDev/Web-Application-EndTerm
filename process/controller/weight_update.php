<?php
session_start();
include('../models/db.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['data_id'])) {
        $data_id = $_SESSION['data_id'];
        $week1 = $_POST['week1'];
        $week2 = $_POST['week2'];
        $week3 = $_POST['week3'];
        $week4 = $_POST['week4'];
        $week5 = $_POST['week5'];
        $week6 = $_POST['week6'];

        $stmt = $connect->prepare("UPDATE weight_progress SET week1=?, week2=?, week3=?, week4=?, week5=?, week6=? WHERE acc_id=?");
        if ($stmt) {
            $stmt->bind_param('iiiiiii', $week1, $week2, $week3, $week4, $week5, $week6, $data_id);
            $stmt->execute();
            $stmt->close();
            header('Location: ../view/dashboard.php');
            exit; // Prevent further execution
        } else {
            echo "Error: " . $connect->error;
        }
    } else {
        echo "No DATABASE";
    }
}
