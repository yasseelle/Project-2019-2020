<?php
require 'dbh.php';     
        $id=0;
        $nom = $_POST['NAME'];
        $prenom = $_POST['LASTNAME'];
        $username = $_POST['USERNAME'];
        $email = $_POST['EMAIL'];
        $phone = $_POST['PHONE'];
        $password = $_POST['password'];
        $pays="maroc";
        $user_image="http://192.168.1.13:8081/Find_a_job_now/img/proiledefault.png";
   

        
         if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            echo"email form not accepted try a diffrent email";
              
            
         
        }
       else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
        {
           echo "invalide username try again with diffrent username";
           
            
        }
       
        else {
            $sql2="SELECT EMAIL FROM user WHERE EMAIL LIKE ?";
            $sql="SELECT user.USERNAME FROM user WHERE USERNAME LIKE ?";
            $stmt=mysqli_stmt_init($con);
            $stmt2=mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_prepare($stmt2,$sql2);
                 mysqli_stmt_bind_param($stmt2,"s",$email);
                 mysqli_stmt_bind_param($stmt,"s",$username);
                 mysqli_stmt_execute($stmt2);
                 mysqli_stmt_execute($stmt);
                 mysqli_stmt_store_result($stmt2);
                 mysqli_stmt_store_result($stmt);
                 $resulttake=mysqli_stmt_num_rows($stmt);
                 $resulttake2=mysqli_stmt_num_rows($stmt2);
                 if($resulttake>0)
                 {
                
                 echo "Sorry user alredy taken try again with diffrent username";

                 }
                 else if($resulttake2>0)
                 {
                  echo "Sorry email alredy taken try again with diffrent email '$resulttake' '$resulttake2'";

                 }
                 else
                 {
                    $sql="INSERT INTO user VALUES(?,?,?,?,?,?,?,?,?)";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        echo "Connexion Error  try again 222";
          
                    }
                else {
                    $hashedpassword =password_hash($password, PASSWORD_DEFAULT);


                 mysqli_stmt_bind_param($stmt,"issssssss",$id,$nom,$prenom,$email,$user_image,$username,$pays,$phone,$hashedpassword);
                 mysqli_stmt_execute($stmt);
                 echo "Registration Succesfully";
                 mysqli_stmt_close($stmt);
                 mysqli_stmt_close($stmt2);
               
                 mysqli_close($con);
               

                }
                 
            }
        }
   
  
    
  