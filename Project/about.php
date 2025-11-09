<?php
// setting the custom metadata
$pageTitle = "Reclaim | About";
$pageDesc = "Reclaim helps institutions securely manage lost and found items, reconnecting people with their belongings quickly and reliably.";

// adding the header
require './templates/header.php';
?>
            <!-- HERO / INTRO -->
            <section class="hero-template">
                <h2>About Reclaim</h2>
                <p>Reclaim is a modern lost & found management system that helps institutions, campuses, and organizations reconnect people with their belongings—securely and efficiently.</p>
            </section>
            <!-- OUR STORY -->
            <section class="about-story">
                <div class="about-story-txt">
                    <h2>Our Story</h2>
                    <p>Reclaim began as a student project, born from the frustration of losing items on campus and the complicated process of getting them back. We noticed how outdated systems made it difficult for both students and staff to efficiently manage lost and found items.</p>
                    <p>What started as a simple solution for our university has evolved into a comprehensive platform that serves institutions nationwide. We've streamlined the entire process, making it easier than ever for people to report lost items and for administrators to manage returns.</p>
                    <p>Today, Reclaim helps thousands of people reconnect with their belongings every month, transforming what was once a tedious process into a seamless experience.</p>
                </div>
                <img src="./img/about-us-img.jpg" alt="about us img">
            </section>
            <!-- OUR MISSION -->
            <section class="about-mission">
                <h2>Our Mission</h2>
                <p>"To make it easy for people and property to find their way back to each other. We believe every misplaced item deserves a fair chance of being returned—and that technology should make this process faster, not harder."</p>
            </section>
            <section class="how-it-works">
                <div>
                    <h2>How it Works</h2>
                    <p>Three simple steps to reunite with your belongings</p>
                </div>
                <ol class="steps">
                    <li>
                        <img src="./img/Report%20Icon.png" alt="Report icon">
                        <h3>Report</h3>
                        <p>Lost something? Submit a report with what, where, and when.</p>
                        <a class="btn btn-tiny" href="report-lost.php">Report Now</a>
                    </li>
                    <li>
                        <img src="./img/Search%20Icon%2050.png" alt="Review icon">
                        <h3>Review</h3>
                        <p>Our staff reviews reports and posts verified found items daily.</p>
                        <a class="btn btn--tiny" href="claim.php">Browse Items</a>
                    </li>
                    <li>
                        <img src="./img/Checkmark%20Icon%2050.png" alt="Reclaim icon">
                        <h3>Reclaim</h3>
                        <p>Think you see your item? Visit the listing and use the Claim page to provide proof.</p>
                        <a class="btn btn--tiny" href="claim.php">Reclaim</a>
                    </li>
                </ol>
            </section>
            <!-- CORE VALUES -->
            <section class="about-values">
                <div>
                    <h2>Our Core Values</h2>
                    <p>The principles that guide everything we do</p>
                </div>
                <div class="values-grid">
                    <article>
                        <div class="icon-container">
                            <i class="fa-solid fa-exclamation fa-2x"></i>
                        </div>
                        <h3>Integrity</h3>
                        <p>Every listing is verified and posted by an authorized admin, ensuring accuracy, fairness, and accountability throughout the process.</p>
                    </article>
                    <article>
                        <div class="icon-container">
                            <i class="fa-solid fa-lock fa-2x"></i>
                        </div>
                        <h3>Privacy</h3>
                        <p>User contact information is never made public. Reclaim only collects what’s necessary to verify ownership and coordinate safe returns.
                        </p>
                    </article>
                    <article>
                        <div class="icon-container">
                            <i class="fa-solid fa-person fa-2x"></i>
                        </div>
                        <h3>Accessibility</h3>
                        <p>Our simple interface is designed for everyone—no login required for reporting lost items, and full mobile support for convenient access on the go.
                        </p>
                    </article>
                    <article>
                        <div class="icon-container">
                            <i class="fa-solid fa-handshake fa-2x"></i>
                        </div>
                        <h3>Trust</h3>
                        <p>Each verified return strengthens our connection with the community. Reclaim builds confidence through consistency and transparency.
                        </p>
                    </article>
                </div>
            </section>
<?php
// adding the cta
require './templates/misplaced_cta.php';
// adding the footer
require './templates/footer.php';
?>