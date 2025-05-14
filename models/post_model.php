<?php
require 'core/dbService.php';

$dbService = new DbService();
$dbCon = $dbService->connectToDatabase();
if(isset($_SESSION['userId'])){
    
    $userId = $_SESSION['userName'];
    $prepPost = $dbCon-> prepare("select * from document where userId= :userName order by time desc");
    $prepPost->execute([':userName' => $_SESSION['userName']]);
    $post = $prepPost->fetchAll();
} else {
    echo "You are not loged in.";
    echo " <script type='text/javascript'>"; 
            echo "alert('User not logged in!')"; 
            echo " </script>";  

    header("refresh:0;url=register");
 }