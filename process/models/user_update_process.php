<?php
include('../db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../process/userClass.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // class config / postData / $_POST
        $user_input = new PersonDetails($_POST);
        $username = $user_input->getUsername();
        $password = $user_input->getPassword();
        $contact  = $user_input->getConect();
        $fname    = $user_input->getFname();
        $lname    = $user_input->getLname();
        $email    = $user_input->getEmail();
        $address  = $user_input->getAddress();
    } else {
        header('location: ../view/login.php');
    }
}
