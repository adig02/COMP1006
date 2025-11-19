<?php

class Database
{
    private static $instance = null;
    private $conn;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    // create our private constructor
    private function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // static method to get a single instance of the class
    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    //method to get the database connection
    public function getConnection(){
        return $this->conn;
    }
}

?>