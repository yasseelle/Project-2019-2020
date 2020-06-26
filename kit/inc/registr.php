<?php
require 'dbh.php';
    if(isset($_POST['singup_btn']))
    {
       
        
        $id=0;
        $nom = $_POST['nom'];
        $prenom = $_POST['prenome'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $datenaiss = $_POST['dateness'];
        $gander = $_POST['gander'];
        $role="USER";
        $security_question = $_POST['secrety_question'];
        $security_answer = $_POST['sequrity_answer'];
        $password = $_POST['password'];
        $password2= $_POST['password2'];

        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            header("location: ../login.php?error=ivalidemail");
            exit();
        }
       else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
        {
            header("location: ../login.php?error=ivalidusername");
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)&& !filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            header("location: ../login.php?error=ivalidemailANDusername");
            exit();
        }
        else if($password !== $password2)
        {
            header("location: ../login.php?error=les deux mot de pass sans pas les méme");
            exit();
        }
        else {
            $sql2="SELECT EMAIL FROM user WHERE EMAIL=?";
            $sql="SELECT USERNAME FROM user WHERE USERNAME=?";
            $stmt=mysqli_stmt_init($con);
            $stmt2=mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("location: ../login.php?errorconnexion");
                exit();
            }
            else
            {   
                mysqli_stmt_prepare($stmt2,$sql2);
                mysqli_stmt_bind_param($stmt2,"s",$email);
                 mysqli_stmt_bind_param($stmt,"s",$username);
                 mysqli_stmt_execute($stmt2);
                 mysqli_stmt_execute($stmt);
                 mysqli_stmt_store_result($stmt2);
                 mysqli_stmt_store_result($stmt);
                 $resulttake=mysqli_stmt_num_rows($stmt);
                 $resulttake2=mysqli_stmt_num_rows($stmt2);
                 if($resulttake > 0)
                 {
                    header("location: ../login.php?error=user taken");
                    exit(); 
                 }
                 else if($resulttake2>0)
                 {
                    header("location: ../login.php?error=email taken");
                    exit(); 
                 }
                 else
                 {
                    $sql="INSERT INTO user VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("location: ../login.php?error=sql error");
                exit();
            }
                else {
                    $hashedpassword =password_hash($password, PASSWORD_DEFAULT);


                 mysqli_stmt_bind_param($stmt,"issssssssss",$id,$nom,$prenom,$email,$datenaiss,$role,$gander,$username,$security_question,$security_answer,$hashedpassword);
                 mysqli_stmt_execute($stmt);
                 mysqli_stmt_store_result($stmt);
                 header("location: ../login.php?succes=inscription compet bienvenue");
                 exit();


                }
                 }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
    else
    {
     header("location: ../login.php?message=youcant");
     exit();
    }