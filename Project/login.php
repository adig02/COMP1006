<?php
// setting the custom metadata
$pageTitle = "Reclaim | Login";
$pageDesc = "Admin Login/Register For an admin account";

// adding the header
require './templates/header.php';
?>
            <section class="login-register">
                <div class="login-hero">
                    <h2>Reclaim</h2>
                    <p>Helping people and property find their way back</p>
                </div>
                <div class="login-register-div contact-container">
                    <div class="login-container contact-card">
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
                    <div class="register-container contact-card">
                        <h3>Request Admin Access</h3>
                        <p>Create your administrator account</p>
                        <form class="register-form" action="#" method="post">
                            <label for="name">Full Name *</label>
                            <input id="name" name="name" type="text" required placeholder="First Last">
                            <label for="email">Institutional Email *</label>
                            <input id="email" name="email" type="email" required placeholder="your@email.ecom">
                            <div class="grid-2">
                                <div>
                                    <label for="password">Password *</label>
                                    <input id="password" name="password" type="password" required placeholder="Min 8 characters">
                                </div>
                                <div>
                                    <label for="confirm">Confirm Password *</label>
                                    <input id="confirm" name="confirm" type="password" required placeholder="Re-enter password">
                                </div>
                            </div>
                            <p>Password must be at least 8 characters and include a number.</p>
                            <button type="submit" class="btn">Create Admin Account</button>
                        </form>
                    </div>
                </div>
            </section>
<?php
// adding the footer
require './templates/footer.php';
?>