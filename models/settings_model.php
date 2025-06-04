<?php
require 'core/dbService.php';

$dbService = new DbService();
$dbCon = $dbService->connectToDatabase();

if(isset($_SESSION['userId'])) {

    $dbService->showUserInfo();
}else {
    echo "You are not loged in.";
    echo " <script type='text/javascript'>"; 
            echo "alert('User not logged in!')"; 
            echo " </script>";  

    header("refresh:0;url=register");
 }
