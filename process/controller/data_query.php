<?php

class User_Data
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function getUserInfo($user_id)
    {
        $data_id_query = $this->connect->prepare("SELECT * FROM culture_users WHERE user_id = ?");
        $data_id_query->bind_param("i", $user_id);
        $data_id_query->execute();
        $data_id_result = $data_id_query->get_result();

        if ($data_id_result->num_rows > 0) {
            $row = $data_id_result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }

    public function getUserPassword($user_id)
    {
        $userInfo = $this->getUserInfo($user_id);
        return $userInfo['user_password'] ?? null;
    }

    public function getUserContact($user_id)
    {
        $userInfo = $this->getUserInfo($user_id);
        return $userInfo['user_contact'] ?? null;
    }

    public function getUserEmail($user_id)
    {
        $userInfo = $this->getUserInfo($user_id);
        return $userInfo['user_email'] ?? null;
    }

    public function getUserAddress($user_id)
    {
        $userInfo = $this->getUserInfo($user_id);
        return $userInfo['user_address'] ?? null;
    }

    public function getUserFirstName($user_id)
    {
        $userInfo = $this->getUserInfo($user_id);
        return $userInfo['user_fname'] ?? null;
    }

    public function getUserLastName($user_id)
    {
        $userInfo = $this->getUserInfo($user_id);
        return $userInfo['user_lname'] ?? null;
    }
}
$user_data = new User_Data($connect);
$user_id = $_SESSION['user_id'];

// Get user information
$userInfo = $user_data->getUserInfo($user_id);

if ($userInfo !== null) {
    foreach ($userInfo as $key => $value) {
        $_SESSION[$key] = $value;
    }
} else {
    header("location: ../view/login.php");
}
