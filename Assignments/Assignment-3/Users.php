<?php
    class Users{
        private $pdo;
        public array $errors = [];
        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        /**
         * Validate Image Function & move to uploads
         * @return string|false final path on success or false on failure
         */
        private function validateProfileImg(array $imgData){
            // check to see if user uploaded an image, if not prompt user to select an image
            if(empty($imgData['name'])){
                $this->errors[] = "Please select an image";
                return false;
            }
            // grabbing file properties to use for validation
            $fileName = $imgData['name'];
            $fileTmpName = $imgData['tmp_name'];
            $fileSize = $imgData['size'];
            $fileError = $imgData['error'];

            // checking upload errors
            if ($fileError !== 0){
                $this->errors[] = "There was an issue uploading your file.";
                return false;
            }

            // defining the allowed img extension types
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // this grabs the extension of the image in lower case
            if (!in_array($fileExt, $allowed)){
                // if user tries to upload a file type other than the ones allowed an error message is displayed
                $this->errors[] = "Must be jpg, jpeg, png or gif";
                return false;
            }

            // setting a max file size
            $maxSize = 2 * 1024 * 1024; // this is approx 2MB
            if ($fileSize > $maxSize){
                // if user tries to upload a file greater than 2MB an error message is displayed
                $this->errors[] = "File size must be less than 2 MB";
                return false;
            }

            // providing the file a unique name
            $uniqueFileName = uniqid('', true) . "." . $fileExt;
            $fileDestination = 'uploads/' . $uniqueFileName;

            // moving file from temp location to the uploads folder location using $fileDestination
            if (!move_uploaded_file($fileTmpName, $fileDestination)){
                $this->errors[] = "File upload failed";
                return false;
            }

            // if it gets to this point the final fileDestination is passed
            return $fileDestination;
        }

        /**
         * Checks if certain required fields are empty & provides a required message
         * @param $formData
         * @param $requiredFields
         */
        private function checkEmpty($formData, $requiredFields){
            foreach ($requiredFields as $field){
                if (empty($formData[$field])){
                    // ucwords capitalizes each word of the string
                    // str_replace to replace '_' in field names with a space ' '
                    // e.g. full_name becomes -> Full Name
                    $formattedField = ucwords(str_replace('_', ' ', $field));
                    $this->errors[] = "$formattedField is required";
                }
            }
        }

        /**
         * Validate email is not empty, format, and is unique
         * @param $email
         */
        private function validEmail($email){
            if (empty($email)){
                $this->errors[] = "Email is required";
                return;
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->errors[] = "Invalid Email Format";
                return;
            }
            try {
                $stmt = $this->pdo->prepare("SELECT 1 FROM connectHub WHERE LOWER(email) = LOWER(:email) LIMIT 1");
                $stmt->execute([':email' => trim($email)]);

                if ($stmt->fetch()) {
                    // Username already exists — add to error list
                    $this->errors[] = "Email already exists.";
                }
            } catch (PDOException $e) {
                // Optional: store or display DB error
                $this->errors[] = "Database error checking email." .$e->getMessage();
            }
        }

        /**
         * Validate age: required, integer, ranges from 18-120
         * @param $age
         */
        private function validAge($age){
            if (empty($age)){
                $this->errors[] = "Age is required";
                return;
            }
            if (!preg_match("/^[0-9]+$/", $age) || $age > 120){
                $this->errors[] = "Invalid Age";
                return;
            }
            if ($age < 18){
                $this->errors[] = "Must be 18+ to sign up.";
            }
        }

        /**
         * Validates that username is not empty & is unique
         * @param $username
         */
        private function checkUsername($username) {
            if(empty($username)){
                $this->errors[] = "Username is required";
                return;
            }
            try {
                $stmt = $this->pdo->prepare("SELECT 1 FROM connectHub WHERE LOWER(username) = LOWER(:username) LIMIT 1");
                $stmt->execute([':username' => trim($username)]);

                if ($stmt->fetch()) {
                    // Username already exists — add to error list
                    $this->errors[] = "Username already exists.";
                }
            } catch (PDOException $e) {
                // Optional: store or display DB error
                $this->errors[] = "Database error checking username." .$e->getMessage();
            }
        }

        /**
         * Inserts a new profile record
         * @param string $full_name the user's full name (required)
         * @param string $username the user's username (unique, required)
         * @param string $email the user's email (valid email, required)
         * @param int $age the user's age (required, 18+)
         * @param string $gender the user's gender (required)
         * @param string $bio the user's biography (not required )
         * @param string $imgData the $_FILES array for the profile image
         * @return bool true on success, false on failure
         */
        public function create($full_name, $username, $email, $age, $gender, $bio, array $imgData ){

            // checking for empty inputs when they are required, checking unique email/username values, checking correct email format, checking age & checking if image is valid
            // each independently adds an error msg to errors[]
            $this->checkEmpty($_POST, array('full_name', 'gender'));
            $this->checkUsername($username);
            $this->validEmail($email);
            $this->validAge($age);
            $image_path = $this->validateProfileImg($imgData);

            // if any errors found at any point, return false & don't create a profile
            if (!empty($this->errors)){
                return false;
            }

            // otherwise try to insert data
            try{
                $sql = "INSERT INTO connectHub (full_name, username, email, age, gender, bio, profile_pic_path) VALUES (:full_name, :username, :email, :age, :gender, :bio, :profile_pic_path)";
                $stmt = $this->pdo->prepare($sql);
                // bind values to placeholders to avoid SQL injection
                $stmt->bindParam(':full_name', $full_name);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':age', $age);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':bio', $bio);
                $stmt->bindParam(':profile_pic_path', $image_path);
                return $stmt->execute();
            } catch (PDOException $e){
                $this->errors[] = "Database error: " . $e->getMessage();
                if (file_exists($image_path)){
                    unlink($image_path);
                }
                return false;
            }
        }

        /**
         * Read all uploaded profiles
         * @return array | false
         */
        public function read(){
            try{
                $sql = "SELECT * FROM connectHub ORDER BY id DESC";
                $stmt = $this->pdo->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e){
                $this->errors[] = "Database read error: " . $e->getMessage();
                return false;
            }
        }

        /**
         * Get a single profile by id
         * @param $id
         * @return array | false
         */
        public function getProfile($id){
            try{
                $sql = "SELECT * FROM connectHub WHERE id = :id LIMIT 1";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
            } catch (PDOException $e){
                $this->errors[] = "Database getProfile read error: " . $e->getMessage();
                return false;
            }
        }
    }
?>