<?php
// Data Update code here:
session_start();
include('../models/db.php');

if (!$connect) {
    echo 'Disconnected from DATABASE';
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include('../models/userClass.php');

        $user_input = new PersonDetails($_POST);
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }
        $username = $user_input->getUsername();
        $password = $user_input->getPassword();
        $contact  = $user_input->getConect();
        $fname    = $user_input->getFname();
        $lname    = $user_input->getLname();
        $email    = $user_input->getEmail();
        $address  = $user_input->getAddress();

        $update_databse = $connect->prepare('UPDATE culture_users SET user_username=?, user_password=?, user_contact=?, user_email=?, user_address=?, user_fname=?, user_lname=? WHERE user_id = ?');
        $update_databse->bind_param('ssissssi', $username, $password, $contact, $email, $address, $fname, $lname, $user_id);
        $update_databse->execute();
        if ($update_databse->affected_rows > 0) {
            header('location: ../view/user_update.php');
        } else {
            echo "Failed to update data.";
        }
    }
}
