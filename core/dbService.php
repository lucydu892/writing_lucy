<?php

class DbService{
    private $pdo;

    public function setPdo($pdo){
        $this->pdo = $pdo;
    }
    public function getPdo(){
        return $this->pdo;
    }
    function connectToDatabase(){

        $this->pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_writing_lucy', 'd041e_writing_lucy', 'WritingLucy_2024', [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
        return $this->pdo;
    }
    public function insertRegisterUser($registerUser){

        $password_hash = password_hash($registerUser->getPassword(), PASSWORD_DEFAULT);
    
        $prep = $this->pdo->prepare(
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
    public function checkUserNameExists($registerUser){


        $prep = $this->pdo->prepare('SELECT userName FROM user WHERE userName = :userName');
        $prep->bindValue(':userName', $registerUser->getUserName());
        $prep->execute();
        $userName = $prep->fetchAll();
        // Check if the username already exists
        return count($userName) > 0;
    }
}
