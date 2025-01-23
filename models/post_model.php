<?php
require 'core/database.php';

$dbCon = connectToDatabase();
if(isset($_SESSION['userId'])){
    
    $userId = $_SESSION['userId'];
    $prepPost = $dbCon-> prepare("select * from document where id= :userId order by time asc");
    $prepPost->execute([':userId' => $_SESSION['userId']]);
    $post = $prepPost->fetchAll();
} else {
    echo "You are not loged in.";
    echo " <script type='text/javascript'>"; 
            echo "alert('User not logged in!')"; 
            echo " </script>";  

    header("refresh:0;url=register");
 }