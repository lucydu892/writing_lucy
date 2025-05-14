<?php
require 'core/dbService.php';
require 'C:\xampp\htdocs\writing_lucy\models\home_model_Post.php';


if (isset($_SESSION['userId'])) {
    $Post = new Post(
        $_POST['bgColor'] ?? '',
        $_POST['fontColor'] ?? '',
        $_POST['fontSize'] ?? '',
        $_POST['fontFamily'] ?? '',
        $_POST['fontDeco'] ?? '',
        $_POST['text'] ?? '',
        $_POST['imageLink'] ?? '',
        $_POST['imageWidth'] ?? '',
        $_POST['imageHeight'] ?? '',
        date("Y-m-d H:i:s"),
        $_POST['jokeOutput'] ?? '',
        ($_SESSION['userName'])
    );
    $dbService = new DbService();
    $dbCon = $dbService->connectToDatabase();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $dbService->insertPost($Post);
    }
}
