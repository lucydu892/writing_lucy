<?php
    require "core/database.php";
    $dbCon = connectToDatabase();
 
    
    if(isset($_SESSION['userId'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $bgColor = $_POST['bgColor'] ?? '';
            $fontColor = $_POST['fontColor'] ?? '';
            $fontSize = $_POST['fontSize'] ?? '';
            $fontFamily = $_POST['fontFamily'] ?? '';
            $fontDeco = $_POST['fontDeco'] ?? '';
            $inputText = $_POST['text'] ?? '';
            $image = $_POST['imageLink'] ?? '';
            $imageWidth =$_POST['imageWidth'] ?? '';
            $imageHeight =$_POST['imageHeight'] ?? '';
            $time = date("Y-m-d H:i:s");
            $joke = $_POST['jokeOutput'] ?? '';
            $userId = ($_SESSION['userName']);

            $stmt = $dbCon->prepare('INSERT INTO document (userId, text, image ,bgColor, fontColor, fontSize, fontFamily, fontDeco, imageWidth, imageHeight, time, joke) 
            VALUES (:userId, :text, :image, :bgColor, :fontColor, :fontSize, :fontFamily, :fontDeco, :imageWidth, :imageHeight, :time, :joke)');
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':text', $inputText);
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
    }
    