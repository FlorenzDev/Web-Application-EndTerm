<?php

include('./db.php');


if (!$connect) {
    echo "Disconnected from database";
} else {

    class user_datas
    {

        protected $fname;
        protected $lname;
        protected $email;
        protected $address;
        protected $contact;
        protected $username;
        protected $password;

        public function __construct($postData)
        {
            $this->username = isset($postData["username"]) ? $postData["username"] : '';
            $this->password = isset($postData["password"]) ? $postData['password'] : '';
            $this->contact  = isset($postData['contactNo']) ? $postData['contactNo'] : '';
            $this->fname    = isset($postData['fname']) ? $postData['fname'] : '';
            $this->lname    = isset($postData['lname']) ? $postData['lname'] : '';
            $this->email    = isset($postData['emailAdd']) ? $postData['emailAdd'] : '';
            $this->address  = isset($postData['address']) ? $postData['address'] : '';
        }
    }
}
