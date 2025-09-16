<?php
    // this file is often called the controller. We use our database class and our template files to populate the page
    include './templates/header.php';

    // include our database class
    require './config/database.php';
    // We use a try-catch block to handle the database connection and display a message.
    try{
        // create a new instance of our database class
        // the constructor will automatically attempt to connect to the database
        $database = new Database();
        // if the connection is successful, then we get a PDO object
        $db_connection = $database->conn;
        // display the success message
        echo "<div class='alert alert-success' role='alert'>";
            echo "<p>Database connection successful</p>";
        echo "</div>";
        // You can add your database queries here, e.g., fetching data from a table.
        // For example: $stmt = $db_connection->prepare("SELECT * FROM users");
        // $stmt->execute();
    } catch(Exception $e){
        // If an error occurs, the catch block in the Database class will handle it,
        // but we can add an extra message here if needed.
        // This part of the code is not expected to run if the database class works correctly.
        // As the `die()` command in `Database.php` would have already stopped the script.
        // We can show a generic error message for the user.
        echo "<div class='alert alert-danger' role='alert'>";
            echo "<p>An error occurred during the database connection</p>";
        echo "</div>";
    }

    // add our footer to complete the page
    include './templates/footer.php';

?>