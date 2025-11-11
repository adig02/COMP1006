<?php
require_once 'Database.php';
class UserCRUD{
    private $conn;
    private $table_name = "users";

    /**
     * Constructor Method
     * This runs automatically when a new UserCRUD object is created
     * It requires a Database object to be passed in, which is how we get the connection
     * @param Database $db
     */
    public function __construct(Database $db){
        $this->conn = $db->connect();
    }
    public function create_user($username, $email, $hashed_password){
        $query = "INSERT INTO " . $this->table_name . " SET 
        username = :username, 
        email = :email, 
        password = :password";
        $stmt = $this->conn->prepare($query);
        // bindParam links the PHP variables ($username...) to the names placeholders in the query (:username...)
        // PDO automatically handles quoting and escaping, making the data safe
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        if ($stmt->execute()){
            return true;
        }
        return false;
    }
    // If we wanted to add the remaining CRUD functions, then we would add them here...
}












































