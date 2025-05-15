<?php
class ValidateRegister {
    private $fieldErrors = [];

    public function validateUserName($userName) {
        if ($userName === '') {
            $this->fieldErrors['userName'] = "Bitte ein Benutzernamen eingeben.";
        }
    }
    public function validateEmail($email) {
        if ($email === '') {
            $this->fieldErrors['email'] = "Bitte deine E-Mail eingeben.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->fieldErrors['email'] = "Bitte eine gültige E-Mail eingeben";
        }
    }
    public function validatePassword($password) {
        if ($password === '') {
            $this->fieldErrors['password'] = "Bitte ein Passwort eingeben.";
        }
    }
    public function validateCheckbox($checkbox) {
        if (!$checkbox) {
            $this->fieldErrors['agb'] = "Bitte die Allgemeinen Geschäftsbedingungen annehmen.";
        }
    }
    public function getFieldError($field) {
        return $this->fieldErrors[$field] ?? '';
    }
    public function isErrorPresent() {
        return count($this->fieldErrors) > 0;
    }

    public function validateUser($registerUser) {
        $this->fieldErrors = []; // Reset errors before validation
        $this->validateUserName($registerUser->getUserName());
        $this->validateEmail($registerUser->getEmail());
        $this->validatePassword($registerUser->getPassword());
        $this->validateCheckbox($registerUser->getCheckbox());
        return count($this->fieldErrors) === 0;
    }

    public function userAlreadyExists(){
        $this->fieldErrors['userName'] = "Dieser Benutzername existiert bereits.";
    }
}
