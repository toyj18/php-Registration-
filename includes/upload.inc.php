<?php

$file = $_FILES['profile_image'];

if (!empty($_FILES['profile_image']['name']))
{
    $fileName = $_FILES['profile_image']['name'];
    $fileTmpName = $_FILES['profile_image']['tmp_name'];
    $fileSize = $_FILES['profile_image']['size'];
    $fileError = $_FILES['profile_image']['error'];
    $fileType = $_FILES['profile_image']['type']; 

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt, $allowed))
    {
        if ($fileError === 0)
        {
            if ($fileSize < 10000000)
            {
                $FileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $FileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

            }
            else
            {
                header("Location: ../signup.php?error=imgsizeexceeded");
                exit(); 
            }
        }
        else
        {
            header("Location: ../signup.php?error=imguploaderror");
            exit();
        }
    }
    else
    {
        header("Location: ../signup.php?error=invalidimagetype");
        exit();
    }
}
