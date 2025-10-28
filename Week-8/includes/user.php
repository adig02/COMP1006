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

    // update a record
    public function update($id, $name, $email, $image = null){
        // using an if/else here because if user uploads a new image it will update it or if no image then goes to the else block
        // if not updating image can use simple update statement without if/else
        if($image){
            $sql = "UPDATE {$this->table} SET name = :name, email = :email, image = :image WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':image' => $image,
                ':id' => $id
            ]);
        } else {
            $sql = "UPDATE {$this->table} SET name = :name, email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':id' => $id
            ]);
        }

    }

}