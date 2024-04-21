<?php
include('../models/db.php');

$qry = $connect->prepare("SELECT * FROM weekly_mortality WHERE acc_id = ?");
$qry->bind_param("s", $data_id);
$qry->execute();
$mortality_result = $qry->get_result();


// var_dump($mortality_result);
// while ($row = $mortality_result->fetch_assoc()) {
// }