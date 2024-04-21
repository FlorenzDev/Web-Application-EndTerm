<?php
include('../models/db.php');
session_start();
if (!$connect) {
    echo "Database not connected";
} else {
    include('../controller/login-handler.php');
}
