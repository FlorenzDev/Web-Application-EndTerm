<?php
session_start();
include('../models/db.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['data_id'])) {
        $data_id = $_SESSION['data_id'];
        $week1 = $_POST['Mweek1'];
        $week2 = $_POST['Mweek2'];
        $week3 = $_POST['Mweek3'];
        $week4 = $_POST['Mweek4'];
        $week5 = $_POST['Mweek5'];
        $week6 = $_POST['Mweek6'];

        $stmt = $connect->prepare("UPDATE weekly_mortality SET mortality_week1=?, mortality_week2=?, mortality_week3=?, mortality_week4=?, mortality_week5=?, mortality_week6=? WHERE acc_id=?");
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
