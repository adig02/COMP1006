<?php
    // Build a dedicated class to handle the database connection This makes our database logic easier to reuse
    // Define a class named database
    class Database{
        // Private properties to hold our connection details
        private $host = "172.31.22.43"; // this is the same for everyone in our class
        private $db_name = ""; // replace this with your database name
        private $username = ""; // replace this with your username
        private $password = ""; // replace this with your password

        // create a public property to store our PDO connection object
        public $conn;

        //This is the constructor method, which is automatically called when a new object is created
        public function __construct(){
            // Initialize the connection property to null
            $this->conn = null; // will be overridden later
            // Use a try-catch block for error handling
            try{
                /**
                 * Create a new PDO instance to connect to the database
                 * The DSN (Data Source Name) specifies the database type (in our case it is mysql), host, database name
                 */
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                // Set PDO error mode to throw exceptions , which makes it easy to catch errors
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                // if the connection fails, catch the exception
                // then we use die() to stop the script and display the error message
                die("<p>Connection error: " . $e->getMessage() . "</p>");
            }
        }
    }
?>