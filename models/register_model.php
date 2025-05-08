<?php 
require 'core/database.php';
require 'models/register_model_validate.php';
    $errors = [];

    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $userName = $_POST['userName'] ?? '';
    $password = $_POST['password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $checkbox = $_POST['checkbox'] ?? '';
    
    
    $validate = new ValidateRegister();

    $dbCon = connectToDatabase();   
    $isUserNameExist = false;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        
        $validate->validateFirstname($firstName);
        $validate->validateLastName($lastName);
        $validate->validateEmail($email);
        $validate->validateUserName($userName);
        $validate->validatePassword($password);
        $validate->validateCheckbox($checkbox);
       

        // Check if the username already exists
        $prep = $dbCon->prepare('SELECT userName FROM user');
        $prep->execute();
        $userNames = $prep->fetchAll();

        foreach ($userNames as $userNameOnDb) {
            if ($userNameOnDb["userName"] === $userName) {
                $isUserNameExist = true;
            }
        }
        if ($isUserNameExist === true) {
            array_push($errors, "Dieser Benutzername existiert bereits.");
        }

        // Display errors or proceed with registration
        if (!($validate->isErrorPresent())) {
                        
            session_start();
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $prep = $dbCon->prepare("INSERT INTO `user` (firstName, lastName, email, userName, password, gender) 
                VALUES(:firstName, :lastName, :email, :userName, :password, :gender)"
            );
            $result = $prep->execute([
                ':firstName' => $firstName, 
                ':lastName' => $lastName, 
                ':email' => $email, 
                ':userName' => $userName, 
                ':password' => $password_hash, 
                ':gender' => $gender
            ]);
            
            if ($result) {
                echo 'Du hast dich erfolgreich angemeldet <a href="login">Zum login</a>';
            } else {
                echo "Unfortunately an error occurred while saving.";
            }
        }
    }
?>
