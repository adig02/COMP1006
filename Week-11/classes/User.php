<?php
class User{
    private $db;
    public function __construct($db_connection){
        $this->db = $db_connection;
    }

    /**
     * Finds a user by their username
     * @param string $username
     * @return mixed user data as array or false if not found
     */
    public function findByUsername($username){
        try{
            $stmt = $this->db->prepare("SELECT * FROM users2 WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch();
        } catch(PDOException $e){
            die("Database username query failed: " . $e->getMessage());
        }
    }

    /**
     * Registers a new user
     * @param string $username
     * @param string $password
     * @param string $confirm_password
     * @return string Success message or error message
     */
    public function register($username, $password, $confirm_password){
        // validation
        if (empty($username) || empty($password) || empty($confirm_password)) {
            return "All fields are required";
        }
        // confirm password
        if ($password != $confirm_password) {
            return "Passwords do not match";
        }
        // check if user already exists
        if ($this->findByUsername($username)) {
            return "Username already exists";
        }
        // hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // now our create function
        try{
            $stmt = $this->db->prepare("INSERT INTO users2 (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashed_password]);
            return "User created";
        } catch(PDOException $e){
            return "Could not create user: " . $e->getMessage();
        }
    }

    /**
     * Logs in a user
     * @param string $username
     * @param string $password
     * @return mixed user data array on success, false on failure
     */
    public function login($username, $password){
        if (empty($username) || empty($password)) {
            return false;
        }

        // find the user (Read method)
        $user = $this->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct
            return $user;
        } else {
            return false;
        }
    }
}

?>