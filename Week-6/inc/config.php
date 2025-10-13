<?php
    // defining our connection constants
    define('DB_HOST', '172.31.22.43');
    define('DB_USER', 'Adi200640837');
    define('DB_PASS', 'sW_5gvTdvJ');
    define('DB_NAME', 'Adi200640837');
    // wrapping connection in a try/catch to avoid fatal crashes & handling errors
    try{
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // setting error mode to exceptions
    } catch (PDOException $e){
        die("Connection failed: " . $e->getMessage());
    }
?>