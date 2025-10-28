<?php

class Database {
    private $host = "172.31.22.43";
    private $username = "Adi200640837";
    private $password = "sW_5gvTdvJ";
    private $db_name = "Adi200640837";
    public $conn;

    public function connect() {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "<p>Connection failed: " . $e->getMessage() . "</p>";
        }
        return $this->conn;
    }

}

