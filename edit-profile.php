<?php
    // define('TITLE', "Edit Profile");
    include 'includes/header.php';
    
    if (!isset($_SESSION['userID']))
    {
        header("Location: index.php");
        exit();
    }    
?>
<div style="text-align: center">
    <img id="userDp" width="100px" src=<?php echo "./uploads/".$_SESSION['image']; ?> >
 
    <h1><?php echo strtoupper($_SESSION['username']); ?></h1>  
</div>

<?php
        $userName = '';
        $email = ''; 
    
        if(isset($_GET['error']))
        {
            if($_GET['error'] == 'emptyemail')
            {
                echo '<p class="closed">*Profile email cannot be empty</p>';
                $email = $_GET['email'];
            }
            else if ($_GET['error'] == 'invalidmail')
            {
                echo '<p class="closed">*Please enter a valid email</p>';
            }
            else if ($_GET['error'] == 'emptyoldpwd')
            {
                echo '<p class="closed">*You must enter the current password to change it</p>';
            }
            else if ($_GET['error'] == 'emptynewpwd')
            {
                echo '<p class="closed">*Please enter the new password</p>';
            }
            else if ($_GET['error'] == 'emptyreppwd')
            {
                echo '<p class="closed">*Please confirm new password</p>';
            }
            else if ($_GET['error'] == 'wrongpwd')
            {
                echo '<p class="closed">*Current password is wrong</p>';
            }
            else if ($_GET['error'] == 'samepwd')
            {
                echo '<p class="closed">*New password cannot be same as old password</p>';
            }
            else if ($_GET['error'] == 'passwordcheck')
            {
                echo '<p class="closed">*Confirmation password is not the same as the new password</p>';
            }
        }
        else if (isset($_GET['edit']) == 'success')
        {
            echo '<p class="open">*Profile Updated Successfully</p>';
        }
?>

<form action="includes/profileUpdate.process.php" method='post' id="contact-form" enctype="multipart/form-data">

        <h5>Personal Information</h5>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="email" 
               value=<?php echo $_SESSION['email']; ?>><br>
                
        <label>Full Name</label>
        <input type="text" id="f-name" name="firstName" placeholder="First Name" 
               value=<?php echo $_SESSION['firstname']; ?>>
        <input type="text" id="l-name" name="lastName" placeholder="Last Name" 
               value=<?php echo $_SESSION['lastname']; ?>>
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" placeholder="Phone Number" 
               value=<?php echo $_SESSION['phone']; ?>>
        
        
        <label class="container" for="gender-m">Male
          <input type="radio" name="gender" value="m" id="gender-m"
                 <?php if ($_SESSION['gender'] == 'm'){ ?> 
                 checked="checked"
                 <?php } ?>>
          <span class="checkmark"></span>
        </label>
        <label class="container" for="gender-f">Female
          <input type="radio" name="gender" value="f" id="gender-f"
                 <?php if ($_SESSION['gender'] == 'f'){ ?> 
                 checked="checked"
                 <?php } ?>>
          <span class="checkmark"></span>
        </label>
       
        <label for="headline">Profile Headline</label>
        <input type="text" id="headline" name="prof" placeholder="Your Profession"
               value='<?php echo $_SESSION['prof']; ?>'><br>
        
        <label for="bio">Profile Bio</label>
        <textarea id="bio" name="bio" maxlength="5000"
            placeholder="What you want to tell people about yourself" 
            ><?php echo $_SESSION['bio']; ?></textarea>
        
        <h5>Change Password</h5>
        <input type="password" id="old-pwd" name="old-pwd" placeholder="current password"><br>
        <input type="password" id="pwd" name="pwd" placeholder="new password">
        <input type="password" id="confirm-pwd" name="confirm-pwd" placeholder="confirm new password">
        
        <h5>Profile Picture</h5>
        <div class="upload-btn-wrapper">
            <button class="btn">Upload a file</button>
            <input type="file" name='profile_image' value=<?php echo $_SESSION['image']; ?>>
        </div>
        
        <input type="submit" class="button next" name="update-profile" value="Update Profile">
        
    </form>
<hr>

<?php include 'includes/footer.php'; ?> 