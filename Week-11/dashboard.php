<?php
require_once './classes/Session.php';
require_once './templates/header.php';

// check if logged in session exists, if not kick them out to login
if (!Session::isLoggedIn()) {
    header("Location: login.php");
    exit();
}

// get user data from the session
$username = Session::get('username');

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Dashboard</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Welcome, <?php echo htmlspecialchars($username)?>!</h5>
                <p class="card-text">You have successfully logged in to the protected area.</p>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php require_once './templates/footer.php'; ?>