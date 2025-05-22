<?php
class LoggedInUser {
    private $userName;
    private $password;
    private $email;

    public function __construct($userName, $password, $email) {
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }
    public function getEmail() {
        return $this->email;
    }
}