<?php
include('../models/db.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $span1 = $_POST['span1'];
    $span2 = $_POST['span2'];
    $span3 = $_POST['span3'];
    $span4 = $_POST['span4'];
    $span5 = $_POST['span5'];
    $span6 = $_POST['span6'];
    $span7 = $_POST['span7'];
    $span8 = $_POST['span8'];
    $span9 = $_POST['span9'];
    $span10 = $_POST['span10'];

    $stmtupdate = $connect->prepare("UPDATE mortality_span SET span1=?, span2=?, span3=?, span4=?, span5=?, span6=?, span7=?, span8=?, span9=?, span10=?");
    if ($stmtupdate) {
        $stmtupdate->bind_param("iiiiiiiiii", $span1, $span2, $span3, $span4, $span5, $span6, $span7, $span8, $span9, $span10);
        $stmtupdate->execute();
        $stmtupdate->close();
        header('Location: ../view/dashboard.php');
    } else {
        echo "NO DATABASE";
    }
} else {
    echo "WALA DATABASE";
}
