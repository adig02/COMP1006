<?php

require_once 'Validation.php';

class CRUD
{
    private $pdo;
    public array $errors = [];

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

//    /**
//     * Validate Image Function & move to uploads
//     * @return string|false final path on success or false on failure
//     */
//    private function validateImg(array $imgData){
//        // check to see if user uploaded an image, if not prompt user to select an image
//        if (empty($imgData['name'])) {
//            $this->errors[] = "Please select an image";
//            return false;
//        }
//        // grabbing file properties to use for validation
//        $fileName = $imgData['name'];
//        $fileTmpName = $imgData['tmp_name'];
//        $fileSize = $imgData['size'];
//        $fileError = $imgData['error'];
//
//        // checking upload errors
//        if ($fileError !== 0) {
//            $this->errors[] = "There was an issue uploading your file.";
//            return false;
//        }
//
//        // defining the allowed img extension types
//        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
//        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // this grabs the extension of the image in lower case
//        if (!in_array($fileExt, $allowed)) {
//            // if user tries to upload a file type other than the ones allowed an error message is displayed
//            $this->errors[] = "Must be jpg, jpeg, png or gif";
//            return false;
//        }
//
//        // setting a max file size
//        $maxSize = 2 * 1024 * 1024; // this is approx 2MB
//        if ($fileSize > $maxSize) {
//            // if user tries to upload a file greater than 2MB an error message is displayed
//            $this->errors[] = "File size must be less than 2 MB";
//            return false;
//        }
//
//        // providing the file a unique name
//        $uniqueFileName = uniqid('', true) . "." . $fileExt;
//        $fileDestination = 'uploads/' . $uniqueFileName;
//
//        // moving file from temp location to the uploads folder location using $fileDestination
//        if (!move_uploaded_file($fileTmpName, $fileDestination)) {
//            $this->errors[] = "File upload failed";
//            return false;
//        }
//
//        // if it gets to this point the final fileDestination is passed
//        return $fileDestination;
//    }
//
//    /**
//     * Checks if certain required fields are empty & provides a required message
//     * @param $formData
//     * @param $requiredFields
//     */
//    private function checkEmpty($formData, $requiredFields){
//        foreach ($requiredFields as $field) {
//            if (empty($formData[$field])) {
//                // ucwords capitalizes each word of the string
//                // str_replace to replace '_' in field names with a space ' '
//                // e.g. full_name becomes -> Full Name
//                $formattedField = ucwords(str_replace('_', ' ', $field));
//                $this->errors[] = "{$formattedField} is required";
//            }
//        }
//    }
//
//    /**
//     * Validate email is not empty, format, and is unique
//     * @param $email
//     */
//    private function validEmail($email)
//    {
//        if (empty($email)) {
//            $this->errors[] = "Email is required";
//            return;
//        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            $this->errors[] = "Invalid Email Format";
//            return;
//        }
//        try {
//            $stmt = $this->pdo->prepare("SELECT 1 FROM Reclaim_admins WHERE LOWER(email) = LOWER(:email) LIMIT 1");
//            $stmt->execute([':email' => trim($email)]);
//
//            if ($stmt->fetch()) {
//                // Username already exists — add to error list
//                $this->errors[] = "Email already exists.";
//            }
//        } catch (PDOException $e) {
//            // Optional: store or display DB error
//            $this->errors[] = "Database error checking email." . $e->getMessage();
//        }
//    }
//
//    /**
//     * Validate age: required, integer, ranges from 18-120
//     * @param $age
//     */
//    private function validAge($age)
//    {
//        if (empty($age)) {
//            $this->errors[] = "Age is required";
//            return;
//        }
//        if (!preg_match("/^[0-9]+$/", $age) || $age > 120) {
//            $this->errors[] = "Invalid Age";
//            return;
//        }
//        if ($age < 18) {
//            $this->errors[] = "Must be 18+ to sign up.";
//        }
//    }
//
//    /**
//     * Validates password + confirm password, checks basic strength,
//     * hashes the password, and records any errors.
//     *
//     * @param string $password
//     * @param string $confirmPassword
//     * @param array  $errors  Passed by reference – errors will be added here
//     * @return string|null    Hashed password on success, null on failure
//     */
//    public function validateAndHashPassword($password, $confirmPassword)
//    {
//        // Check match
//        if ($password !== $confirmPassword) {
//            $this->errors[] = "Passwords do not match.";
//        }
//
//        // Password strength rules: at least one number & > 8 characters long
//        if (strlen($password) < 8) {
//            $this->errors[] = "Password must be at least 8 characters long.";
//        }
//        if (!preg_match('/\d/', $password)) {
//            $this->errors[] = "Password must include at least one number.";
//        }
//
//        // If any validation errors, return & don't attempt to hash password
//        if (!empty($this->errors)) {
//            return null;
//        }
//
//        // Hash password
//        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//
//        // Check hash success
//        if ($hashedPassword === false) {
//            $this->errors[] = "Could not hash password. Please try again.";
//            return null;
//        }
//
//        return $hashedPassword;
//    }
//

    /**
     * Inserts a new admin record when registering
     * @param string $name the user's full name (required)
     * @param string $email the user's email (valid email, required)
     * @param int $age the user's age (required, 18+)
     * @param string $gender the user's gender (required)
     * @param string $password_hash the hashed admin password to be used for login verification
     * @return bool true on success, false on failure
     */
    public function registerAdmin($name, $email, $age, $gender, $password_hash)
    {
        // checking for empty inputs when they are required, checking unique email values & email format, & checking age
        // each independently adds an error msg to errors[]

        // empty fields validation
        $this->errors = array_merge($this->errors, Validation::checkEmpty($_POST, ['register_name', 'register_email', 'age', 'gender', 'register_password', 'confirm_password']));
        // email validation
        $this->errors = array_merge($this->errors, Validation::validUniqueEmail($email, $this->pdo));
        // age validation
        $this->errors = array_merge($this->errors, Validation::validAge($age));

        // if any errors found, return false & don't register the user
        if (!empty($this->errors)) {
            return false;
        }

        // otherwise try to insert data
        try {
            $sql = "INSERT INTO Reclaim_admins (name, email, age, gender, password_hash) VALUES (:name, :email, :age, :gender, :password_hash)";
            $stmt = $this->pdo->prepare($sql);
            // bind values to placeholders to avoid SQL injection
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':password_hash', $password_hash);
            return $stmt->execute();
        } catch (PDOException $e) {
            $this->errors['database_error'] = "Database error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Inserts a found item record
     * @param string $item_name the item's name (required)
     * @param string $description the items description (required)
     * @param string $category the items category (required)
     * @param string $location_found the item's found location (required)
     * @param string $date_found the date the item was found/record recorded (required)
     * @param array $found_image_file the $_FILES array for the item image
     * @param string $item_status the item's current status
     * @return bool true on success, false on failure
     */
    public function CreateFoundItem($item_name, $description, $category, $location_found, $date_found, array $found_image_file, $item_status)
    {

        // empty fields validation
        $this->errors = array_merge($this->errors, Validation::checkEmpty($_POST, ['item_name', 'description', 'category', 'location_found', 'date_found', 'item_status']));


        $image_path = null;
        $imgResult  = Validation::validateImg($found_image_file);

        if (is_array($imgResult)) {
            // imgResult contains ['img_validation_error' => 'message']
            $this->errors = array_merge($this->errors, $imgResult);
        } else {
            // string path
            $image_path = $imgResult;
        }

        // If any errors found at any point, return false & don't create a found log
        if (!empty($this->errors) || empty($image_path)) {
            return false;
        }

        // otherwise try to insert data
        try {
            $sql = "INSERT INTO Reclaim_lost_items (item_name, description, category, location_found, date_found, image_path, item_status) VALUES (:item_name, :description, :category, :location_found, :date_found, :image_path, :item_status)";
            $stmt = $this->pdo->prepare($sql);
            // bind values to placeholders to avoid SQL injection
            $stmt->bindParam(':item_name', $item_name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':location_found', $location_found);
            $stmt->bindParam(':date_found', $date_found);
            $stmt->bindParam(':image_path', $image_path);
            $stmt->bindParam(':item_status', $item_status);
            return $stmt->execute();
        } catch (PDOException $e) {
            $this->errors['database_error'] = "Database error: " . $e->getMessage();
            if (!empty($image_path) && file_exists($image_path)) {
                unlink($image_path);
            }
            return false;
        }
    }

    /**
     * Inserts a lost item record (filled out by users & viewed by admins in the console)
     * @param string $lost_item_name the item's name (required)
     * @param string $lost_category the items category (required)
     * @param string $date_lost the date the item was lost by the user (required)
     * @param string $location_lost the item's lost location (required)
     * @param string $lost_description the items description
     * @param string $lost_proof_notes the items ownership proof notes
     * @param array $lost_image_file the $_FILES array for the item image
     * @param string $lost_name the user's name (required)
     * @param string $lost_email the user's email (required)
     * @param string $lost_phone the user's phone number
     * @return bool true on success, false on failure
     */
    public function CreateLostItem($lost_item_name, $lost_category, $date_lost, $location_lost, $lost_description, $lost_proof_notes, array $lost_image_file, $lost_name, $lost_email, $lost_phone)
    {
        // checking for empty inputs when they are required, checking valid dates, and valid image
        // each independently adds an error msg to errors[]
        $this->errors = array_merge($this->errors, Validation::checkEmpty($_POST, ['lost_item_name', 'lost_category', 'location_lost', 'date_lost', 'lost_name', 'lost_email']));
        $this->errors = array_merge($this->errors, Validation::validEmail($lost_email));

        $lost_image_path = null;
        $imgResult = Validation::validateImg($lost_image_file);

        if (is_array($imgResult)) {
            $this->errors = array_merge($this->errors, $imgResult);
        } else {
            $lost_image_path = $imgResult;
        }

        // TODO: NEED VALID DATE FUNCTION

        // if any errors found at any point, return false & don't create a found log
        if (!empty($this->errors) || empty($lost_image_path)) {
            return false;
        }

        // otherwise try to insert data
        try {
            $sql = "INSERT INTO Reclaim_lost_reports (lost_item_name, lost_category, date_lost, location_lost, lost_description, lost_proof_notes, lost_image_path, lost_name, lost_email, lost_phone) VALUES (:lost_item_name, :lost_category, :date_lost, :location_lost, :lost_description, :lost_proof_notes, :lost_image_path, :lost_name, :lost_email, :lost_phone)";
            $stmt = $this->pdo->prepare($sql);
            // bind values to placeholders to avoid SQL injection
            $stmt->bindParam(':lost_item_name', $lost_item_name);
            $stmt->bindParam(':lost_category', $lost_category);
            $stmt->bindParam(':date_lost', $date_lost);
            $stmt->bindParam(':location_lost', $location_lost);
            $stmt->bindParam(':lost_description', $lost_description);
            $stmt->bindParam(':lost_proof_notes', $lost_proof_notes);
            $stmt->bindParam(':lost_image_path', $lost_image_path);
            $stmt->bindParam(':lost_name', $lost_name);
            $stmt->bindParam(':lost_email', $lost_email);
            $stmt->bindParam(':lost_phone', $lost_phone);
            return $stmt->execute();
        } catch (PDOException $e) {
            $this->errors['database_error'] = "Database error: " . $e->getMessage();
            if (!empty($lost_image_path) && file_exists($lost_image_path)) {
                unlink($lost_image_path);
            }
            return false;
        }
    }


    /**
     * Read all found items to display in admin console, and user found page
     * @return array | false
     */
    public function viewAllItems()
    {
        try {
            $sql = "SELECT * FROM Reclaim_lost_items ORDER BY id DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->errors[] = "Database read error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Get a single found item by id
     * @param $id
     * @return array | false
     */
    public function getItem($id)
    {
        try {
            $sql = "SELECT * FROM Reclaim_lost_items WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
        } catch (PDOException $e) {
            $this->errors[] = "Database getLostItem read error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Get a single found item by category
     * @param $category
     * @return array | false
     */
    public function getItembyCategory($category)
    {
        try {
            $sql = "SELECT * FROM Reclaim_lost_items WHERE category = :category ORDER BY id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':category', $category);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
        } catch (PDOException $e) {
            $this->errors[] = "Database getLostItem read error: " . $e->getMessage();
            return false;
        }
    }
}

?>