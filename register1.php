<?php
require_once 'dbh.php';     
        $id=0;
        $nom = $_POST['NAME'];
        $prenom = $_POST['LASTNAME'];
        $username = $_POST['USERNAME'];
      /*  $email = $_POST['EMAIL'];
        $datenaiss = $_POST['DATENAISS'];
        $phone = $_POST['PHONE'];
        $password = $_POST['password'];
        $password2= $_POST['password2'];
        $statut="";*/

      
        
            $sql = "INSERT INTO user (ID,NAME,LASTNAME,USERNAME) values('$id','$nom','$prenom','$username')";
            if(mysqli_query($con,$sql))
            {
                $statut["success"]="1";
                $statut["message"]="success";
                echo json_encode($statut);
                mysqli_close($con);
              
            }
            else
            {
                $statut["success"]="0";
                $statut["message"]="error";
                echo json_encode($statut);
                 mysqli_close($con);
            }
            


      /*  else {
            $sql2="SELECT EMAIL FROM user WHERE EMAIL=?";
            $sql="SELECT USERNAME FROM user WHERE USERNAME=?";
            $stmt=mysqli_stmt_init($con);
            $stmt2=mysqli_stmt_init($con);
         
                mysqli_stmt_prepare($stmt2,$sql2);
                mysqli_stmt_bind_param($stmt2,"s",$email);
                 mysqli_stmt_bind_param($stmt,"s",$username);
                 mysqli_stmt_execute($stmt2);
                 mysqli_stmt_execute($stmt);
                 mysqli_stmt_store_result($stmt2);
                 mysqli_stmt_store_result($stmt);
                 
             
             
                 
                    $sql="INSERT INTO user(NAME,LASTNAME,BIRTHDAY,EMAIL,USERNAME,PHONE_NUMBER,PASSWORD) VALUES(?,?,?,?,?,?,?)";
                    $stmt=mysqli_stmt_init($con);
               
            
                    $hashedpassword =password_hash($password, PASSWORD_DEFAULT);


                 mysqli_stmt_bind_param($stmt,"sssssss",$nom,$prenom,$datenaiss,$email,$username,$phone,$hashedpassword);
                 mysqli_stmt_execute($stmt);
                 mysqli_stmt_store_result($stmt);
                 $statut["success"]="1";
                 $statut["message"]="Registration Succesfully";
                 echo json_encode($statut);

                }
                 */
        
   
  
    
  