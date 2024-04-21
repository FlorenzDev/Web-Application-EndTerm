<?php
class PersonDetails
{
    protected $username;
    protected $password;
    protected $contact;
    protected $fname;
    protected $lname;
    protected $email;
    protected $address;

    public function __construct($postData)
    {
        $this->username = isset($postData["username"]) ? $postData["username"] : '';
        $this->password = isset($postData["password"]) ? password_hash($postData['password'], PASSWORD_DEFAULT) : '';
        $this->contact  = isset($postData['contactNo']) ? $postData['contactNo'] : '';
        $this->fname    = isset($postData['fname']) ? $postData['fname'] : '';
        $this->lname    = isset($postData['lname']) ? $postData['lname'] : '';
        $this->email    = isset($postData['emailAdd']) ? $postData['emailAdd'] : '';
        $this->address  = isset($postData['address']) ? $postData['address'] : '';
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getConect()
    {
        return $this->contact;
    }
    public function getFname()
    {
        return $this->fname;
    }
    public function getLname()
    {
        return $this->lname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getAddress()
    {
        return $this->address;
    }
}
