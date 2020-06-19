<?php
require 'dbh.php';
$image_name="http://192.168.1.100:8080/Find_a_job_now/img/".$_FILES['image']["name"];
$target_file="img/".basename($_FILES['image']["name"]);
$Uploadok=1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$chekSize = getimagesize($_FILES["image"]["tmp_name"]);
$err="";
if($chekSize != false){
    $Uploadok=1;
}
else{
    $Uploadok=0;
    $err.="Invalid Image ";
}
if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif')
{
    $Uploadok=0;
    $err.="Image type is not supported ";

}
else
{
    $Uploadok=1;

}

if($Uploadok == 0)
{
    echo $err;
}
else
{
    if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file))
    {

                    $email=$_POST['email'];

            $stmt = $con->prepare("UPDATE user SET USER_IMAGE='$image_name' Where EMAIL='$email'");
            if($stmt->execute())
            {
                echo "image updated successfully";
            }
            else
            {
                echo "error try again later";
            }

    }
    else{
        echo "upload problém to Server";
    }
}




