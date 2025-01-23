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
            $userId = ($_SESSION['userName']);

            $styles = 'bColor: ' . $bgColor . 'fColor: ' . $fontColor . 'size: ' . $fontSize . 'family: ' . $fontFamily . 'deco: ' . $fontDeco . 'width: ' . $imageWidth . 'height: ' . $imageHeight;

            $stmt = $dbCon->prepare('INSERT INTO document (userId, text, image ,styles, time) VALUES (:userId, :text, :image, :styles, :time)');
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':text', $inputText);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':styles', $styles);
            $stmt->bindParam(':time', $time);
            $stmt->execute();
        } 
    }
    