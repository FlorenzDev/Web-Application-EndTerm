<?php
session_start();
include('../models/db.php');
mysqli_close($connect);
session_destroy();
header("location: ../view/login.php");
