<?php
require 'core/database.php';

echo '<h1>' . $_SESSION['userId'] . '</h1>';


$dbCon = connectToDatabase();
if(isset($_SESSION['userId'])){
    echo'angemeldet';
    $userId = $_SESSION['userId'];
    $prepPost = $dbCon-> prepare("select * from document where userId= :userId order by time asc");
    $prepPost->execute([':userId' => $_SESSION['userId']]);
    $post = $prepPost->fetch();

}else {
    echo "You are not loged in.";
    echo " <script type='text/javascript'>"; 
            echo "alert('User not logged in!')"; 
            echo " </script>";  

    header("refresh:0;url=register");
 }