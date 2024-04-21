<?php
include('../models/db.php');
$qry = $connect->prepare("SELECT * FROM mortality_span WHERE acc_id = ?");
$qry->bind_param("s", $data_id);
$qry->execute();
$mortality_pre_span = $qry->get_result();
