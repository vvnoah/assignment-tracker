<?php
    $dsn = 'mysql:host=localhost;dbname=assignment-tracker';
    $username = 'root';
    
    try{
        $database = new PDO($dsn, $username);
    } catch (PDOException $ex) {
        $error = 'Database error: ';
        $error .= $ex->getMessage();
        include('views/error.php');
        exit();
    }