<?php
session_start();
include('../models/db.php');
include('../models/user_data_class.php');

if (!$connect) {
    echo "Data Error, DATABASE not connected";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $insert_data = new userData($_POST);
        if (isset($_SESSION['data_id'])) {

            $data_id = $_SESSION['data_id'];

            $feeds1 = $insert_data->getFeeds1();
            $feeds2 = $insert_data->getFeeds2();
            $feeds3 = $insert_data->getFeeds3();
            $feeds4 = $insert_data->getFeeds4();
            $mortality = $insert_data->getMortality();
            $alive = $insert_data->getAlive();
            $load = $insert_data->getLoad();
            $harvest = $insert_data->getHarvest();
            $m1 = $insert_data->getM1();
            $m2 = $insert_data->getM2();
            $m3 = $insert_data->getM3();
            $m4 = $insert_data->getM4();
            $report = $insert_data->getReport();
            $weight = $insert_data->getWeight();

            $insertion = $connect->prepare("INSERT INTO user_data (user_feed1, user_feed2, user_feed3, user_feed4, user_mortality, user_alive, date_load, date_harvest, m1, m2, m3, m4, user_report, user_wight, data_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            if ($insertion) {
                $insertion->bind_param("sssssssssssssii", $feeds1, $feeds2, $feeds3, $feeds4, $mortality, $alive, $load, $harvest, $m1, $m2, $m3, $m4, $report, $weight, $data_id);
                $insertion->execute();
                if ($insertion->affected_rows > 0) {
                    echo "Data inserted successfully!";
                } else {
                    echo "Error inserting data!";
                }
                $insertion->close();
            } else {
                echo "Prepare failed: (" . $connect->errno . ") " . $connect->error;
            }
        }
    }
}
