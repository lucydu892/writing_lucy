<?php

require 'core/dbService.php';
require 'models\login_model_loggedIn.php';
require 'models\login_model_validate.php';

$errors = [];
$loggedInUser = new LoggedInUser(
    $_POST['userName'] ?? '',
    $_POST['password'] ?? '',
    $_POST['email'] ?? ''
);

$validateLogin = new ValidateLogin();
$dbService = new DbService();
$dbCon = $dbService->connectToDatabase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($validateLogin->validateLogin($loggedInUser)) {
        if ($dbService->checkLogin($loggedInUser)) {
        
            header("refresh:2;url=home");
            die('Login erfolgreich.');
        } else {
            $validateLogin->userExists();
        }
    }
}
