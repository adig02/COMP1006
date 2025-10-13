<!-- success message if all data submitted correctly -->
<?php if($success):  ?>
    <div class="alert alert-success" role="alert">
        <p>Profile Created Successfully</p>
        <a class="btn btn-primary" href="allProfiles.php">View All Profiles</a>
    </div>
<?php endif; ?>
<!-- error message shown if errors array is not empty -->
<?php if (!empty($userModel->errors)): ?>
    <div class="alert alert-danger" role="alert">
            <!-- looping through errors array to display all errors present -->
            <?php foreach ($userModel->errors as $error):
                echo "<p>$error</p>";
            endforeach; ?>
    </div>
<?php endif; ?>
<form  class="card" action="#createProfile" method="POST" enctype="multipart/form-data">
    <fieldset>
        <!--full name input-->
        <label for="full_name" class="form-label">Full Name*</label>
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name" required maxlength="99">
        <br>
        <!--username input-->
        <label for="username" class="form-label">Username*</label>
        <input class="form-control" type="text" id="username" name="username" placeholder="Enter a unique username" required maxlength="49">
        <br>
        <!--email input-->
        <label for="email" class="form-label">Email*</label>
        <input class="form-control" type="email" id="email" name="email" placeholder="Enter a unique & valid email" required maxlength="250" >
        <br>
        <!--age  input-->
        <label for="age" class="form-label">Age*</label>
        <input class="form-control" type="number" id="age" name="age" placeholder="18+" min="18" max="120" required >
        <br>
        <!--Gender input-->
        <label class="form-label">Gender*</label>
        <br>
        <input type="radio" id="male" name="gender" value="male" >
        <label for="male">Male</label>
        <br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
        <br>
        <!--bio input-->
        <label id="adjustment-bio" for="bio" class="form-label">Bio</label>
        <textarea class="form-control" id="bio" name="bio" maxlength="250"></textarea>
        <br>
        <!--profile pic input-->
        <label for="profile_img" class="form-label">Profile Image*</label>
        <input class="form-control" type="file" id="profile_img" name="profile_img" required>
        <small class="text-muted">Allowed: JPG, PNG, GIF. Max 2MB.</small>
    </fieldset>
    <input class="btn btn-primary" id="submit-button" type="submit" value="Create Profile">
</form>