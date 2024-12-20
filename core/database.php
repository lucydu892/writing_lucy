<?php 

function connectToDatabase() {

    $pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_writing_lucy', 'd041e_writing_lucy', 'WritingLucy_2024', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
    return $pdo;
}