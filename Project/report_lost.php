<?php
// setting the custom metadata
$pageTitle = "Reclaim | Report Lost Items";
$pageDesc = "Browse verified found items currently held by the Lost & Found office.";

// include required files
require_once './inc/config.php';
require_once './inc/Database.php';
require_once './inc/CRUD.php';

// initializing connecting to the database + creating an instance of CRUD
$db = new Database();
$pdo = $db->getConnection();
$crud = new CRUD($pdo);
$success = false; // tracks if lost item record was created successfully

// checking if profile form was submitted & getting the data 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lost_item_name = trim(htmlspecialchars($_POST["lost_item_name"]));
    $lost_category = trim(htmlspecialchars($_POST["lost_category"]));
    $date_lost = trim(htmlspecialchars($_POST["date_lost"]));
    $location_lost = trim(htmlspecialchars($_POST["location_lost"]));
    $lost_description = trim(htmlspecialchars($_POST["lost_description"]));
    $lost_proof_notes = trim(htmlspecialchars($_POST["lost_proof_notes"]));
    $lost_image_file = $_FILES['lost_image_file'];
    $lost_name = trim(htmlspecialchars($_POST["lost_name"]));
    $lost_email = trim(htmlspecialchars($_POST["lost_email"]));
    $lost_phone = trim(htmlspecialchars($_POST["lost_phone"]));
    
    try{
        if($crud->CreateLostItem($lost_item_name, $lost_category, $date_lost, $location_lost, $lost_description, $lost_proof_notes, $lost_image_file, $lost_name, $lost_email, $lost_phone)){
            $success = true;
        }
    } catch (Exception $e){
        $crud->errors[] = "Could not log lost item: " . $e->getMessage();
    }
}

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
                <!-- success message if all data submitted correctly -->
                <?php if($success):  ?>
                    <div class="success-msg">
                        <p>Lost Item Submitted Successfully</p>
                    </div>
                <?php endif; ?>
                <fieldset>
                    <legend>Item Information</legend>
                    <!-- Lost Item Name-->
                    <label for="lost_item_name">Item Name*</label>
                    <input type="text" id="lost_item_name" name="lost_item_name" placeholder="e.g. Black iPhone 13" required value="<?= htmlspecialchars($_POST['lost_item_name'] ?? '') ?>">
                    <?php if (!empty($crud->errors['lost_item_name'])): ?>
                        <p class="input-error"><?= $crud->errors['lost_item_name']; ?></p>
                    <?php endif; ?>
                    
                    <!-- Lost Item Category-->
                    <label for="lost_category">Category *</label>
                    <select id="lost_category" name="lost_category" required>
                        <option value="">Select a category</option>
                        <option value="electronics" <?= ($_POST['lost_category'] ?? '' === "electronics") ? "selected" : "" ?>>Electronics</option>
                        <option value="clothing" <?= ($_POST['lost_category'] ?? '' === "clothing") ? "selected" : "" ?>>Clothing</option>
                        <option value="jewelry" <?= ($_POST['lost_category'] ?? '' === "jewelry") ? "selected" : "" ?>>Jewelry</option>
                        <option value="ids" <?= ($_POST['lost_category'] ?? '' === "ids") ? "selected" : "" ?>>IDs</option>
                        <option value="bags" <?= ($_POST['lost_category'] ?? '' === "bags") ? "selected" : "" ?>>Bags</option>
                        <option value="keys" <?= ($_POST['lost_category'] ?? '' === "keys") ? "selected" : "" ?>>Keys</option>
                        <option value="other" <?= ($_POST['lost_category'] ?? '' === "other") ? "selected" : "" ?>>Other</option>
                    </select>
                    <?php if (!empty($crud->errors['lost_category'])): ?>
                        <p class="input-error"><?= $crud->errors['lost_category']; ?></p>
                    <?php endif; ?>

                    <!-- Item Lost Date -->
                    <label for="date_lost">Date Lost *</label>
                    <input type="date" id="date_lost" name="date_lost" required value="<?= htmlspecialchars($_POST['date_lost'] ?? '') ?>">
                    <?php if (!empty($crud->errors['date_lost'])): ?>
                        <p class="input-error"><?= $crud->errors['date_lost']; ?></p>
                    <?php endif; ?>

                    <!-- Item Lost Location -->
                    <label for="location_lost">Location Lost *</label>
                    <input type="text" id="location_lost" name="location_lost" placeholder="Where did you last have it?" value="<?= htmlspecialchars($_POST['location_lost'] ?? '') ?>" required>
                    <?php if (!empty($crud->errors['location_lost'])): ?>
                        <p class="input-error"><?= $crud->errors['location_lost']; ?></p>
                    <?php endif; ?>
                    
                    <div>
                        <!-- Lost Item Description -->
                        <label for="lost_description">Description</label>
                        <textarea id="lost_description" name="lost_description" rows="4"
                                  placeholder="Include colors, brand, or any identifying marks"><?= htmlspecialchars($_POST['lost_description'] ?? '') ?></textarea>
                        
                        <!-- Lost Item Proof Notes-->
                        <label for="lost_proof_notes">Proof Notes (optional)</label>
                        <textarea id="lost_proof_notes" name="lost_proof_notes" rows="3"
                                  placeholder="Serial number, unique scratch, tag color, etc."><?= htmlspecialchars($_POST['lost_proof_notes'] ?? '') ?></textarea>

                        <!-- Lost Item Img-->
                        <label for="lost_image_file">Upload Image (optional)</label>
                        <input type="file" id="lost_image_file" name="lost_image_file" accept=".jpg,.jpeg,.png,.gif" value="<?= htmlspecialchars($_POST['lost_image_file'] ?? '') ?>" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Your Contact Information</legend>
                    <!-- Lost Item Owner Name -->
                    <label for="lost_name">Full Name *</label>
                    <input type="text" id="lost_name" name="lost_name" required value="<?= htmlspecialchars($_POST['lost_name'] ?? '') ?>">
                    <?php if (!empty($crud->errors['lost_name'])): ?>
                        <p class="input-error"><?= $crud->errors['lost_name']; ?></p>
                    <?php endif; ?>
                    
                    <!-- Lost Item Owner Email -->
                    <label for="lost_email">Email *</label>
                    <input type="email" id="lost_email" name="lost_email" placeholder="you@example.com" required value="<?= htmlspecialchars($_POST['lost_email'] ?? '') ?>">
                    <?php if (!empty($crud->errors['lost_email'])): ?>
                        <p class="input-error"><?= $crud->errors['lost_email']; ?></p>
                    <?php elseif (!empty($crud->errors['email_validation_error'])): ?>
                    <p class="input-error"><?= $crud->errors['email_validation_error']; ?></p>
                    <?php endif; ?>
                    
                    <!-- Lost Item Owner Phone Number  -->
                    <label for="lost_phone">Phone Number (optional)</label>
                    <input type="tel" id="lost_phone" name="lost_phone" placeholder="(123) 456-7890" value="<?= htmlspecialchars($_POST['lost_phone'] ?? '') ?>">
                </fieldset>
                <div class="form-actions">
                    <button type="submit" class="btn">Submit Report</button>
                </div>
            </form>
<?php
// adding the cta
require './templates/misplaced_cta.php';
// adding the footer
require './templates/footer.php';
?>
