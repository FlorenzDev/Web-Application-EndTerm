<?php
include('../models/db.php');

if (!$connect) {
    echo "No DATABASE";
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Prepare the SELECT query
        $qry = $connect->prepare("SELECT * FROM feed_data WHERE feeds_id = ?");
        $feeds_id = 1001; // Set the feeds_id value
        $qry->bind_param("i", $feeds_id);
        $qry->execute();
        $result = $qry->get_result(); // Get the result set

        // Check if there are any rows fetched
        if ($result->num_rows > 0) {
            // Prepare the INSERT query
            $smst = $connect->prepare("INSERT INTO inventory (inven_id, medicine_id, medicine_qty, feeds_id, feeds_qty) VALUES (?, ?, ?, ?,?)");

            // Fetching results row by row
            while ($row = $result->fetch_assoc()) {
                // Access $row array for each row's data
                $inven_id = 233;

                for ($i = 1; $i <= 4; $i++) {
                    $medicine = 'f' . $i;
                    $feeds = 'm' . $i;
                    if (isset($_POST[$medicine])) {
                        // If $_POST[$medicine] is set, set $feeds_qty to $_POST[$feeds]
                        $feeds_qty = isset($_POST[$feeds]) ? $_POST[$feeds] : 0; // Set to 0 if $_POST[$feeds] is not set
                        $medicine_id = 2000 + $i; // Assuming the medicine_id increments from 1001 to 1004
                        $medicine_qty = $_POST[$medicine]; // Assuming the quantity is entered in the form
                        $feeds_id = 1000 + $i;
                        $smst->bind_param("iiiii", $inven_id, $medicine_id, $medicine_qty, $feeds_id, $feeds_qty);
                        $smst->execute();
                    }
                }
            }
            $smst->close(); // Close the prepared statement
        } else {
            echo "No results found.";
        }
        $qry->close(); // Close the prepared statement
    }
}

// Prepare and execute the SELECT query for fetching feeds_type from inventory table
$f1 = $connect->prepare("SELECT feeds_type FROM inventory INNER JOIN feed_data ON inventory.feeds_id = feed_data.feeds_id WHERE feeds_id = 1001");
$f1->execute();
$result_f1 = $f1->get_result(); // Get the result set

// Fetching results row by row and echoing the feeds_type
while ($row_f1 = $result_f1->fetch_assoc()) {
    // Access $row_f1 array for each row's data
    echo $row_f1['feeds_type']; // Assuming 'feeds_type' is the column name
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="./test.php" method="POST">

        <input type="number" name="f1">
        <input type="number" name="f2">
        <input type="number" name="f3">
        <input type="number" name="f4"><br>

        <input type="number" name="m1">
        <input type="number" name="m2">
        <input type="number" name="m3">

        <button type="submit">go</button>

    </form>

</body>

</html>