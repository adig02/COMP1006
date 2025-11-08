<?php
// setting the custom metadata
$pageTitle = "Reclaim | About";
$pageDesc = "Reclaim helps institutions securely manage lost and found items, reconnecting people with their belongings quickly and reliably.";

// adding the header
require './templates/header.php';
?>
            <!-- HERO / INTRO -->
            <section class="about-hero" aria-labelledby="about-title">
                <h1 id="about-title">About Reclaim</h1>
                <p class="lead">
                    Reclaim is a modern lost & found management system that helps institutions, campuses,
                    and organizations reconnect people with their belongings—securely and efficiently.
                </p>
            </section>

            <!-- OUR STORY -->
            <section class="about-story" aria-labelledby="story-title">
                <h2 id="story-title">Our Story</h2>
                <p>
                    The idea behind Reclaim started from a simple observation: lost items often stay lost
                    because there isn’t an easy way to report, track, and reunite them. Handwritten logs and
                    cluttered bulletin boards are inefficient and outdated. We set out to create a simple,
                    centralized web portal that allows staff to manage found items, and users to quickly report
                    what they’ve lost.
                </p>
                <p>
                    What began as a student project has evolved into a flexible platform that any organization
                    can use to simplify their lost and found process. Reclaim was built with accessibility,
                    transparency, and user trust in mind—values that guide every line of code.
                </p>
            </section>

            <!-- OUR MISSION -->
            <section class="about-mission" aria-labelledby="mission-title">
                <h2 id="mission-title">Our Mission</h2>
                <p>
                    Our mission is to make it easy for people and property to find their way back to each other.
                    We believe every misplaced item deserves a fair chance of being returned—and that technology
                    should make this process faster, not harder.
                </p>

                <blockquote>
                    “Helping people and property find their way back.”
                    <footer>— The Reclaim Team</footer>
                </blockquote>
            </section>

            <!-- HOW IT WORKS (HIGH LEVEL OVERVIEW) -->
            <section class="about-process" aria-labelledby="process-title">
                <h2 id="process-title">How Reclaim Works</h2>
                <ol class="steps">
                    <li>
                        <h3>1. Report</h3>
                        <p>
                            Users who’ve lost an item can quickly submit a report, describing what was lost, when, and where.
                            Each submission helps the admin team cross-check with found items.
                        </p>
                    </li>
                    <li>
                        <h3>2. Review</h3>
                        <p>
                            The admin team verifies new found items, adds clear photos, and ensures every listing meets privacy
                            and accuracy standards.
                        </p>
                    </li>
                    <li>
                        <h3>3. Reconnect</h3>
                        <p>
                            When a potential match is identified, staff reach out to confirm ownership using non-sensitive
                            proof,
                            such as serial numbers or unique markings.
                        </p>
                    </li>
                </ol>
            </section>

            <!-- CORE VALUES -->
            <section class="about-values" aria-labelledby="values-title">
                <h2 id="values-title">Our Core Values</h2>
                <div class="values-grid">
                    <article>
                        <h3>Integrity</h3>
                        <p>
                            Every listing is verified and posted by an authorized admin, ensuring accuracy, fairness,
                            and accountability throughout the process.
                        </p>
                    </article>
                    <article>
                        <h3>Privacy</h3>
                        <p>
                            User contact information is never made public. Reclaim only collects what’s necessary to verify
                            ownership
                            and coordinate safe returns.
                        </p>
                    </article>
                    <article>
                        <h3>Accessibility</h3>
                        <p>
                            Our simple interface is designed for everyone—no login required for reporting lost items,
                            and full mobile support for convenient access on the go.
                        </p>
                    </article>
                    <article>
                        <h3>Trust</h3>
                        <p>
                            Each verified return strengthens our connection with the community.
                            Reclaim builds confidence through consistency and transparency.
                        </p>
                    </article>
                </div>
            </section>

            <!-- TECHNOLOGY & SECURITY -->
            <section class="about-tech" aria-labelledby="tech-title">
                <h2 id="tech-title">Technology & Security</h2>
                <p>
                    Reclaim is built using secure web technologies including PHP, PDO (for safe database connections),
                    and modern HTML5/CSS3 standards. All forms include input validation, and file uploads are filtered
                    by type and size to prevent misuse.
                </p>
                <p>
                    Every action by admins or users is protected by server-side validation, ensuring
                    that the platform remains safe and reliable.
                </p>
            </section>

            <!-- CAMPUS EDITION NOTE -->
            <section class="about-campus" aria-labelledby="campus-title">
                <h2 id="campus-title">Reclaim: Campus Edition</h2>
                <p>
                    The current version of Reclaim has been customized for campus use.
                    It allows students and staff to report lost items online and check a live feed
                    of recently found belongings across the college grounds.
                </p>
                <p>
                    Future versions of Reclaim will include multi-campus management and advanced
                    matching automation for larger institutions.
                </p>
            </section>
<?php
// adding the cta
require './templates/misplaced_cta.php';
// adding the footer
require './templates/footer.php';
?>