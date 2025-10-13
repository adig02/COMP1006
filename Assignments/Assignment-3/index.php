<?php
    // setting the custom metadata
    $page_title = "ConnectHub | Home";
    $page_description = "Create Your Profile";

    // include required files
    require_once './inc/config.php'; // db credentials
    require_once './inc/Database.php'; // handles pdo connection logic
    require_once 'Users.php'; // contains crud, validation, etc.
    
    // initializing connecting to the database + creating an instance of users model
    $db = new Database();
    $pdo = $db->getConnection();
    $userModel = new Users($pdo);
    $success = false; // tracks if profile created successfully
    
    // checking if profile form was submitted & getting the data 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = trim(htmlspecialchars($_POST["full_name"]));
        $imageFile = $_FILES["profile_img"];
        $username = trim(htmlspecialchars($_POST["username"]));
        $email = trim(htmlspecialchars($_POST["email"]));
        $age = trim(htmlspecialchars($_POST["age"]));
        $gender = trim(htmlspecialchars($_POST["gender"]));
        $bio = trim(htmlspecialchars($_POST["bio"]));
        try{
            if($userModel->create($full_name, $username, $email, $age, $gender, $bio, $imageFile)){
                $success = true;
            }
        } catch (Exception $e){
            $userModel->errors[] = "Could not create profile!" . $e->getMessage();
        }
    }
    // adding the header
    require './templates/header.php';
?>
        <!-- main content area -->
        <main>
            <section class="hero bg-mobile">
                <h2>Welcome to</h2>
                <h1>ConnectHub</h1>
                <div class="hero-btn">
                    <a class="btn btn-primary btn-lg" href="#createProfile">Create A Profile</a>
                    <a class="btn btn-primary btn-lg" href="allProfiles.php">View All Profiles</a>
                </div>
            </section>
            <section id="createProfile" class="create_profile">
                <h3>Create A Profile</h3>
                <?php include "form.php"?>
            </section>
        </main>
<!--adding the footer-->
<?php require './templates/footer.php'; ?>