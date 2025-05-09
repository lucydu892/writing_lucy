<?php
require 'core/database.php';
require 'C:\xampp\htdocs\writing_lucy\models\register_model_RegisterUser';
require 'C:\xampp\htdocs\writing_lucy\models\register_model_validate.php';
$errors = [];
$registerUser = new RegisterUser(
    $_POST['firstName'] ?? '',
    $_POST['lastName'] ?? '',
    $_POST['email'] ?? '',
    $_POST['userName'] ?? '',
    $_POST['password'] ?? '',
    $_POST['agb'] ?? '',
    $_POST['gender'] ?? '',
);

$validate = new ValidateRegister($registerUser);

$dbCon = connectToDatabase();
$isUserNameExist = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($validate->validateUser($registerUser) === true) {

        // Check if the username already exists
        $prep = $dbCon->prepare('SELECT userName FROM user where userName = :userName');
        $prep->bindValue(':userName', $registerUser->getUserName());
        $prep->execute();
        $userName = $prep->fetchAll();

        if (count($userName) > 0) {
            $isUserNameExist = true;
        }
    }
    if ($isUserNameExist === true) {
        array_push($errors, "Dieser Benutzername existiert bereits.");
    }
    
    // Display errors or proceed with registration
    if ($validate->isErrorPresent() === false) {

        $password_hash = password_hash($registerUser->getPassword(), PASSWORD_DEFAULT);

        $prep = $dbCon->prepare(
            "INSERT INTO `user` (firstName, lastName, email, userName, password, gender) 
                VALUES(:firstName, :lastName, :email, :userName, :password, :gender)"
        );
        $result = $prep->execute([
            ':firstName' => $registerUser->getFirstName(),
            ':lastName' => $registerUser->getLastName(),
            ':email' => $registerUser->getEmail(),
            ':userName' => $registerUser->getUserName(),
            ':password' => $password_hash,
            ':gender' => $registerUser->getGender(),
        ]);

        if ($result) {
            echo 'Du hast dich erfolgreich angemeldet <a href="login">Zum login</a>';
        } else {
            echo "Unfortunately an error occurred while saving.";
        }
    }

}
