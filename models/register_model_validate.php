<?php
class ValidateRegister
{  
    private $fieldErrors = [];

    public function validateFirstName($firstName)
    {
        if ($firstName === '') {
            $this->fieldErrors['firstName'] = "Bitte dein Vornamen eingeben.";
        }
    }
    
    public function validateLastName($lastName)
    {
        if ($lastName === '') {
            $this->fieldErrors['lastName'] = "Bitte dein Nachnamen eingeben.";
        }
    }
    public function validateEmail($email)
    {
        if ($email === '') {
            $this->fieldErrors['email'] = "Bitte deine E-Mail eingeben.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->fieldErrors['email'] = "Bitte eine gültige E-Mail eingeben";
        }
    }

    public function validateUserName($userName)
    {
        if ($userName === '') {
            $this->fieldErrors['userName'] = "Bitte ein Benutzernamen eingeben.";
        }
    }
    public function validatePassword($password)
    {
        if ($password === '') {
            $this->fieldErrors['password'] = "Bitte ein Passwort eingeben.";
        }
    }
    public function validateCheckbox($checkbox)
    {
        if (!$checkbox) {
            $this->fieldErrors['agb'] = "Bitte die Allgemeinen Geschäftsbedingungen annehmen.";
        }
    }
    public function validateGender($gender)
    {
        if ($gender === "gender" || $gender === "") {
            $this->fieldErrors['gender'] = "Bitte ein Geschlecht auswählen.";
        }
    }

    public function getFieldError($field)
    {
        return $this->fieldErrors[$field] ?? '';
    }
    public function isErrorPresent()
    {
        return count($this->fieldErrors) > 0;
    }

    public function validateUser($registerUser)
    {
        $this->fieldErrors = []; // Reset errors before validation
        $this->validateFirstName($registerUser->getFirstName());
        $this->validateLastName($registerUser->getLastName());
        $this->validateEmail($registerUser->getEmail());
        $this->validateUserName($registerUser->getUserName());
        $this->validatePassword($registerUser->getPassword());
        $this->validateCheckbox($registerUser->getCheckbox());
        $this->validateGender($registerUser->getGender());
        return count($this->fieldErrors) === 0;
    }

    public function userAlreadyExists()
    {
        $this->fieldErrors['userName'] = "Dieser Benutzername existiert bereits.";
    }
}
