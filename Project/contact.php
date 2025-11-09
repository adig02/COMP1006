<?php
// setting the custom metadata
$pageTitle = "PROJECTNAME | Contact";
$pageDesc = "CONTACT PAGE DESCRIPTION";

// include required files

// adding the header
require './templates/header.php';
?>
            <section class="hero-template found-items">
                <div>
                    <h2>Get in Touch</h2>
                    <i class="fa-solid fa-paper-plane fa-2x"></i>
                </div>
                <p>Have questions about lost items or our services? We're here to help. Reach out to our team and we'll respond as quickly as possible.</p>
            </section>
            <section class="contact-container">
                <div class="contact-form contact-card">
                    <h3>Send us a message</h3>
                    <p>Fill out the form below and we'll get back to you within 24 hours.</p>
                    <form action="#" method="post">
                        <label for="name">Full Name *</label>
                        <input id="name" name="name" type="text" required placeholder="Your name">
                        <label for="email">Email Address *</label>
                        <input id="email" name="email" type="email" required placeholder="you@example.com">
                        <label for="subject">Subject *</label>
                        <input id="subject" name="subject" type="text" required placeholder="e.g., Question about a found phone">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required placeholder="How can we help?"></textarea>
                        <div class="form-actions">
                            <button type="submit" class="btn">Send Message</button>
                            <a href="index.php" class="btn">Back to Home</a>
                        </div>
                    </form>
                    <p>* Required fields. We aim to reply within 1–2 business days.</p>
                </div>
                <div class="contact-card contact-info">
                    <h3>Contact Information</h3>
                    <div>
                        <p class="bold">Address</p>
                        <p>Lorem ipsum dolor.</p>
                        <p>Lorem ipsum.</p>
                        <p>Lorem ipsum dolor.</p>
                    </div>
                    <div>
                        <p class="bold">Business Hours</p>
                        <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                        <p>Saturday: 9:00 AM - 4:00 PM</p>
                        <p>Sunday: Closed</p>
                    </div>
                    <div>
                        <p class="bold">Email</p>
                        <p>support@reclaim.com</p>
                    </div>
                    <div>
                        <p class="bold">Phone</p>
                        <p>+1 (555) 123-4567</p>
                    </div>
                </div>
            </section>
            <section class="faq">
                <h3 id="faq-title">Frequently Asked Questions</h3>
                <div>
                    <h4 class="bold">How long are items held?</h4>
                    <p>Most items are held for up to 60 days. Government-issued IDs may follow different policies.</p>
                </div>
                <div>
                    <h4 class="bold">What proof of ownership do you accept?</h4>
                    <p>Non-sensitive details: serial/IMEI, identifying marks, case color/brand, or a purchase photo/receipt
                        snippet.</p>
                </div>
                <div>
                    <h4 class="bold">Can I report a lost item online??</h4>
                    <p>Yes! You can report lost items through our website 24/7. Simply create a free account, provide a detailed description of your lost item, and we'll notify you immediately if a matching item is found. You can also track the status of your report and update information at any time through your dashboard.</p>
                </div>
                <div>
                    <h4 class="bold">Is my contact information public?</h4>
                    <p>No. Your details are used solely for matching and are not displayed publicly.</p>
                </div>
            </section>
<?php
// adding the footer
require './templates/footer.php';
?>