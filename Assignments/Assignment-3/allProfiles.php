<?php
    // define the title & description
    $page_title = "ConnectHub | All Profiles";
    $page_description = "Discover New Profiles";

    // Connecting to the database
    require_once "./inc/config.php";
    require_once "./inc/Database.php";
    require_once "Users.php";

    $db = new Database();
    $pdo = $db->getConnection();
    $userModel = new Users($pdo);

    // call the read method
    $profiles = $userModel->read();

    // check for a read error
    if ($profiles === false) {
        $readError = "<p>No Profiles found</p>";
    }

    // insert header
    require "./templates/header.php"; ?>
        <main>
            <section class="profile-hero bg-mobile">
                <h2>Find Friends</h2>
            </section>
            <?php if (isset($readError)): ?>
                <section>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $readError; ?>
                    </div>
                </section>
            <?php endif; ?>
            <section class="profile-container">
                <?php if ($profiles && count($profiles) > 0): ?>
                    <?php foreach ($profiles as $profile): ?>
                        <div class="profile-card card">
                            <?php
                            // sanitizing inputs
                            $full_name = htmlspecialchars($profile["full_name"]);
                            $username = htmlspecialchars($profile["username"]);
                            $profile_pic_path = htmlspecialchars($profile["profile_pic_path"]);
                            $id = htmlspecialchars($profile["id"]);
                            echo "<h5 class='username'>@$username</h5>";
                            // don't display profile picture if file doesn't exist
                            if (file_exists($profile_pic_path)) {
                                echo "<img src='$profile_pic_path' alt='$full_name'>";
                            }
                            echo "<h4>$full_name</h4>";
                            echo "<a class='btn btn-primary btn-sm' href='singleProfile.php?id=$id'>View Profile</a>";
                            ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="msg-box">
                        <div class="alert alert-info">
                            <p>No Profiles Found!</p>
                            <a class="btn btn-primary" href="index.php#createProfile">Create A Profile</a>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        </main>
        <?php
        // insert footer
        require "./templates/footer.php"; ?>