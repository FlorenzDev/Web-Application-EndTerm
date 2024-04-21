<?php
session_start();
include('../models/db.php');
include('../controller/userdata.php');

// Check for database connection error
if (mysqli_connect_error()) {
    echo "Database connection failed: " . mysqli_connect_error();
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $loadNum = $_POST['Load'];
        $Delivered = $_POST['Delivered'];
        $Supplier = $_POST['Supplier'];
        $Driver = $_POST['Driver'];

        $data_id = $_SESSION['data_id'];

        //Feeds DATA
        $pre_starter = $_POST['pre-starter'];
        $starter = $_POST['starter'];
        $grower = $_POST['grower'];
        $finisher = $_POST['finisher'];

        //Medicine DATA
        $multimin = $_POST['multimin'];
        $b_complex = $_POST['b_complex'];
        $ADEC = $_POST['ADEC'];

        //Handler DATA
        $handler_name = $_POST['Handler-name'];
        $poultry = $_POST['Poultry'];

        // Check if record with the same data_id already exists
        $checkRecordQuery = "SELECT data_id FROM load_data WHERE data_id = ?";
        $checkStmt = $connect->prepare($checkRecordQuery);
        $checkStmt->bind_param("i", $data_id);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            // Record with same data_id exists, redirect or handle accordingly
            header('location: ../view/create_tables.php?createTables=exist');
            exit();
        } else {
            // Insert new data

            // Prepare and execute the insert statement for load_data table
            $stmt = $connect->prepare("INSERT INTO load_data (load_amount, Date_arrive, supplier, driver, data_id, pre_starter, starter, grower, finisher, multimin, b_complex, ADEC, handler_name, poultry) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssiisiiiiiss", $loadNum, $Delivered, $Supplier, $Driver, $data_id, $pre_starter, $starter, $grower, $finisher, $multimin, $b_complex, $ADEC, $handler_name, $poultry);
            $stmt->execute();
            $stmt->close();

            // Insert data into other tables (assuming they should always be inserted)

            // Insert data into weight_progress table
            $setVal = 0;
            $weight = $connect->prepare("INSERT INTO weight_progress (acc_id, week1, week2, week3, week4, week5, week6) VALUES (?,?,?,?,?,?,?)");
            $weight->bind_param('iiiiiii', $data_id, $setVal, $setVal, $setVal, $setVal, $setVal, $setVal);
            $weight->execute();
            $weight->close();

            // Insert data into weekly_mortality table
            $mortality = $connect->prepare("INSERT INTO weekly_mortality (acc_id, mortality_week1, mortality_week2, mortality_week3, mortality_week4, mortality_week5, mortality_week6) VALUES (?,?,?,?,?,?,?)");
            $mortality->bind_param('iiiiiii', $data_id, $setVal, $setVal, $setVal, $setVal, $setVal, $setVal);
            $mortality->execute();
            $mortality->close();

            // Insert data into mortality_span table
            $stmtspan = $connect->prepare("INSERT INTO mortality_span (acc_id, span1, span2, span3, span4, span5, span6, span7, span8, span9, span10 ) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmtspan->bind_param("iiiiiiiiiii", $data_id, $setVal, $setVal, $setVal, $setVal, $setVal, $setVal, $setVal, $setVal, $setVal, $setVal);
            $stmtspan->execute();
            $stmtspan->close();

            // Redirect to dashboard
            header('location: ../view/dashboard.php');
            exit();
        }
    }
}

?>



?>



// BETA TEST
// if (!$connect) {
// echo "No Database Connected";
// } else {
// // if ($_SERVER['REQUEST_METHOD'] == "POST") {
// // $loadNum = $_POST['Load'];
// // $Delivered = $_POST['Delivered'];
// // $Supplier = $_POST['Supplier'];
// // $Driver = $_POST['Driver'];
// // $data_id = $row['data_id'];

// // $stmt = $connect->prepare("INSERT INTO load_data (laod_amount, Date_arrive, supplier, driver, data_id) VALUES (?, ?, ?, ?, ?)");
// // $stmt->bind_param("isssi", $loadNum, $Delivered, $Supplier, $Driver, $data_id);
// // $stmt->execute();
// // $stmt->close();

// // //Feeds DATA

// // $pre_starter = $_POST['pre-starter'];
// // $starter = $_POST['starter'];
// // $grower = $_POST['grower'];
// // $finisher = $_POST['finisher'];

// // $stmtF = $connect->prepare("INSERT INTO load_data (pre_starter, starter, grower, finisher) VALUES (?,?,?,?)");
// // $stmtF->bind_param("iiii", $pre_starter, $starter, $grower, $finisher);
// // $stmtF->execute();
// // $stmtF->close();

// // //Medicine DATA

// // $multimin = $_POST['multimin'];
// // $b_complex = $_POST['b_complex'];
// // $ADEC = $_POST['ADEC'];

// // $stmtF = $connect->prepare("INSERT INTO load_data ( multimin, b_complex, ADEC) VALUES (?,?,?)");
// // $stmtF->bind_param("iii", $multimin, $b_complex, $ADEC);
// // $stmtF->execute();
// // $stmtF->close();

// // //Hander DATA

// // $handler_name = $_POST['Handler-name'];
// // $poultry = $_POST['Poultry'];

// // $stmtH = $connect->prepare("INSERT INTO load_data(handler_name, poultry) VALUES (?,?)");
// // $stmtH->bind_param("ss", $multimin, $b_complex);
// // $stmtH->execute();
// // $stmtH->close();
// // }




// }