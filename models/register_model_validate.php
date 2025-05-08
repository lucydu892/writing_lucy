<?php
class ValidateRegister
{
    private $errors = [];
    public function validateFirstName($firstName)
    {
        if ($firstName === '') {
            array_push($this->errors, "Bitte dein Vornamen eingeben.");
        }
    }
    public function validateLastName($lastName)
    {
        if ($lastName === '') {
            array_push($this->errors, "Bitte dein Nachname eingeben.");
        }
    }
    public function validateEmail($email)
    {
        if ($email === '') {
            array_push($this->errors, "Bitte deine E-Mail eingeben.");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, "Bitte eine gültige E-Mail eingeben");
        }
    }

    public function validateUserName($userName)
    {
        if ($userName === '') {
            array_push($this->errors, "Bitte ein Benutzernamen eingeben.");
        }
    }
    public function validatePassword($password)
    {
        if ($password === '') {
            array_push($this->errors, "Bitte ein Password eingeben.");
        }
    }
    public function validateCheckbox($checkbox)
    {
        if ($checkbox == 0) {
            array_push($this->errors, "Bitte die Allgemeinen Geschäftsbedingungen annehmen.");
        }
    }
    public function getErrors() {
        return $this->errors;
    }
    public function setErrors($errors) {
        $this->errors = $errors;
    }

    public function isErrorPresent() {
        return count($this->errors) > 0;
    }
}
