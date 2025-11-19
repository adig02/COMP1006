<?php

class Database{
    // these will hold my database config values
    private $host = DB_HOST;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $pdo;

    public function getConnection()
    {
        if ($this->pdo === null) {
            try {
                // defines how the PDO connects to MySQL
                $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

                // create a new PDO object using the DSN, username and the password for database connections
                $this->pdo = new PDO($dsn, $this->user, $this->pass);

                // for error handling & debugging we will ensure errors throw exceptions
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                // If something goes wrong, catch stops execution and will display the error
                die("Error: Could not connect to the database: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
?>