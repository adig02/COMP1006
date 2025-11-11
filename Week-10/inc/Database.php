<?php
class Database {
    private $host = '';
    private $db_name = ''; // **IMPORTANT: Change this**
    private $username = '';  // **IMPORTANT: Change this**
    private $password = '';  // **IMPORTANT: Change this**
    private $conn;

    /**
     * Get the database connection
     * @return PDO|null Returns the PDO connection object if successful, or null if it fails.
     */

    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "<p>Connection failed: " . $e->getMessage() . "</p>";
        }
        return $this->conn;
    }
}