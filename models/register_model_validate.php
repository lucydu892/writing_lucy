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
        if (!isset($checkbox)) {
            array_push($this->errors, "Bitte die Allgemeinen Geschäftsbedingungen annehmen.");
        }
    }
    public function validateGender($gender)
    {
        if ($gender === "gender") {
            array_push($this->errors, "Bitte ein Geschlecht auswählen.");
        }
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }
  
    public function isErrorPresent()
    {
        return count($this->errors) > 0;
    }
    public function validateUser($registerUser)
    {
    
        $this->validateFirstName($registerUser->getFirstName());
        $this->validateLastName($registerUser->getLastName());
        $this->validateEmail($registerUser->getEmail());
        $this->validateUserName($registerUser->getUserName());
        $this->validatePassword($registerUser->getPassword());
        $this->validateCheckbox($registerUser->getCheckbox());
        $this->validateGender($registerUser->getGender());
        if (count($this->errors) > 0) {
            return false;
        }
        return true;
    }
    public function userAlreadyExists()
    {
        array_push($this->errors, "Dieser Benutzername existiert bereits.");
    }
}
