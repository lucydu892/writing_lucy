<?php
require 'core/dbService.php';
require 'models/user_model.php';


if (isset($_SESSION['userId'])) {
    $User = new User(
        $_POST['firstName'] ?? '',
        $_POST['lastName'] ?? '',
        $_POST['email'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['website'] ?? '',
        
    );
    $dbService = new DbService();
    $dbCon = $dbService->connectToDatabase();
    $UserInfo = $dbService->showUserInfo();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $dbService->updateUserInfo($User);
        $UserInfo = $dbService->showUserInfo();
    }
} else {
    echo "You are not loged in.";
    echo " <script type='text/javascript'>";
    echo "alert('User not logged in!')";
    echo " </script>";

    header("refresh:0;url=register");
}
