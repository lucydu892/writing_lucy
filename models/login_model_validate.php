<?php

class ValidateLogin {

    private $fieldErrors = [];

    public function validateUserName($userName) {
        if ($userName === '') {
            $this->fieldErrors['userName'] = "Bitte dein Benutzernamen eingeben.";
        }
    }
    public function validatePassword($password) {
        if ($password === '') {
            $this->fieldErrors['password'] = "Bitte dein Passwort eingeben.";
        }
    }
    public function getFieldError($field) {
        return $this->fieldErrors[$field] ?? '';
    }
    public function isErrorPresent() {
        return count($this->fieldErrors) > 0;
    }
    public function validateLogin($loggedInUser) {

        $this->fieldErrors = [];
        $this->validateUserName($loggedInUser->getUsername());
        $this->validatePassword($loggedInUser->getPassword());
        return count($this->fieldErrors) === 0;
    }
    public function userExists() {
        return $this->fieldErrors['login'] = "Benutzername oder Passwort ist falsch.";
    }
}