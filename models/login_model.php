<?php
 require 'core/dbService.php';
    $errors = [];
    $userName = $_POST['userName'] ?? '';
    $password = $_POST['password'] ?? '';
    $dbService = new DbService();
    $dbCon = $dbService->connectToDatabase();
    $isUserNameExist = false;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if ($userName === '') {
            array_push($errors, "Bitte geben sie ihren Benutzernamen ein.");
        }
        if ($password === '') {
            array_push($errors, "Bitte geben sie ihr Passwort ein.");
        }

        $prep = $dbCon->prepare("select * from user where userName = :userName");
        $prep-> execute([':userName' => $userName]);
        $user = $prep -> fetch();
        
        if ($user !== false && password_verify($password, $user['password'])) {
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userName'] = $user['userName'];
            header("refresh:2;url=home");
            die ('Login erfolgreich.');
            
        }else {
            array_push($errors, "Benutzername oder Passwort ist falsch.");
        }
    }