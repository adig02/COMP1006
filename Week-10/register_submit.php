<?php
require_once './inc/Database.php';
require_once './inc/UserCRUD.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // usually we need to validate/sanitize
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        // Handle error: passwords do not match
        // die() stops the script and prints the error message
        die("Error: Passwords do not match.");
    }
    // hash the password
    // PASSWORD_DEFAULT uses the strongest algorithm available
    $hashed_pasword = password_hash($password, PASSWORD_DEFAULT);
    // check if the hashing process failed (rare, but good practice)
    if ($hashed_pasword === false) {
        die("Error: Could not hash password.");
    }
    # save user to the database
    $database = new Database();
    $crud = new UserCRUD($database);
    if ($crud->create_user($username, $email, $hashed_pasword)) {
        echo "<p class='alert alert-success'>User Created</p>";
    } else {
        echo "<p class='alert alert-danger'>Error: Could not create user.</p>";
    }

} else{
    // if the page was accessed directly (not via form submission), redirect the user back to the form.
    // This prevents direct access to the processing file.
    header('Location: index.php');
}




































