<?php
include('../models/db.php');
$data_id = $_SESSION['data_id'];
$qry_weight_progress = $connect->prepare("SELECT * FROM weight_progress WHERE acc_id = ?");
$qry_weight_progress->bind_param("s", $data_id);
$qry_weight_progress->execute();
$qry_result = $qry_weight_progress->get_result();
