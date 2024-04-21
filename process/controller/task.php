<?php
session_start();
include('../models/db.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Todo = $_POST['Todo'];
    $data_id = $_SESSION['data_id'];

    $sendTask = $connect->prepare('INSERT INTO task_table (task_creation , data_id) VALUES (?,?) ');
    $sendTask->bind_param("si", $Todo, $data_id);
    $sendTask->execute();
    header("location: ../view/dashboard.php");
} else {
    echo "No Data recieved";
}
