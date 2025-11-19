<?php
// setting the custom metadata
$pageTitle = "Reclaim | Login";
$pageDesc = "Reclaim Admin Login";

require_once "./inc/admin_registration.php";

// adding the header
require './templates/header.php';
?>
            <section class="login-register">
                <div class="login-hero">
<!--                    <h2>Reclaim</h2>-->
<!--                    <p>Helping people and property find their way back</p>-->
                </div>
                <div class="login-register-div contact-container">
                    <div class="login-container contact-card">
                        <?php if (!empty($_GET['registered'])): ?>
                            <div class="success-msg">Account created! Please log in.</div>
                        <?php endif; ?>
                        <h3>Administrator Login</h3>
                        <p>Sign in to manage lost and found items</p>
                        <form class="login-form" action="#" method="post">
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="email" required placeholder="your@email.com">
                            <label for="password">Password *</label>
                            <input id="password" name="password" type="password" required placeholder="••••••••">
                            <button type="submit" class="btn btn--primary">Sign In</button>
                        </form>
                    </div>
                </div>
            </section>
<?php
// adding the footer
require './templates/footer.php';
?>