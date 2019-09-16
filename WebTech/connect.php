<?php
// $host = "127.0.0.1";
// $username = "admin";
// $password = "admin";
// $database = "alumni";
try {
    $connect = new PDO("mysql:host=127.0.0.1;dbname=alumni", 'admin', 'admin');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    catch (PDOException $error){
    $message = $error->getMessage();
}