<?php
    require 'core/database.php';
    $errors = [];

    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email =$_POST['email'] ?? '' ;
    $userName = $_POST['userName'] ?? '';
    $password = $_POST['password'] ?? '';
    $dbCon = connectToDatabase();   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $checkbox = $_POST['checkbox'] ?? '';
        if ($firstName === '') {
            array_push($errors, "Bitte Vornamen eingeben.");
        }
        if ($email === '') {
            array_push($errors, "Bitte E-Mail eingebn.");
        }
        if ($userName === '') {
            array_push($errors, "Bitte ein Benutzernamen eingeben");
        }
        if ($password === '') {
            array_push($errors, "Bitte ein Password eingeben");
        }
        if ($checkbox == 0) {
            array_push($errors, "Bitte die Allgemeinen Geschäftsbedingungen annehmen");
        }

        $prep = $dbCon->prepare('select userName from user');
        $prep->execute();
        $userNames = $prep->fetchAll();

        foreach ($userName as $userNameOnDb) {
            if ($userNameOnDb["userName"] === $userName) {
                $isUserNameExist = true;
            }
        }
        if ($isUserNameExist === true) {
            array_push($errors, "Dieser Benutzername existiert bereits.");
        }
        if (count($errors) > 0) {
            echo "error";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $prep = $dbCon-> prepare("INSERT INTO `user` (firstName, lastName, email, userName, password, gender) VALUES(:firstName, :lastName, :email, :userName, :password, :gender)");
            $result = $prep->execute([':firstName' => $firstName, ':lastName' => $lastName, ':email' => $email, ':userName' => $userName, ':password' => $password_hash, ':gender' => $gender]);
            echo "top";
            if ($result) {
                echo 'Du hast dich erfolgreich angemeldet <a href="login.php">Zum login</a>';
            } else {
                echo "Unfortunately an error occurred while saving";
            }
        }
    }