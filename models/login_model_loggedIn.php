<?php
class LoggedInUser {
    private $userName;
    private $password;

    public function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }
}