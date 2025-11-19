<?php
require_once 'Database.php';
require_once 'config.php';
require_once 'CRUD.php';

// initializing connecting to the database + creating an instance of CRUD
$db = new Database();
$crud = new CRUD($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // usually we need to validate/sanitize
    $name = trim(htmlspecialchars($_POST["register_name"]));
    $email = trim(htmlspecialchars($_POST["register_email"]));
    $age = trim(htmlspecialchars($_POST["age"]));
    $gender = trim(htmlspecialchars($_POST["gender"]));
    $password = trim(htmlspecialchars($_POST["register_password"]));
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        // Handle error: passwords do not match
        // die() stops the script and prints the error message
        die("Error: Passwords do not match.");
    }
    // hash the password
    // PASSWORD_DEFAULT uses the strongest algorithm available
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // check if the hashing process failed (rare, but good practice)
    if ($hashed_password === false) {
        die("Error: Could not hash password.");
    }
    # save user to the database
    $db = new Database();
    $pdo = $db->getConnection();
    $crud = new CRUD($pdo);
    if ($crud->registerAdmin($name, $email, $age, $gender, $hashed_password)) {
        ?>
        <div class="success-msg">
            <p>Account Created Successfully</p>
        </div>
        <?php
//        exit;
    } else {
        ?>
        <div class="danger-msg">
            <!-- looping through errors array to display all errors present -->
            <?php foreach ($crud->errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
?>




