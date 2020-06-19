<?php
   
    require 'dbh.php';

    $emailuid = $_POST['logemailid'];
    $logpassword=$_POST['logpassword'];
    $statut="";

   $sql = "SELECT * FROM user WHERE EMAIL=?;";
   $stmt=mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        echo"Connexion error";
        
       
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$emailuid);
        mysqli_stmt_execute($stmt);
        $result =mysqli_stmt_get_result($stmt);
        if($row =mysqli_fetch_assoc($result))
        {
            $pwdcheck=password_verify($logpassword,$row['PASSWORD']);

            if($pwdcheck == false)
            {
                echo "USER OR PASSWORD Invalid try again";
               
            }
            else if($pwdcheck == true)
            {
                
               
                
                
                echo "Welcomme again ^-^";
                
                
            }
            else
            {
                echo"format error";
               
            }
        
        }
        else
        {
            echo"USER Not Exist";
          
        }
    }   
      

     

   


