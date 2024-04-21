
<?php
//class connection
include('../models/userClass.php');

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
    $id_data = (rand(10, 10000));

    //Database config
    include("../models/db.php");
    if (!$connect) {
        echo "no Database";
    } else {

        $data_insertion = $connect->prepare('INSERT INTO culture_users (user_username, user_password, user_contact, user_email, user_address, user_fname, user_lname, data_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $data_insertion->bind_param("ssissssi", $username, $password, $contact, $email, $address, $fname, $lname, $id_data);
        $data_insertion->execute();
        $data_insertion->close();
        $connect->close();
        header('location: ../view/login.php');
    }
}
