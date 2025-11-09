<?php
// setting the custom metadata
$pageTitle = "Reclaim | Report Lost Items";
$pageDesc = "Browse verified found items currently held by the Lost & Found office.";

// include required files

// adding the header
require './templates/header.php';
?>
            <section class="hero-template found-items">
                <div>
                    <h2>Report Lost Items</h2>
                    <i class="fa-solid fa-clipboard-question fa-2x"></i>
                </div>
                <p>Fill out the form below with as many details as possible to help us identify your item.</p>
            </section>
            <form class="lost-form" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Item Information</legend>
                    <label for="title">Item Title *</label>
                    <input type="text" id="title" name="title" placeholder="e.g. Black iPhone 13" required>
                    <label for="category">Category *</label>
                    <select id="category" name="category" required>
                        <option value="">Select a category</option>
                        <option value="electronics">Electronics</option>
                        <option value="clothing">Clothing</option>
                        <option value="jewelry">Jewelry</option>
                        <option value="ids">IDs</option>
                        <option value="bags">Bags</option>
                        <option value="keys">Keys</option>
                        <option value="other">Other</option>
                    </select>
                    <label for="lost_date">Date Lost *</label>
                    <input type="date" id="lost_date" name="lost_date" required>
                    <label for="lost_location">Location Lost *</label>
                    <input type="text" id="lost_location" name="lost_location" placeholder="Where did you last have it?"
                           required>
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4"
                                  placeholder="Include colors, brand, or any identifying marks"></textarea>
                        <label for="proof_notes">Proof Notes (optional)</label>
                        <textarea id="proof_notes" name="proof_notes" rows="3"
                                  placeholder="Serial number, unique scratch, tag color, etc."></textarea>
                        <label for="image">Upload Image (optional)</label>
                        <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Your Contact Information</legend>
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                    <label for="contact_phone">Phone Number (optional)</label>
                    <input type="tel" id="phone" name="phone" placeholder="(123) 456-7890">
                </fieldset>
                <div class="form-actions">
                    <button type="submit" class="btn">Submit Report</button>
                    <a href="index.php" class="btn">Cancel</a>
                </div>
            </form>
<?php
// adding the cta
require './templates/misplaced_cta.php';
// adding the footer
require './templates/footer.php';
?>