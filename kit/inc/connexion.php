<?php

if(isset($_POST['loginnow']))
{
   
    require 'dbh.php';

    $emailuid = $_POST['logemailid'];
    $logpassword=$_POST['logpassword'];

   $sql = "SELECT * FROM user WHERE USERNAME=? OR EMAIL=?;";
   $stmt=mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../login.php?error=sql error");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$emailuid,$emailuid);
        mysqli_stmt_execute($stmt);
        $result =mysqli_stmt_get_result($stmt);
        if($row =mysqli_fetch_assoc($result))
        {
            $pwdcheck=password_verify($logpassword,$row['PASSWORDU']);

            if($pwdcheck == false)
            {
                header("location: ../login.php?error=err");
                exit();
            }
            else if($pwdcheck == true)
            {
                
                session_start();
                $_SESSION['username']=$row['USERNAME'];
                $_SESSION['nale']=$row['DATENAISS'];
                $_SESSION['nom']=$row['NAME'];
                $_SESSION['prenome']=$row['LASTNAME'];
                $_SESSION['email']=$row['EMAIL'];
                $_SESSION['iduser']=$row['ID'];
                
                header("location: ../produit.php");
                exit();
            }
            else
            {
                header("location: ../login.php?error=err");
                exit();
            }
        
        }
        else
        {
            header("location: ../login.php?error=nouser");
                exit();
        }
    }
      
        
     

   

}
else
{
    header("location: ../login.php?message=youcant");
    exit();
}