<?php
require 'core/database.php';

$dbCon = connectToDatabase();
if(isset($_SESSION['userId'])){
    
    $userId = $_SESSION['userName'];
    $prepPost = $dbCon-> prepare("select * from document where userId= :userName order by time asc");
    $prepPost->execute([':userName' => $_SESSION['userName']]);
    $post = $prepPost->fetchAll();
} else {
    echo "You are not loged in.";
    echo " <script type='text/javascript'>"; 
            echo "alert('User not logged in!')"; 
            echo " </script>";  

    header("refresh:0;url=register");
 }