<?php

require 'core/dbService.php';
require 'models\register_model_RegisterUser.php';
require 'models\register_model_validate.php';

$errors = [];
$registerUser = new RegisterUser(
    $_POST['userName'] ?? '',
    $_POST['email'] ?? '',
    $_POST['password'] ?? '',
    $_POST['agb'] ?? '',
);

$validate = new ValidateRegister($registerUser);

//$dbCon = connectToDatabase();
$isUserNameExist = false;
$dbService = new DbService();
$dbCon = $dbService->connectToDatabase();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($validate->validateUser($registerUser)) {

        if ($dbService->checkUserNameExists($registerUser)) {
            $validate->userAlreadyExists();
        }
    }

    // Display errors or proceed with registration
    if (!$validate->isErrorPresent()) {

        $dbService->insertRegisterUser($registerUser);
    }
}
