<?php

class Validation
{

    /**
     * Validate Image Function & move to uploads
     * @return string|array
     */
    public static function validateImg(array $imgData)
    {
        // check to see if user uploaded an image, if not prompt user to select an image
        if (empty($imgData['name'])) {
            return ['img_validation_error' => "Please select an image"];
        }
        // grabbing file properties to use for validation
        $fileName = $imgData['name'];
        $fileTmpName = $imgData['tmp_name'];
        $fileSize = $imgData['size'];
        $fileError = $imgData['error'];

        // checking upload errors
        if ($fileError !== 0) {
            return ['img_validation_error' => "There was an issue uploading your file."];
        }

        // defining the allowed img extension types
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // this grabs the extension of the image in lower case
        if (!in_array($fileExt, $allowed)) {
            // if user tries to upload a file type other than the ones allowed an error message is displayed
            return ['img_validation_error' => "Must be jpg, jpeg, png or gif"];
        }

        // setting a max file size
        $maxSize = 2 * 1024 * 1024; // this is approx 2MB
        if ($fileSize > $maxSize) {
            // if user tries to upload a file greater than 2MB an error message is displayed
            return ['img_validation_error' => "File size must be less than 2 MB"];
        }

        // providing the file a unique name
        $uniqueFileName = uniqid('', true) . "." . $fileExt;
        $fileDestination = 'uploads/' . $uniqueFileName;

        // moving file from temp location to the uploads folder location using $fileDestination
        if (!move_uploaded_file($fileTmpName, $fileDestination)) {
            return ['img_validation_error' => "File upload failed"];
        }

        // if it gets to this point the final fileDestination is passed
        return $fileDestination;
    }

    /**
     * Checks if certain required fields are empty & provides a required message
     * @param $formData
     * @param $requiredFields
     * @return array containing any errors found
     */
    public static function checkEmpty($formData, $requiredFields): array
    {
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($formData[$field])) {
                // ucwords capitalizes each word of the string
                // str_replace to replace '_' in field names with a space ' '
                // e.g. full_name becomes -> Full Name
                $formattedField = ucwords(str_replace('_', ' ', $field));
                // removes the word register
                $formattedField2 = str_replace("Register", "", $formattedField);
                $errors[$field] = "{$formattedField2} is required";
            }
        }
        return $errors;
    }

    /**
     * Validate email is not empty, format, and is unique
     * @param $email
     * @return array containing any errors found
     */
    public static function validUniqueEmail($email, PDO $PDO): array
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['email_validation_error' => "Invalid Email Format"];
        }
        try {
            $stmt = $PDO->prepare("SELECT 1 FROM Reclaim_admins WHERE LOWER(email) = LOWER(:email) LIMIT 1");
            $stmt->execute([':email' => trim($email)]);

            if ($stmt->fetch()) {
                // Email already exists
                return ['email_validation_error' => "Email already exists"];
            }
        } catch (PDOException $e) {
            // Optional: store or display DB error
            return ['database_errors' => "Database error checking email." . $e->getMessage()];
        }
        return [];
    }

    /**
     * Validate email is the right format
     * @param $email
     * @return array containing any errors found
     */
    public static function validEmail($email): array
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['email_validation_error' => "Invalid Email Format"];
        }
        return [];
    }

    /**
     * Validate age: required, integer, ranges from 18-120
     * @param $age
     * @return array containing any errors found
     */

    public static function validAge($age): array
    {
        if (!preg_match("/^[0-9]+$/", $age) || $age > 120) {
            return ['age_validation_error' => "Invalid Age"];
        }
        if ($age < 18) {
            return ['age_validation_error' => "Must be 18+ to register"];
        }
        return [];
    }

    /**
     * Validates password + confirm password, checks basic strength,
     * hashes the password, and records any errors.
     *
     * @param string $password
     * @param string $confirmPassword
     * @return string|array    Hashed password on success, array with errors on failure
     */
    public static function validatePassword($password, $confirmPassword): array
    {
        $errors = [];

        // Check match
        if ($password !== $confirmPassword) {
            $errors['confirm_error'] = "Passwords do not match.";
        }

        // Password strength rules: at least one number & > 8 characters long
        if (strlen($password) < 8 || !preg_match('/\d/', $password)) {
            $errors['password_error'] = "Password must be at least 8 characters long, and include at least one number.";
        }

        return $errors;
    }

}

?>