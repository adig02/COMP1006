<?php
    // Connecting to the database
    require_once './inc/config.php';
    require_once './inc/Database.php';
    require_once 'Users.php';

    $db = new Database();
    $pdo = $db->getConnection();
    $userModel = new Users($pdo);

    // grabbing the id from URLl using $_GET
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // call the getProfile method to fetch a single profile
    $profile = $userModel->getProfile($id);
    $name = htmlspecialchars($profile['full_name']);

    // define the custom title & description using the user's name
    $page_title = "$name | Profile";
    $page_description = "Profile Details for $name";

    // check for a read error
    if ($profile === false) {
        $readError = "<p>Profile Not Found</p>";
    }

    // insert header
    require './templates/header.php'; ?>
        <main class="profile-page">
            <section class="single-profile-container">
                <?php if (!empty($readError)): ?>
                    <div class="alert alert-danger"><?php $readError ?></div>
                <?php else:
                    // sanitizing inputs
                    $full_name = htmlspecialchars($profile['full_name']);
                    $username = htmlspecialchars($profile['username']);
                    $profile_pic_path = htmlspecialchars($profile['profile_pic_path']);
                    $age = htmlspecialchars($profile['age']);
                    $email = htmlspecialchars($profile['email']);
                    $gender = htmlspecialchars($profile['gender']);
                    $bio = htmlspecialchars_decode($profile['bio']);
                    $joined = htmlspecialchars($profile['join_date']);
                    echo "<h3>$full_name</h3>";
                    echo "<div class='profile-head card'>";
                    // don't display profile picture if file doesn't exist
                    if (file_exists($profile_pic_path)) {
                        echo "<img src='$profile_pic_path' alt='$full_name'>";
                    }
                        echo "<div class='profile-text'>";
                            echo "<h5 class='username'>@$username</h5>";
                            echo "<h5>$age Years Old</h5>";
                            echo "<h5>$email</h5>";
                            echo "<h5>$gender</h5>";
                            echo "<h5>Joined $joined</h5>";
                            if (!empty($bio)){
                                echo "<p>$bio</p>";
                            }
                            echo "<div class='profile-btns'>";
                                echo "<a class='btn btn-primary btn-sm' href='#'>Add Friend</a>";
                                echo "<a class='btn btn-primary btn-sm' href='#'>Send Message</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<a class='btn btn-secondary' href='allProfiles.php'>Go Back</a>";
                endif; ?>
            </section>
        </main>
        <?php
        // insert footer
        require './templates/footer.php';
        ?>