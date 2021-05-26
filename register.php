<?php
    // define('TITLE',"Signup");
    include 'includes/header.php';
    
    if(isset($_SESSION['userID']))
    {
        header("Location: index.php");
        exit();
    }
?>
<?php //echo $email; ?>
    <?php //echo $userName; ?>

    <?php
    $username = '';
    $email = '';

    if(isset($_GET['error']))
    {
        if($_GET['error'] == 'emptyfields')
        {
            echo '<p class="closed">*Fill In All The Fields</p>';
            $username = $_GET['username'];
            $email = $_GET['email'];
        }
        else if ($_GET['error'] == 'invalidmailuid')
        {
            echo '<p class="closed">*Please enter a valid email and user name</p>';
        }
        else if ($_GET['error'] == 'invalidmail')
        {
            echo '<p class="closed">*Please enter a valid email</p>';
        }
        else if ($_GET['error'] == 'invaliduid')
        {
            echo '<p class="closed">*Please enter a valid user name</p>';
        }
        else if ($_GET['error'] == 'passwordcheck')
        {
            echo '<p class="closed">*Passwords donot match</p>';
        }
        else if ($_GET['error'] == 'usertaken')
        {
            echo '<p class="closed">*This User name is already taken</p>';
        }
        else if ($_GET['error'] == 'invalidimagetype')
        {
            echo '<p class="closed">*Invalid image type. Profile image must be a .jpg or .png file</p>';
        }
        else if ($_GET['error'] == 'imguploaderror')
        {
            echo '<p class="closed">*Image upload error</p>';
        }
        else if ($_GET['error'] == 'imgsizeexceeded')
        {
            echo '<p class="closed">*Image too large</p>';
        }
        else if ($_GET['error'] == 'sqlerror')
        {
            echo '<p class="closed">*Website Error: Contact admin to have the issue fixed</p>';
        }
    }
    else if (isset($_GET['signup']) == 'success')
    {
        echo '<p class="open">*Signup Successful. Please login from the Login menu on the right</p>';
    }

?>

<div id="contact">
    
    <hr>
    <h1>Signup</h1>

    <form action="includes/register-process.php" method='post' id="contact-form" enctype="multipart/form-data">

        <input type="text" id="name" name="username" placeholder="Username*" >
        <input type="email" id="email" name="email" placeholder="email*">
        <input type="password" id="password" name="password" placeholder="Password*">
        <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm password*">
        <hr>
        <input type="number" id="phone" name="phone" placeholder="Phone Number" >
        <h5>Profile Picture</h5>
        <div class="upload-btn-wrapper">
            <button class="btn">Upload a file</button>
            <input type="file" name='profile_image'>
        </div>
        <!-- <img id="userDp" src="" >-->
        
        <h5>Gender</h5>
        <label class="container" for="gender-m">Male
          <input type="radio" checked="checked" name="gender" value="m" id="gender-m">
          <span class="checkmark"></span>
        </label>
        <label class="container" for="gender-f">Female
          <input type="radio" name="gender" value="f" id="gender-f">
          <span class="checkmark"></span>
        </label>

        
        <hr>
        <input type="text" id="f-name" name="firstName" placeholder="First Name" >
        <input type="text" id="l-name" name="lastName" placeholder="Last Name" >
        <input type="text" id="headline" name="profession" placeholder="Your Profession">
        <textarea id="bio" name="bio" placeholder="What you want to tell people about yourself"></textarea>
        
        <input type="submit" class="button next" name="signup-submit" value="register">
        
    </form>
    <hr>
</div>

<?php include 'includes/footer.php'; ?> 
