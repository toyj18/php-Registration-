<?php 
    // define('TITLE',"My Profile");
    include 'includes/header.php';
    
    if(!isset($_SESSION['userID']))
    {
        header("Location: index.php");
        exit();
    }
?>


<div style="text-align: center">
    <img id="userDp" width="100px" src=<?php echo "./uploads/".$_SESSION['image']; ?> >
 
    <h1><?php echo strtoupper($_SESSION['username']); ?></h1>
    <hr>
</div>


<h3><?php echo strtoupper($_SESSION['firstname']) . " " . strtoupper($_SESSION['lastname']); ?></h3>
<h3><?php echo strtoupper($_SESSION['phone']) ?></h3>                
<p>
<?php 
    if ($_SESSION['gender'] == 'm')
    {
        echo 'Male';
    }
    else if ($_SESSION['gender'] == 'f')
    {
        echo 'Female';
    }
?>
</p>

<h6><?php echo $_SESSION['prof']; ?></h6>
<p><?php echo $_SESSION['bio'];?></p> 

<br><br><br><br>

                
                
<?php include 'includes/footer.php'; ?> 


                
