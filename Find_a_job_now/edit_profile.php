<?php
require 'dbh.php';

        $nom = $_POST['NAME'];
        $prenom = $_POST['LASTNAME'];
        $username = $_POST['USERNAME'];
        $email = $_POST['EMAIL'];
        $phone = $_POST['PHONE'];
        $pays=$_POST['PAYS'];

        $stmt = $con->prepare("UPDATE user set NAME ='$nom',
        LASTNAME='$prenom',
        EMAIL='$email', 
        USERNAME='$username', 
        PAYS ='$pays', 
        PHONE_NUMBER ='$phone' 
        WHERE EMAIL='$email'"); 

        if($stmt->execute())
        {
            echo "modified successfully";
        }
        else{
            echo " ERROR modified ";
   
        }