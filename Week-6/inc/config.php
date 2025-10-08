<?php
    // define our connection info
    define('DB_HOST', '172.31.22.43');
    define('DB_USER', 'Adi200640837');
    define('DB_PASS', 'sW_5gvTdvJ');
    define('DB_NAME', 'Adi200640837');
    try{
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        // set PDO error mode to exception for easier debugging
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        // if the connection fails stop script and display the error
        die("Connection failed: " . $e->getMessage());
    }
?>