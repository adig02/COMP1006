<?php
    // Define our class called Database
    class Database{
        // Database credentials
        private $host = "172.31.22.43"; // Host name
        private $username = "Adi200640837"; // MySQL username
        private $password = "sW_5gvTdvJ"; // MySQL password
        private $database = "Adi200640837"; // Name of your database

        // the database connection variable, this will hold the actual connection object
        protected $connection;

        // --- Constructor ---
        // This function is called automatically when a new object of this class is created
        public function __construct(){

            if(!isset($this->connection)){ // checking if there's no connection
                // Try to create a new MySQLi connection using the credentials above
                $this->connection = new mysqli(
                    $this->host,
                    $this->username,
                    $this->password,
                    $this->database
                );
                // check to see if the connection failed
                if(!$this->connection){
                    // show an error message and stop the script
                    echo "<p>Cannot connect to database</p>";
                    exit;
                }
            }
            // Return the connection
            return $this->connection;
        }
    }
?>
