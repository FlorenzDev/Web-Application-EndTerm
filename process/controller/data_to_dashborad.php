<?php
include('../models/db.php');

$data_id = $_SESSION['data_id'];

$qry = $connect->prepare("SELECT * FROM load_data WHERE data_id = ?");
$qry->bind_param("s", $data_id);
$qry->execute();
$qry_result = $qry->get_result();

// while ($row = $qry_result->fetch_assoc()) {
//     echo $row['load_amount'];
// }
