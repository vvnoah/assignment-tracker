<?php
    $dsn = 'mysqli:host=localhost;dbname=assignment_tracker';
    $username = 'root';
    $password = '';
    
    try{
        $database = new PDO($dsn, $username, $password);
    } catch (PDOException $ex) {
        $error = 'Database error: ';
        $error .= $ex->getMessage();
        include('views/error.php');
        exit();
    }