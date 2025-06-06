<?php

class DbService {
    private $pdo;

    public function setPdo($pdo) {
        $this->pdo = $pdo;
    }
    public function getPdo() {
        return $this->pdo;
    }
    function connectToDatabase() {

        $this->pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_writing_lucy', 'd041e_writing_lucy', 'WritingLucy_2024', [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
        return $this->pdo;
    }
    //Register
    public function insertRegisterUser($registerUser) {

        $password_hash = password_hash($registerUser->getPassword(), PASSWORD_DEFAULT);

        $prep = $this->pdo->prepare("INSERT INTO `user` (userName, email, password) VALUES(:userName, :email, :password)");
        $result = $prep->execute([
            ':userName' => $registerUser->getUserName(),
            ':email' => $registerUser->getEmail(),
            ':password' => $password_hash,
        ]);
        if ($result) {
            echo 'Du hast dich erfolgreich angemeldet <a href="login">Zum login</a>';
        } else {
            echo "Unfortunately an error occurred while saving.";
        }
    }
    public function checkUserNameExists($registerUser) {


        $prep = $this->pdo->prepare('SELECT userName FROM user WHERE userName = :userName');
        $prep->bindValue(':userName', $registerUser->getUserName());
        $prep->execute();
        $userName = $prep->fetchAll();
        // Check if the username already exists
        return count($userName) > 0;
    }
    //Login
    public function checkLogin($loggedInUser) {
        $prep = $this->pdo->prepare("SELECT * FROM user WHERE userName = :userName");
        $prep->bindValue(':userName', $loggedInUser->getUserName());
        $prep->execute();
        $user = $prep->fetch();
        if ($user !== false && password_verify($loggedInUser->getPassword(), $user['password'])) {
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userName'] = $user['userName'];
            $_SESSION['email'] = $user['email'];
            return true;
        } else {
            return false;
        }
    }
    //Home
    public function insertPost($Post) {
        $userId     = $Post->getUserId();
        $text       = $Post->getInputText();
        $image      = $Post->getImage();
        $bgColor    = $Post->getBgColor();
        $fontColor  = $Post->getFontColor();
        $fontSize   = $Post->getFontSize();
        $fontFamily = $Post->getFontFamily();
        $fontDeco   = $Post->getFontDeco();
        $imageWidth = $Post->getImageWidth();
        $imageHeight = $Post->getImageHeight();
        $time       = $Post->getTime();
        $joke       = $Post->getJoke();

        $stmt = $this->pdo->prepare('INSERT INTO document (userId, text, image ,bgColor, fontColor, fontSize, fontFamily, fontDeco, imageWidth, imageHeight, time, joke) 
            VALUES (:userId, :text, :image, :bgColor, :fontColor, :fontSize, :fontFamily, :fontDeco, :imageWidth, :imageHeight, :time, :joke)');
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':bgColor', $bgColor);
        $stmt->bindParam(':fontColor', $fontColor);
        $stmt->bindParam(':fontSize', $fontSize);
        $stmt->bindParam(':fontFamily', $fontFamily);
        $stmt->bindParam(':fontDeco', $fontDeco);
        $stmt->bindParam(':imageWidth', $imageWidth);
        $stmt->bindParam(':imageHeight', $imageHeight);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':joke', $joke);
        $stmt->execute();
    }
    //Post
    public function prepPost() {
        $prepPost = $this->pdo-> prepare("select * from document where userId= :userName order by time desc");
        $prepPost->execute([':userName' => $_SESSION['userName']]);
        $post = $prepPost->fetchAll();
        return $post;
    }
    //Settings
    public function showUserInfo() {
        $prep = $this->pdo-> prepare("select * from user where userName= :userName");
        $prep->execute(['userName' => $_SESSION['userName']]);
        $user = $prep->fetch();
        
        return $user;
    }
    public function updateUserInfo($User) {
        $firstName = $User->getFirstName();
        $lastName = $User->getLastname();
        $email = $User->getEmail();
        $phone = $User->getPhone();
        $website = $User->getWebsite();

        $prep = $this->pdo->prepare("UPDATE user SET 
            firstName = :firstName, 
            lastName = :lastName, 
            email = :email, 
            phone = :phone,
            website = :website
            WHERE userName = :userName");
        $prep->bindParam(':firstName', $firstName);
        $prep->bindParam(':lastName', $lastName);
        $prep->bindParam(':email', $email);
        $prep->bindParam(':phone', $phone);
        $prep->bindParam(':website', $website);
        $prep->bindParam(':userName', $_SESSION['userName']);
        $result = $prep->execute();
        if ($result) {
            echo "Deine Daten wurden erfolgreich aktualisiert.";
        } else {
            echo "Fehler beim Aktualisieren: ";
        }
    }
}
