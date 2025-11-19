<?php
// setting the custom metadata
$pageTitle = "Reclaim | Register";
$pageDesc = "Register for an admin reclaim account";

// include required files
require_once './inc/config.php';
require_once './inc/Database.php';
require_once './inc/CRUD.php';

// initializing connecting to the database + creating an instance of CRUD
$db = new Database();
$pdo = $db->getConnection();
$crud = new CRUD($pdo);
$success = false; // tracks if lost item record was created successfully

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(htmlspecialchars($_POST["register_name"]));
    $email = trim(htmlspecialchars($_POST["register_email"]));
    $age = trim(htmlspecialchars($_POST["age"]));
    $gender = trim(htmlspecialchars($_POST["gender"]));
    $password = trim(htmlspecialchars($_POST["register_password"]));
    $confirm_password = $_POST["confirm_password"];

    // validate password
    $password_errors = Validation::validatePassword($password, $confirm_password);
    $crud->errors = array_merge($crud->errors, $password_errors);

    // if no password errors, then hash password
    $hashed_password = null;
    if (empty($password_errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if ($hashed_password === false) {
            $crud->errors['password_error'] = "Could not hash password. Please try again.";
        }
    }

    try {
        if ($crud->registerAdmin($name, $email, $age, $gender, $hashed_password)) {
            header("Location: login.php?registered=1");
            exit;
        }
    } catch (Exception $e) {
        $crud->errors['database_error'] = "Could not create admin account: " . $e->getMessage();
    }
}

// adding the header
require './templates/header.php';
?>
    <section class="login-register">
        <div class="login-hero">
<!--            <h2>Reclaim</h2>-->
<!--            <p>Helping people and property find their way back</p>-->
        </div>
        <div class="login-register-div contact-container">
            <div class="register-container contact-card">
                <h3>Request Admin Access</h3>
                <p>Create your administrator account</p>
                <form class="register-form" method="post">
                    <!--name  input-->
                    <label for="register_name">Full Name *</label>
                    <input id="register_name" name="register_name" type="text"  placeholder="First Last" value="<?= htmlspecialchars($_POST['register_name'] ?? '') ?>" required>
                    <?php if (!empty($crud->errors['register_name'])): ?>
                        <p class="input-error"><?= $crud->errors['register_name']; ?></p>
                    <?php endif; ?>
                    
                    <!--email  input-->
                    <label for="register_email">Institutional Email *</label>
                    <input id="register_email" name="register_email" type="email"  placeholder="your@email.ecom" value="<?= htmlspecialchars($_POST['register_email'] ?? '') ?>" required>
                    <?php if (!empty($crud->errors['register_email'])): ?>
                        <p class="input-error"><?= $crud->errors['register_email']; ?></p>
                    <?php elseif (!empty($crud->errors['email_validation_error'])): ?>
                        <p class="input-error"><?= $crud->errors['email_validation_error']; ?></p>
                    <?php endif; ?>
                    
                    <!--age  input-->
                    <label for="age" class="form-label">Age*</label>
                    <input class="form-control" type="number" id="age" name="age" placeholder="18+" min="18" max="120" value="<?= htmlspecialchars($_POST['age'] ?? '') ?>" required>
                    <?php if (!empty($crud->errors['age'])): ?>
                        <p class="input-error"><?= $crud->errors['age']; ?></p>
                    <?php elseif (!empty($crud->errors['age_validation_error'])): ?>
                        <p class="input-error"><?= $crud->errors['age_validation_error']; ?></p>
                    <?php endif; ?>
                    <br>
                    
                    <!--Gender input-->
                    <label class="form-label">Gender*</label>
                    <br>
                    <div class="form-radio">
                        <div class="form-radio-individual">
                            <input type="radio" name="gender" value="male" id="male" <?= (($_POST['gender'] ?? '') === 'male') ? 'checked' : '' ?> required>
                            <label for="male">Male</label>
                        </div>
                        <div class="form-radio-individual">
                            <input type="radio" name="gender" value="female" id="female" <?= (($_POST['gender'] ?? '') === 'female') ? 'checked' : '' ?>>
                            <label for="female">Female</label>
                        </div>
                        <div class="form-radio-individual">
                            <input type="radio" name="gender" value="other" id="other" <?= (($_POST['gender'] ?? '') === 'other') ? 'checked' : '' ?>>
                            <label for="other">Other</label>
                        </div>
                    </div>
                    <?php if (!empty($crud->errors['gender'])): ?>
                        <p class="input-error"><?= $crud->errors['gender']; ?></p>
                    <?php endif; ?>
                    <br>

                    <div class="grid-2">
                        <!-- Password -->
                        <div>
                            <label for="register_password">Password *</label>
                            <input id="register_password" name="register_password" type="password"  placeholder="Min 8 characters" required>
                        </div>
                        <?php if (!empty($crud->errors['register_password'])): ?>
                            <p class="input-error"><?= $crud->errors['register_password']; ?></p>
                        <?php elseif (!empty($crud->errors['password_error'])): ?>
                            <p class="input-error"><?= $crud->errors['password_error']; ?></p>
                        <?php endif; ?>
                        
                        <!-- Confirm Password -->
                        <div>
                            <label for="confirm_password">Confirm Password *</label>
                            <input id="confirm_password" name="confirm_password" type="password"  placeholder="Re-enter password" required>
                        </div>
                        <?php if (!empty($crud->errors['confirm_password'])): ?>
                            <p class="input-error"><?= $crud->errors['confirm_password']; ?></p>
                        <?php elseif (!empty($crud->errors['confirm_error'])): ?>
                            <p class="input-error"><?= $crud->errors['confirm_error']; ?></p>
                        <?php endif; ?>
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