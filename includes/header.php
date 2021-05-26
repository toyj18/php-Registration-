<?php

    session_start();
    require 'config.php';

    $companyName = "dDl pepper-ex Login/Registration System";
    
    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }
?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <!-------     LOGIN / LOGOUT FORM               --------->
    
 <?php 
    
    if(isset($_SESSION['userID']))
    {
        echo '<img id="status" src="">';
    }
    else
    {
        echo '<img id="status" src="">';
    }
    
    ?>
        
    <div id="login">
        
        <?php 
            
            if(isset($_SESSION['userID']))
            {
                echo'<div style="text-align: center;">
                        <img id="userDp" width=100px src=./uploads/'.$_SESSION["image"].'>
                        <h3>' . strtoupper($_SESSION['username']) . '</h3>
                        <a href="profile.php" class="button login">Profile</a>  
						<a href="edit-profile.php" class="button login">Edit Profile</a>
                        <a href="includes/logout.process.php" class="button login">Logout</a>
                    </div>';
            }
            else
            {
                if(isset($_GET['error']))
                {
                    if($_GET['error'] == 'emptyfields')
                    {
                        echo '<p class="closed">*please fill in all the fields</p>';
                    }
                    else if($_GET['error'] == 'nouser')
                    {
                        echo '<p class="closed">*username does not exist</p>';
                    }
                    else if ($_GET['error'] == 'wrongpwd')
                    {
                        echo '<p class="closed">*wrong password</p>';
                    }
                    else if ($_GET['error'] == 'sqlerror')
                    {
                        echo '<p class="closed">*website error. contact admin to have it fixed</p>';
                    }
                }

                echo '<form method="post" action="includes/login.process.php" id="login-form">
                    <input type="text" id="name" name="username" placeholder="Username...">
                    <input type="password" id="password" name="password" placeholder="Password...">
                    <input type="submit" class="button next login" name="login-submit" value="Login">
                </form>
                <a href="register.php" class="button previous">Signup</a>';               
            }
        ?>

    </div>
    
    <!-------     LOGIN / LOGOUT FORM END           --------->
        <div class="wrapper">
            <div class="content">