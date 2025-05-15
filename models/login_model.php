<?php

require 'core/dbService.php';
require 'C:\xampp\htdocs\writing_lucy\models\login_model_loggedIn.php';
require 'C:\xampp\htdocs\writing_lucy\models\login_model_validate.php';

$errors = [];
$loggedInUser = new LoggedInUser(
    $_POST['userName'] ?? '',
    $_POST['password'] ?? '',
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
