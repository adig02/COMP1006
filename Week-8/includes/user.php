<?php
class User {
    private $conn;
    private $table = 'userRecords';
    public function __construct($db) {
        $this->conn = $db;
    }

    // Create Function
    public function create($name, $email, $image){
        $sql = "INSERT INTO {$this->table} (name, email, image) VALUES (:name, :email, :image)";
            $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':image' => $image
        ]);
    }

    // Get all the data from our table
    public function getAll(){
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a record by id
    public function getById($id){
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}